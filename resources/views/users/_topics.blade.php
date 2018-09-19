@if(count($topics))
    <ul class="list-group">
        @foreach($topics as $topic)
            <li class="list-group-item">
{{--                <a href="{{ route('topics.show',$topic->id) }}" title="{{ $topic->title }}">--}}
                <a href="{{ $topic->link() }}" title="{{ $topic->title }}">
                    {{ $topic->title }}
                </a>
                <span class="meta pull-right">
                    {{ $topic->reply_count }} 回复
                    <span> ⋅ </span>
                    {{ $topic->created_at->diffForHumans() }} 发布
                </span>
            </li>
        @endforeach
    </ul>
@else
    <div class="empty-block">暂无数据 ~_~</div>
@endif

<!-- 分页 -->
{!! $topics->render() !!}