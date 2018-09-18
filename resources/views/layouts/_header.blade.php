<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger-->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a href="{{ url('/') }}" class="navbar-brand">
                LaraBBS
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('topics.index')) }}">
                    <a href="{{ route('topics.index') }}">话题</a>
                </li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category',1))) }}">
                    <a href="{{ route('categories.show',1) }}">分享</a>
                </li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category',2))) }}">
                    <a href="{{ route('categories.show',2) }}">教程</a>
                </li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category',3))) }}">
                    <a href="{{ route('categories.show',3) }}">问答</a>
                </li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category',4))) }}">
                    <a href="{{ route('categories.show',4) }}">公告</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">登陆</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li>
                        <a href="{{ route('topics.create') }}">
                            <i class="glyphicon glyphicon-plus" aria-hidden="true" title="新建话题"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true" v-pre>
                             <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar?(config('app.url').Auth::user()->avatar):'https://a.photo/images/2018/09/17/peppa.png'}}"
                                     class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('users.show',Auth::id()) }}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    个人中心
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('users.edit',Auth::id()) }}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    编辑资料
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon-log-out"></i>
                                    退出登陆
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>