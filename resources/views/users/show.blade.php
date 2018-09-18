{{-- views/users/show.blade.php 显示用户个人资料 --}}

@extends('layouts.app')
@section('title', $user->name .' 的个人中心')
@section('content')
    {{--{{ $user->id . ' -- ' . $user->email . ' -- ' . $user->name }}--}}

    <div class="row">
        <!-- 左侧头像部分 -->
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <!-- 头像 -->
                        <div class="text-center">
                            <img src="{{ $user->avatar?(config('app.url').$user->avatar):'https://a.photo/images/2018/09/17/peppa.png'}}" alt="" width="300px" height="300px"
                                 class="thumbnail img-responsive">
                        </div>

                        <!-- 头像介绍内容 -->
                        <div class="media-body">
                            <hr>
                            <h4><strong>个人简介</strong></h4>
                            <p>{{ $user->introduction }}</p>
                            <hr>
                            <h4><strong>注册于</strong></h4>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                            {{-- dd() 测试函数 --}}
                            {{--<p>{{ dd($user->created_at) }}</p>--}}
                            {{--{{ dd(public_path()) }}--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右侧详细信息 -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size: 30px;">{{ $user->name }}
                            <small>{{ $user->email }}</small></h1>
                    </span>
                </div>
            </div>
            <hr>

            <!-- 用户发布的内容 -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">Ta 的话题</a></li>
                        <li class=""><a href="#">Ta 的回复</a></li>
                    </ul>
                    @include('users._topics',['topics'=>$user->topics()->recent()->paginate(5)])
                </div>
            </div>

        </div>


    </div>
@endsection