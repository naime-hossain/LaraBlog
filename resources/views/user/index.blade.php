@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>All post of {{ $user->name  }}</h1>
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
	 							</span>||
	 							 tag 
	 						   <span>
	 							 <i class="fa fa-tag"></i>
	 							  {{ $post->category_id==0?'uncategorized':$post->category->name }}
	 							</span>
 							</p>
 						</div>
 						<div class="post_body">
 							<img class="img-responsive img-raised img-rounded" src="/{{ $post->photo->image  }}" alt="">
 							<p>{{ str_limit($post->body,150) }}</p>
 							<a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}" title="">Read more</a>
 							<a class="btn btn-info" href="{{ route('posts.edit',$post->id) }}">  <i class="fa fa-edit"></i> 
                                            </a>
                                           
                                            {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'delete','class'=>'sm-form']) !!}
                                            {!! Form::button("<i class='fa fa-trash-o'></i>",
                                             [
                                             'class'=>'btn btn-danger',
                                             'onclick'=>"return confirm('want to delete?')",
                                             'type'=>'submit'
                                             ]) !!}
                                            

                                             {!! Form::close() !!}
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
 

