
@if($bigBrother->small_brother != null)
<div class="mt-4 py-2 border-top border-bottom">
    <h4 style="text-align: center;"> {{ trans('global.smallbrother') }}<h4>
</div>


    <h6>
        {{ $bigBrother->small_brother->user->name ?? '' }}
        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i></small>
    </h6>
    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="sample" class="img-lg rounded-circle mb-4">                         
    <p class="small text-muted mt-2 mb-0">
        <span>
       
                    <div class="row">
                      <div class="col-lg-6">
               
                        <div class="border-bottom py-4">
                          <p>  {{ trans('cruds.smallBrother.fields.skills') }}</p>
                          <div>
                              @foreach($bigBrother->small_brother->skills as $key => $item)
                              <span class="badge badge-info">{{$item->name_en}}</span>
                            @endforeach
              
                          </div>                                                               
                        </div>
                        <div class="border-bottom py-4">
                          <p> {{ trans('cruds.smallBrother.fields.charactaristics') }}</p>
                          @foreach($bigBrother->small_brother->charactaristics as $key => $item)
                          <span class="badge badge-info">{{$item->name_en}}</span>
                          @endforeach
                        </div>
                        <div class="py-4">
        
                          <p class="clearfix">
                            <span class="float-left">
                              {{ trans('cruds.user.fields.phone') }}
                            </span>
                            <span class="float-right text-muted">
                              {{ $bigBrother->small_brother->user->phone ?? '' }}
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left">
                              {{ trans('cruds.smallBrother.fields.user') }}
                            </span>
                            <span class="float-right text-muted">
                              {{ $bigBrother->small_brother->user->email ?? '' }}
                            </span>
                          </p>
                         
                          <p class="clearfix">
                            <span class="float-left">
                              
                            {{ trans('cruds.user.fields.degree') }}
                            </span>
                            <span class="float-right text-muted">
                              {{ $bigBrother->small_brother->user->degree ?? '' }}
                            </span>
                          </p>
                      
                            <p class="clearfix">
                              <span class="float-left">
                                {{ trans('cruds.user.fields.dbo') }}
                              </span>
                              <span class="float-right text-muted">
                                {{ $bigBrother->small_brother->user->dbo ??  ''}}
                            </p>
                        </div>
                     
        </span>
        <span class="ml-2">
        <i class="mdi mdi-comment mr-1"></i>
        </span>
        <span class="ml-2">
        <i class="mdi mdi-reply"></i>
        </span>
    </p>
    </div>
</div>
@endif