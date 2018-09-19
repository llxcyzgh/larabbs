{{--@if($topics->count())--}}
{{--<table class="table table-condensed table-striped">--}}
{{--<thead>--}}
{{--<tr>--}}
{{--<th class="text-center">#</th>--}}
{{--<th>Title</th>--}}
{{--<th>Body</th>--}}
{{--<th>User_id</th>--}}
{{--<th>Category_id</th>--}}
{{--<th>Reply_count</th>--}}
{{--<th>View_count</th>--}}
{{--<th>Last_reply_user_id</th>--}}
{{--<th>Order</th>--}}
{{--<th>Excerpt</th>--}}
{{--<th>Slug</th>--}}
{{--<th class="text-right">OPTIONS</th>--}}
{{--</tr>--}}
{{--</thead>--}}

{{--<tbody>--}}

{{--@foreach($topics as $topic)--}}
{{--<tr>--}}
{{--<td class="text-center"><strong>{{$topic->id}}</strong></td>--}}

{{--<td>{{$topic->title}}</td>--}}
{{--<td>{{$topic->body}}</td>--}}
{{--<td>{{$topic->user_id}}</td>--}}
{{--<td>{{$topic->category_id}}</td>--}}
{{--<td>{{$topic->reply_count}}</td>--}}
{{--<td>{{$topic->view_count}}</td>--}}
{{--<td>{{$topic->last_reply_user_id}}</td>--}}
{{--<td>{{$topic->order}}</td>--}}
{{--<td>{{$topic->excerpt}}</td>--}}
{{--<td>{{$topic->slug}}</td>--}}

{{--<td class="text-right">--}}
{{--<a class="btn btn-xs btn-primary" href="{{ route('topics.show', $topic->id) }}">--}}
{{--<i class="glyphicon glyphicon-eye-open"></i>--}}
{{--</a>--}}

{{--<a class="btn btn-xs btn-warning" href="{{ route('topics.edit', $topic->id) }}">--}}
{{--<i class="glyphicon glyphicon-edit"></i>--}}
{{--</a>--}}

{{--<form action="{{ route('topics.destroy', $topic->id) }}" method="POST"--}}
{{--style="display: inline;"--}}
{{--onsubmit="return confirm('Delete? Are you sure?');">--}}
{{--{{csrf_field()}}--}}
{{--<input type="hidden" name="_method" value="DELETE">--}}

{{--<button type="submit" class="btn btn-xs btn-danger"><i--}}
{{--class="glyphicon glyphicon-trash"></i></button>--}}
{{--</form>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
{{--</table>--}}

{{--@else--}}
{{--<h3 class="text-center alert alert-info">Empty!</h3>--}}
{{--@endif--}}


@if(count($topics))
    <ul class="media-list">
        @foreach($topics as $topic)
            <li class="media">
                <div class="media-left">
                    <a href="{{ route('users.show',[$topic->user_id]) }}">
                        <img src="{{ config('app.url').$topic->user->avatar }}" alt="" title="{{ $topic->user->name }}"
                             class="media-object img-thumbnail"
                             style="width: 52px;height: 52px;">
                        {{--<img src="{{ config('app.url').$topic->user->avatar }}" alt="" title="{{ $topic->user->name }}" width="100">--}}
                    </a>
                </div>

                <div class="media-body">

                    <div class="media-heading">
{{--                        <a href="{{ route('topics.show',[$topic->id]) }}" title="{{ $topic->title }}">--}}
                        <a href="{{ $topic->link() }}" title="{{ $topic->title }}">
                            {{ $topic->title }}
                        </a>

                        {{--<a href="{{ route('topics.show',[$topic->id]) }}" class="pull-right">--}}
                        <a href="{{ $topic->link() }}" class="pull-right">
                            <span class="badge">{{ $topic->reply_count }}</span>
                        </a>
                    </div>

                    <div class="media-body meta">
                        <a href="{{ route('categories.show',$topic->category->id) }}"
                           title="{{ $topic->category->name }}">
                            <i class="glyphicon glyphicon-folder-open"></i>
                            {{ $topic->category->name }}
                        </a>

                        <span> • </span>
                        <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                            {{ $topic->user->name }}
                        </a>
                        <span> • </span>

                        <i class="glyphicon glyphicon-time" aria-hidden="true"></i>
                        {{--                        <span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>--}}
                        <span class="timeago" title="最后活跃于">
                            {{ if_query('order','recent') ? $topic->created_at->diffForHumans().'发布' : $topic->updated_at->diffForHumans().'回复' }}
                        </span>
                    </div>
                </div>
            </li>

            @if(!$loop->last)
                <hr>
            @endif

        @endforeach
    </ul>
@endif
