@include('common.error')

<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="form-group">
            <textarea name="content" rows="3" placeholder="分享你的想法" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">发表回复</button>
    </form>
</div>
<hr>