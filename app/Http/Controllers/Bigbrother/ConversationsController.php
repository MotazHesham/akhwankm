<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\Conversation;
use App\Models\Message;
use Auth;
use App\Events\ChattingMessages;

class ConversationsController extends Controller
{
    public function index(Request $request)
    { 
        $bigbrother = BigBrother::where('user_id',Auth::id())->first(); 

        Global $small_brother_id, $specialist_id;
        $specialist_id = $bigbrother->specialist_id;

        $small_brother = SmallBrother::find($bigbrother->small_brother_id);
        if($small_brother){
            // add small brother to conversation
            $small_brother_id = $small_brother->user_id;
            $conversation = Conversation::where(function($query) {
                                            $query->where('sender_id',$GLOBALS['small_brother_id'])
                                                ->where('receiver_id',Auth::id());
                                        })->orWhere(function($query) {
                                            $query->where('sender_id',Auth::id())
                                                ->where('receiver_id',$GLOBALS['small_brother_id']);
                                        })->first();
            if(!$conversation){
                $conversation = Conversation::create([
                    'sender_id' => Auth::id(),
                    'receiver_id' => $GLOBALS['small_brother_id']
                ]);
            }
        }

        // add specialist to conversation
        $conversation2 = Conversation::where(function($query) {
                                        $query->where('sender_id',$GLOBALS['specialist_id'])
                                            ->where('receiver_id',Auth::id());
                                    })->orWhere(function($query) {
                                        $query->where('sender_id',Auth::id())
                                            ->where('receiver_id',$GLOBALS['specialist_id']);
                                    })->first();
        if(!$conversation2){
            $conversation2 = Conversation::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $GLOBALS['specialist_id']
            ]);
        }

        $conversations = Conversation::with(['receiver','sender','messages'])
                                        ->where('sender_id',Auth::id())
                                        ->orWhere('receiver_id',Auth::id())
                                        ->orderBy('updated_at', 'desc')
                                        ->get();   

        if($request->ajax()){
            return view('partials.contacts',compact('conversations')); 
        }
        return view('bigbrother.chatting',compact('conversations')); 
    }

    public function send(Request $request)
    {
        $message = new Message;
        $message->conversation_id = $request->conversation_id;
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();
        $conversation = $message->conversation;
        if ($conversation->sender_id == Auth::id()) {
            $conversation->sender_viewed = 1;
            $conversation->receiver_viewed = 0;
        }
        elseif($conversation->receiver_id == Auth::id()) {
            $conversation->receiver_viewed = 1;
            $conversation->sender_viewed = 0;
        }
        $conversation->updated_at = date("Y-m-d H:i:s");
        $conversation->save();
        $data = [
            'conversation_id' => $request->conversation_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ];
        event(new ChattingMessages($data));
        return true;
    }
    
    public function show(Request $request){ 

        $conversation = Conversation::findOrFail($request->conversation_id);

        $start = 0 ;

        $limit = 100 ;
        
        if ($request->has('start')) {
            $start = $request->start;
        }

        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $messages = Message::with('user')->where('conversation_id',$conversation->id)->orderBy('created_at', 'desc')->offset($start)->limit($limit)->get();

        if ($conversation->sender_id == Auth::id()) {
            $conversation->sender_viewed = 1;
        }elseif($conversation->receiver_id == Auth::id()) {
            $conversation->receiver_viewed = 1;
        }
        
        $conversation->save();

        $messages = $messages->reverse();
        
        return view('partials.messages',compact('conversation','messages'));
    }
}