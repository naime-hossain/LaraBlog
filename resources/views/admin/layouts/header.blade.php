<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- change the app name from settings database --}}
    @php
 
      if ($settings) {
           config(['app.name' =>$settings->site_name]);
      } 
   @endphp
     <title>@yield('title', config('app.name', 'Larablog'))</title>
    <!-- Core CSS - Include with every page -->
    <link href="/css/app_core.css" rel="stylesheet" />
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    
    <link href="/admin_assets/css/style.css" rel="stylesheet" />
    <link href="/admin_assets/css/main-style.css" rel="stylesheet" />
 
    <link href="/css/material-kit.css" rel="stylesheet"/>
    <link href="/admin_assets/css/admin.css" rel="stylesheet" />
    <link rel="icon" href="/images/laravel-icon.png" type="image" sizes="16x16">
    
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
      <div class="container">
          <div class="row">
             <div class="col-md-12">
                                 <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fa-2x" href="/">
                    {{-- <img src="/admin/img/logo.png" alt="" /> --}}
                     {{ config('app.name', 'Larablog') }}
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
               

                <li class="dropdown">
                    <a class="dropdown-toggle fa-2x" data-toggle="dropdown" href="#">
                        <i class="fa fa-user "></i>
                        {{ Auth::user()->name }}
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-gear  fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href=" {{ route('logout') }}"
                        onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                        >
                        <i class="fa fa-sign-out fa-fw"></i>
                        Logout
                        </a>
                       
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->
              </div>
          </div>
      </div>

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                            {{-- admin profile pic --}}
                             <img class="img-rounded img-raised img-responsive" src="/images/{{  Auth::user()->photo?Auth::user()->photo->image:'placeholder' }}" alt="">
                            </div>
                      
                        </div>
                        <!--end user image section-->
                    </li>
               
                    <li class="selected">
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user fa-fw"></i> users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('users.index')}}">all users</a>
                            </li>
                            <li>
                                <a href="{{route('users.create')}}">add users</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('adposts.index') }}">all posts</a>
                            </li>
                            <li>
                                <a href="{{ route('adposts.create') }}">add new post</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> &nbsp;categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('categories.index') }}">all categories</a>
                            </li>
                            <li>
                                <a href="{{ route('categories.create') }}">add new category</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                      <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> &nbsp;comments<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('comments.index') }}">all comments</a>
                            </li>
                          
                        </ul>
                        <!-- second-level-items -->
                    </li>

                        <li>
                        <a href="#"><i class="fa fa-cog fa-fw"></i> &nbsp;App Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('settings.index') }}">Update Settings</a>
                            </li>
                          
                        </ul>
                        <!-- second-level-items -->
                    </li>

                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
