@extends('layouts.app')
@section('title',$topic->title)
@section('description',$topic->excerpt)

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    作者: {{ $topic->user->name }}
                </div>

                <div class="panel-body">
                    <div class="media">
                        <div class="text-center">
                            <a href="{{ route('users.show',$topic->user->id) }}">
                                <img src="{{ config('app.url').$topic->user->avatar }}" alt=""
                                     style="width: 150px;height:150px;" class="thumbnail img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">{{ $topic->title }}</h2>
                    <div class="article-meta text-center">
                        {{ $topic->created_at->diffForHumans() }}
                        ·
                        <i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
                        {{ $topic->reply_count }}
                    </div>
                </div>

                <div class="panel-body">
                    <div class="topic-body">
                        {!! $topic->body !!}
                    </div>

                    {{--@if(Auth::id() == $topic->user->id)--}}
                    @if(Auth::user()->can('updateAndDestroy',$topic))
                        {{--@can('updateAndDestroy',$topic))--}}
                        <div class="operate">
                            <hr>
                            <a href="{{ route('topics.edit',$topic->id) }}" class="btn btn-default btn-xs pull-left"
                               role="button">
                                <i class="glyphicon glyphicon-edit"></i> 编辑
                            </a>

                            {{--<a href="{{ route('topics.destroy',$topic->id) }}" class="btn btn-default btn-xs" role="button">--}}
                            {{--<i class="glyphicon glyphicon-trash"></i> 删除--}}
                            {{--</a>--}}
                            {{--<div style="display: inline-block">--}}
                                <form action="{{ route('topics.destroy',$topic->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-default btn-xs pull-left" style="margin-left: 6px">
                                        <i class="glyphicon glyphicon-trash"></i> 删除
                                    </button>
                                </form>
                            {{--</div>--}}
                        </div>
                    @endif
                    {{--@endcan--}}

                </div>
            </div>
        </div>
    </div>
@endsection
