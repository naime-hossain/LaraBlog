@extends('admin.layouts.admin')
@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
  </div>
  <!--End Page Header -->
  </div>

  <div class="row">
  <!-- Welcome -->
  <div class="col-lg-12">
      <div class="alert alert-info">
          <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{{ Auth::user()->name }} </b>
  
      </div>
  </div>
  <!--end  Welcome -->
  </div>


  <div class="row">
  <!--quick info section -->
  <div class="col-lg-3">
      <div class="alert alert-danger text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{ count($users) }}</h2>Users

      </div>
  </div>
  <div class="col-lg-3">
      <div class="alert alert-success text-center img-raised img-rounded">
          <i class="fa  fa-pencil fa-3x"></i>&nbsp;<h2 class="text-lead">{{ count($posts) }}</h2> posts
      </div>
  </div>
  <div class="col-lg-3">
      <div class="alert alert-info text-center img-raised img-rounded">
          <i class="fa fa-rss fa-3x"></i>&nbsp;<h2 class="text-lead">{{ count($comments) }}</h2> Comments

      </div>
  </div>
  <div class="col-lg-3">
      <div class="alert alert-warning text-center img-raised img-rounded">
          <i class="fa  fa-pencil fa-3x"></i>&nbsp;<h2>{{ count($categories) }} </h2>categories
      </div>
  </div>
  <!--end quick info section -->
  </div>

 



@endsection
