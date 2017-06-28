@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>Author Archive</h1>
    
      @if (count($posts)>0)
    <h2>All post of {{ $user->name  }}</h2>
    @else
    <h2>There is no post by {{ $user->name  }}</h2>
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
 					{{-- expr --}}
 					 <div class="">
 					 	
 					
 					<div class="post_wrap">
 						<div class="post_heading">
 							<h1>{{ $post->title }}</h1>
 							<p>
	 						
	 					     
	 						   	 <span>
	 							 <i class="fa fa-clock-o"></i>
	 							  {{ $post->created_at->diffForHumans() }}
	 							</span>||
	 						
	 						  <span>
                 <i class="fa fa-tag"></i>
                  @if ($post->category)
                    {{-- expr --}}

                          <a href="{{ route('archive.category',$post->category->name) }}" title="">
                             {{$post->category->name }}
                           
                          </a>
                  @else
                   <a href="{{ route('archive.category','uncategorized') }}" title="">
                             uncategorized
                           
                          </a>      
                  @endif
                  </span>||
                 <span>
                 <i class="fa fa-edit"></i>
                  {{count($post->comments)==0?'0':count($post->comments) }}
                  Comments
                </span>

 							</p>
 						</div>
 						<div class="post_body">
 							<img class="img-responsive img-raised img-rounded" src="/{{  $post->photo?$post->photo->image:''  }}" alt="">
 							<p>{{ str_limit($post->body,150) }}</p>
              <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}" title="">Read more</a>
             
 						</div>
 					</div>
 					 </div>
 				@endforeach
 		     {{ $posts->links() }}
 			@endif
 		</div>
      
     
@endsection
@section('sidebar')
      {{-- expr --}}
@include('layouts.sidebar')
 @endsection
 

