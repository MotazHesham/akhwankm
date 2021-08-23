@if ($bigBrother->small_brother != null)
    <div class="mt-4 py-2 border-top border-bottom mb-4">
        <h4 style="text-align: center;"> {{ trans('global.smallbrother') }}<h4>
    </div>
    @if ($bigBrother->small_brother->user->image)
        <img src="{{ asset($bigBrother->small_brother->user->image->getUrl('preview')) }}"
            class="rounded-circle img-thumbnail">
    @else
        <img src="{{ asset('user.png') }}" class="rounded-circle img-thumbnail">
    @endif
    <br>
    {{ $bigBrother->small_brother->user->name ?? '' }}
    <p class="small text-muted mt-2 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="border-bottom py-4">
                    <p> {{ trans('cruds.smallBrother.fields.skills') }}</p>
                    <div>
                        @foreach ($bigBrother->small_brother->skills as $key => $item)
                            <span class="badge badge-info">{{ $item->name_en }}</span>
                        @endforeach

                    </div>
                </div>
                <div class="border-bottom py-4">
                    <p> {{ trans('cruds.smallBrother.fields.charactaristics') }}</p>
                    @foreach ($bigBrother->small_brother->charactaristics as $key => $item)
                        <span class="badge badge-info">{{ $item->name_en }}</span>
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
                            {{ $bigBrother->small_brother->user->dbo ?? '' }}
                    </p>
                </div>
            </div>
            <span class="ml-2">
                <i class="mdi mdi-comment mr-1"></i>
            </span>
            <span class="ml-2">
                <i class="mdi mdi-reply"></i>
            </span>
            </p>
        </div>
    </div>
    </div>
@endif
