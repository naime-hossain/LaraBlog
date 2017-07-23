@extends('layouts.app')
  @section('title')
     {{ config('app.name', 'Larablog').' || posts' }}
     @endsection
@section('heading')
    {{-- expr --}}
    @if (count($posts)>0)
    <h1>All Posts Are Listed here</h1>
    @else
    <h1>There is no post to display</h1>
    @endif
    
@endsection
 
 		@section('content')
 	
   <div class="col-md-8">
      @if(Session::has('message'))
       @include('alert.success')
       @endif
 			@if (count($posts)>0)
 				{{-- expr --}}
 				@foreach ($posts as $post)
 					@include('layouts.single_post')
 				@endforeach
 			  {{ $posts->links() }}
 		@else
     <div class="col-md-12 ">
 <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
    

</div>
<div class="col-md-12 text-center">
    <a href="/" class="btn btn-primary" title="">go home</a>
 </div>
            @endif
 		</div>


      
     
@endsection
@section('sidebar')
 			{{-- expr --}}
@include('layouts.sidebar')
 @endsection
 

