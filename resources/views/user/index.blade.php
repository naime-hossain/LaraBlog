@extends('layouts.app')
@section('heading')
    {{-- show all posts of a user --}}
    
      @if (count($posts)>0)
    <h1>All post of {{ $user->name  }}</h1>
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
   					
   					<div class="post_wrap">
     						<div class="post_heading col-md-4">
                  @if ($post->photo)
                   <img class="img-responsive img-raised img-rounded" src="{{ $post->photo->thumb() }}" alt="">
                   @else
                    <img class="img-responsive img-raised img-rounded" src="http://via.placeholder.com/350x350" alt="">

                @endif
     							
     						</div>
     						<div class="post_body col-md-8">
     							<h2>{{ $post->title }}</h2>
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
     							<p>{!! str_limit($post->body,150) !!}</p>
                  <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}" title="">Read more</a>
                  {{-- show the edit and delete button if the post belongs to loged in user --}}
                  @if (Auth::check())
                    @if (Auth::user()->id==$user->id)
                    <div class="col-md-6">
                      
                  <a class="btn btn-info" href="{{ route('posts.edit',$post->id) }}"> 
                   <i class="fa fa-edit"></i>

                   </a>
                                               
                      <span href="" data-toggle="modal" data-target="#deletepost{{ $post->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
                 <!-- deletepost Modal Core -->
              <div class="modal fade" id="deletepost{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="deletepost{{ $post->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                    
                      <h4 class="modal-title text-center" id="deletepost{{ $post->id }}Label">Want to remove The post?</h4>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                      {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'delete','class'=>'sm-form']) !!}
                        {!! Form::button("Yes",
                         [
                         'class'=>'btn btn-danger',
                       
                         'type'=>'submit'
                         ]) !!}
                            

                      {!! Form::close() !!}
                  </div>
                    </div>
                
                  </div>
                </div>
              </div>
           {{-- model end --}}     
                  </div>

                    @endif
                    
                  @endif
     		
     						
     					</div>
   					 </div>
   				@endforeach
   		
   		 @else
       {{-- show 404 --}}
      <div class="col-md-8 col-md-offset-2">
         <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
    </div>
    <div class="col-md-12 text-center">
        <a href="/" class="btn btn-primary" title="">go home</a>
     </div>
       @endif
 </div>
      
     
@endsection
 

