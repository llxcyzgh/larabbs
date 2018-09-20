<div class="media`">
    <div class="avatar pull-left">
        <a href="{{ route('users.show',$notification->data['user_id']) }}">
            <img src="{{ config('app.url').$notification->data['user_avatar'] }}" alt="{{ $notification->data['user_name'] }}" class="media-object img-thumbnail" style="width: 48px;height: 48px;">
        </a>
    </div>
    
    <div class="infos">
        <div class="media-heading">
            <a href="{{ route('users.show',$notification->data['user_id']) }}">
                {{ $notification->data['user_name'] }}
            </a>
            评论了
            <a href="{{ $notification->data['topic_link'] }}">
                {{ $notification->data['topic_title'] }}
            </a>

            <!-- 删除回复按钮 -->
            <span class="meta pull-right" title="{{ $notification->created_at }}">
                <i class="glyphicon glyphicon-clock" aria-hidden="true"></i>
                {{ $notification->created_at->diffForHumans() }}
            </span>

            <div class="rely-content">
                {!! $notification->data['reply_content'] !!}
            </div>

        </div>
    </div>
</div>
<hr>