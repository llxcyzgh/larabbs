{{-- views/users/edit.blade.php 显示编辑用户个人资料 --}}

@extends('layouts.app')
@section('title', $user->name .' - 编辑个人资料')
@section('content')
    {{-- 该 content section 已经被 div.container 包裹 --}}

    <div class="row">
        <div class="panel panel-default col-md-offset-2 col-md-8">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i>
                    编辑个人资料
                </h4>
            </div>

            @include('common._error')

            <!-- 修改个人资料表单 -->
            <div class="panel-body">
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    {{-- 这里用 PUT 也可以--}}

                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input type="text" name="name" id="name-field" class="form-control"
                               value="{{ old('name',$user->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email-field">邮 箱</label>
                        <input type="email" name="email" id="email-field" class="form-control"
                               value="{{ old('email',$user->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea name="introduction" id="introduction-field" rows="3" class="form-control">
                            {{ old('introduction',$user->introduction) }}
                        </textarea>
                    </div>

                    <!-- Well 是一种会引起内容凹陷显示或插图效果的容器 -->
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>

                </form>
            </div>

        </div>


    </div>
@endsection