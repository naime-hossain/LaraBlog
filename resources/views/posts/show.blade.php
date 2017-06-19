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

    @if(Session::has('message'))
       @include('alert.success')
       @endif
            @if ($errors->count()>0)
            @include('alert.error')
            @endif

 			@if ($post)
 				{{-- expr --}}
 				
 					{{-- expr --}}
 					 
 					 	
 					
 					<div class="post_wrap">
 						<div class="post_heading">
 							
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
 						</div>
 						<div class="post_body">
 							<img class="img-responsive img-raised img-rounded" src="/{{ $post->photo->image  }}" alt="">
 							<p>{{ $post->body }}</p>
 							
 						</div>
 					</div>

	 			        <div class="comment_wrap">
 			 	                
                  <div class="post-comments">
                  <div class="commnet_form">
                    
                 
                  <h2 class="panel text-center panel-success">Any thought About this post?</h2>
                 @if (Auth::check())
                   {{-- expr --}}
                    {!! Form::open(['action'=>['CommentsController@store',$post->id],'method'=>'post']) !!}
                    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
                      {!! Form::label(' comment body','Comment body', []) !!}
                     {!! Form::textarea('body',null,['class'=>'form-control','value'=>old('body'),'rows'=>5]) !!}
                   </div>
                   <div class="form-group col-md-12">
                     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                   </div>
   

                  {!! Form::close() !!}
                  @else
                  <div class=" text-center  ">
                    <a href="{{ route('login') }}" class="btn btn-primary text-info">Please log in to comment</a>
                  </div>
                 @endif
                  </div>
	                   <h2 class="panel text-center panel-success">{{ count($post->comments) }} Comments In this post</h2>
	                  @if (count($post->comments)>0)
                      {{-- expr --}}
                      @foreach ($post->comments as $comment)
                        {{-- expr --}}
                        <div class="sinle_comment_wrap">
              <!-- answer to the first comment -->

              <div class="media-heading">
                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapse{{ $comment->id }}" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="">
                <img class="img-raised img-rounded" height="20" src="/{{ $comment->user->photo->image }}" alt="">
                </span> 
                 @if (Auth::check())
                  {{-- expr --}}
                  {{ Auth::user()->id==$comment->user->id?' you ':$comment->user->name }} said
                  @else
                  {{ $comment->user->name }} Said
                @endif 
                
              
              </div>

              <div class="panel-collapse collapse in" id="collapse{{ $comment->id }}">

                <div class="media-body">
                  <p>{{ $comment->body }}</p>
                  <div class="comment-meta">
                   <span>
                 <i class="fa fa-clock-o"></i>
                  {{ $comment->created_at->diffForHumans() }}
                </span>
                @if (Auth::check())
                  {{-- expr --}}
                    @if (Auth::user()->id==$comment->user->id)
                  {{-- expr --}}
                  <span>
                {!! Form::open(['action'=>['CommentsController@destroy',$comment->id],'method'=>'delete','class'=>'sm-form']) !!}
                {!! Form::button("<i class='fa fa-trash-o'></i>",
                 [
                 'class'=>'btn btn-danger btn-small',
                 'onclick'=>"return confirm('want to delete?')",
                 'type'=>'submit'
                 ]) !!}
                  </span>
                @endif
                @endif
              
                </div>
             {{--      <div class="comment-meta">
                    <span><a class="btn btn-default" href="#">delete</a></span>
                    <span><a class="btn btn-default" href="#">view</a></span>
                  
                    <span>
                      <a class="btn btn-default" class="" role="button" data-toggle="collapse" href="#replyCommentFive" aria-expanded="false" aria-controls="collapseExample">replay to this</a>
                    </span>
                    <div class="collapse" id="replyCommentFive">
                      @if (Auth::check())
                   
                    {!! Form::open(['action'=>'PostsController@store','method'=>'post']) !!}
                    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
                      {!! Form::label('Reply body','Reply body', []) !!}
                     {!! Form::textarea('body',null,['class'=>'form-control','value'=>old('body'),'rows'=>5]) !!}
                   </div>
                   <div class="form-group col-md-12">
                     {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                   </div>
   

                  {!! Form::close() !!}
                  @else
                  <div class="alert alert-success">
                    <h3>Please log in to Reply</h3>
                  </div>
                 @endif
                    </div>
                  </div> --}}
                  <!-- comment-meta -->

                     </div>
                   </div>
                 </div>
                      @endforeach

                    @endif
                 </div>
                 </div>
                 
          

 					
 				
 			@else

 			@endif
 		</div>
       
     
@endsection
@section('sidebar')
      {{-- expr --}}
@include('layouts.sidebar')
 @endsection
 

