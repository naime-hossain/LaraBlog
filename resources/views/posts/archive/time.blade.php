@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>Mothly Archive</h1>
    <h2>All post of {{ $month  }} , {{ $year }}</h2>
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
	 						
	 					       <span> 
                 <i class="fa fa-user"></i>
                  <a href="{{ route('archive.author',$post->user->name) }}" title="">
                     {{ $post->user->name }}
                  </a>
                 
                </span>||
	 						   	 <span>
	 							 <i class="fa fa-clock-o"></i>
	 							  {{ $post->created_at->diffForHumans() }}
	 							</span>||
	 						
	 						   <span>
	 							 <i class="fa fa-tag"></i>
                  <a href="{{ route('archive.category',$post->category->name) }}" title="">
                     {{ $post->category_id==0?'uncategorized':$post->category->name }}

                  </a>
	 							 
	 							</span>||
                 <span>
                 <i class="fa fa-edit"></i>
                  {{count($post->comments)==0?'0':count($post->comments) }}
                  Comments
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
@section('sidebar')
      {{-- expr --}}
      @include('layouts.sidebar')
@endsection
 

