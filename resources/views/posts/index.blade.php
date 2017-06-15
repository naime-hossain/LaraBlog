@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>All Posts Are Listed here</h1>
@endsection
 
 		@section('content')
 	
   <div class="col-md-8">
      @if(Session::has('message'))
       @include('alert.success')
       @endif
 			@if (count($posts)>0)
 				{{-- expr --}}
 				@foreach ($posts as $post)
 					{{-- expr --}}
 					 <div class="">
 					 	
 					
 					<div class="post_wrap">
 						<div class="post_heading">
 							<h1>{{ $post->title }}</h1>
 							<p>
	 							posted by
	 							<span> 
	 							 <i class="fa fa-user"></i>
	 							  {{ $post->user->name }}
	 							</span>||
	 						   posted on 
	 						   <span>
	 							 <i class="fa fa-clock-o"></i>
	 							  {{ $post->created_at->diffForHumans() }}
	 							</span>
 							</p>
 						</div>
 						<div class="post_body">
 							<img class="img-responsive img-raised img-rounded" src="/{{ $post->photo->image  }}" alt="">
 							<p>{{ str_limit($post->body,150) }}</p>
 							<a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}" title="">Read more</a>
 						</div>
 					</div>
 					 </div>
 				@endforeach
 			@else
              <div class="">
              	 <h2>No post yet!!</h2>
              </div>
 			@endif
 		</div>
      
     
@endsection
 

