<div class="reply-list">
    @foreach($replies as $index=>$reply)
        <div class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="avatar pull-left">
                <a href="{{ route('users.show',[$reply->user_id]) }}">
                    <img src="{{ config('app.url').$reply->user->avatar }}" alt="" class="media-object img-thumbnail"
                         style="width: 48px;height: 48px;">
                </a>
            </div>

            <div class="infos">
                <div class="media-heading">
                    <a href="{{ route('users.show',$reply->user_id) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span> • </span>
                    <span class="meta"
                          title="{{ $reply->created_at }}">回复于 {{ $reply->created_at->diffForHumans() }}</span>

                    <!-- 删除回复按钮 -->
                    @if(Auth::user()->can('destroy',$reply))
                    {{--@can('destroy',$reply)--}}
                        <div class="meta pull-right">
                            <form action="{{ route('replies.destroy',$reply->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default btn-xs pull-left">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </form>
                        </div>
                    {{--@endcan--}}
                    @endif
                </div>

                <div class="reply-content">
                    {!! $reply->content !!}
                </div>
            </div>

        </div>
        <hr>
    @endforeach
</div>