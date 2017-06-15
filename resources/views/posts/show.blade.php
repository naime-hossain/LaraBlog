@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    @if ($post)
    	{{-- expr --}}
    	 <h1>{{ $post->title }}</h1>

    @else
    <h1>no post found</h1>
    @endif
@endsection
 
 		@section('content')
 
<div class="col-md-8">
 			@if ($post)
 				{{-- expr --}}
 				
 					{{-- expr --}}
 					 
 					 	
 					
 					<div class="post_wrap">
 						<div class="post_heading">
 							
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
 							<p>{{ $post->body }}</p>
 							
 						</div>
 					</div>
 					
 				
 			@else

 			@endif
 		</div>
       
     
@endsection
 

