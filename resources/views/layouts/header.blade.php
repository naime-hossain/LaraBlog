<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Larablog') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/css/material-kit.css" rel="stylesheet"/>
    <link href="/css/style.css" rel="stylesheet"/>
</head>
<body>
 <div id="preloader">
        <div id="status">
            &nbsp;
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand fa fa-3x" href="{{ url('/') }}">
                        {{ config('app.name', 'Larablog') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                                 <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                             
                                         <li><a href="{{ route('user.show',Auth::user()->name) }}" title="">Profile</a></li>
                                         
                                         <li><a href="{{ route('user.posts',Auth::user()->name) }}" title="">All posts</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                     </li>
                                </ul>
                            </li>
                           {{--  <li><a href="/home" title="">home</a></li> --}}
                            @if (Auth::user()->isadmin())
                                {{-- expr --}}
                            <li><a href="/admin" title="">admin</a></li>
                            @endif
                             @if (Auth::user()->isauthor() || Auth::user()->isadmin() && Auth::user()->isactive())
                                {{-- expr --}}
                            <li><a href="/posts/create" title="">create post</a></li>
                            @endif
                        @else
                       <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        
                        @endif
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>