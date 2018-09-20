@extends('layouts.app')
@section('title','我的通知')

@section('content')
    <div class="col-md-offset-1 col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">
                    <i class="glyphicon glyphicon-bell"></i>
                    我的通知
                </h3>
            </div>

            <div class="panel-body">
                @if($notifications->count())
                    <div class="notifications-list">
                        @foreach($notifications as $notification)
                            @include('notifications.types._'. snake_case(class_basename($notification->type)))
                        @endforeach

                        {!! $notifications->render() !!}
                    </div>
                @else
                    <div class="empty-block">没有消息通知~</div>
                @endif
            </div>


        </div>
    </div>
@endsection