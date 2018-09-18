@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i>
                    @if($topic->id)
                        编辑话题
                    @else
                        新建话题
                    @endif
                </h2>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        {{--<input type="hidden" name="_method" value="PUT">--}}
                        {{ method_field('PUT') }}
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        {{ csrf_field() }}


                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required="required"/>
                        </div>

                        <div class="form-group">
                            <select name="category_id" class="form-control" required="required">
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">请选择分类</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea name="body" id="body-field" class="form-control" rows="3" placeholder="请填写至少 3 个字符的内容" required="required">{{ old('body', $topic->body ) }}</textarea>
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-ok"></i> 保存
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection