<div class="reply-list">
    @foreach($replies as $index=>$reply)
        <div class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="avatar pull-left">
                <a href="{{ route('users.show',[$reply->user_id]) }}">
                    <img src="{{ config('app.url').$reply->user->avatar }}" alt="" class="media-object img-thumbnail" style="width: 48px;height: 48px;">
                </a>
            </div>

            <div class="infos">
                <div class="media-heading">
                    <a href="{{ route('users.show',$reply->user_id) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span> • </span>
                    <span class="meta" title="{{ $reply->created_at }}">回复于 {{ $reply->created_at->diffForHumans() }}</span>
                    
                    <!-- 删除回复按钮 -->
                    <span class="meta pull-right">
                        <a href="#" title="删除回复">
                            <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                        </a>
                    </span>
                </div>

                <div class="reply-content">
                    {!! $reply->content !!}
                </div>
            </div>

        </div>
    @endforeach
</div>