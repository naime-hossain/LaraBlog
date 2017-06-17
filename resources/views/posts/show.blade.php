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

	 			 <div class="comment_wrap">
 			 	   
                  <div class="post-comments">
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
                  <div class="alert alert-success">
                    <h3>Please log in to comment</h3>
                  </div>
                 @endif
	
	                  @if (count($post->comments)>0)
                      {{-- expr --}}
                      @foreach ($post->comments as $comment)
                        {{-- expr --}}
                        <div class="sinle_comment_wrap">
              <!-- answer to the first comment -->

              <div class="media-heading">
                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> Replay on this comment by 
                {{ $comment->user->name }}
              </div>

              <div class="panel-collapse collapse in" id="collapseFour">

                <div class="media-body">
                  <p>{{ $comment->body }}</p>
                  <div class="comment-meta">
                    <span><a class="btn btn-default" href="#">delete</a></span>
                    <span><a class="btn btn-default" href="#">view</a></span>
                  
                    <span>
                      <a class="btn btn-default" class="" role="button" data-toggle="collapse" href="#replyCommentFive" aria-expanded="false" aria-controls="collapseExample">replay to this</a>
                    </span>
                    <div class="collapse" id="replyCommentFive">
                      @if (Auth::check())
                   {{-- expr --}}
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
                  </div>
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
 

