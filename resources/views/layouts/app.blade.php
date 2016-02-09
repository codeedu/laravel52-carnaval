<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css">

    <title>CodePub</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" title="CodePub" alt="CodePub">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="header clearfix">
                <ul class="nav nav-pills pull-right">
                    <ul class="nav navbar-nav navbar-left">
                        @if(!Auth::guest())
                            <li><a href="{{ route('store.orders') }}">My Orders</a></li>
                            <li><a href="{{ route('admin.books.index') }}">My Books</a></li>
                        @endif
                        @can('user_list')
                        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                        @endcan
                        @can('category_list')
                        <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                        @endcan

                        @if(Gate::allows('role_admin') or Gate::allows('permission_admin'))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Security <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @can('role_admin')
                                    <li><a href="{{ route('admin.roles.index') }}"><i
                                                    class="fa fa-btn fa-sign-out"></i>Roles</a>
                                    </li>
                                    @endcan
                                    @can('permission_admin')
                                    <li><a href="{{ route('admin.permissions.index') }}"><i
                                                    class="fa fa-btn fa-sign-out"></i>Permissions</a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                    </ul>

                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/register') }}" class="btnnew btnnew-default">Register</a>
                        </li>
                        <li>
                            <a href="{{ url('/login') }}" class="btnnew btnnew-default">Login</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
                <div>
                    <form class="form-inline navbar-right form-search" action="{{route('store.search')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="str">
                                <div class="input-group-addon">
                                    <input type="image" src="/img/icon.png" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('banner')

@yield('menu')

<section>
    @yield('content')
</section>


<footer class="text-center">
    <p>@ CodePub 2016</p>
</footer>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>
