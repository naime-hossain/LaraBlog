@extends('layouts.app')

@section('heading')
  
      @if ($post)
      	
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

 					 {{-- rename the title --}}
 			@section('title')
     {{ config('app.name', 'Larablog').' || '.$post->slug }}
     @endsection
     {{-- end title section --}}
 					
 					<div class="single_post_wrap">
   						<div class="post_heading">
   							@if ($post->photo)
                 <img class="img-responsive img-raised img-rounded" src="{{ $post->photo->image() }}" alt="">
                 @else
                  <img class="img-responsive img-raised img-rounded" src="http://via.placeholder.com/700x500" alt="">

              @endif
   							
   						</div>
              {{-- end of post heading --}}
   						<div class="post_body">
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
   							<p>{!! $post->body !!}</p>
   							
   						</div>
              {{-- end of post body --}}
 					</div>
          {{-- end of single post wrap --}}

	 			 <div class="comment_wrap">
 			 	                
              <div class="post-comments">
                  <div class="commnet_form">
                      
                   
                    <p class="panel text-center panel-success">
                      Any thought About this post?
                    </p>
                   @if (Auth::check())
                     {{-- if user logged in then show the comment form --}}
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
                    {{-- end of comment form --}}

  	                   <p class="panel text-center panel-success">{{ count($post->comments) }} Comments In this post</p>
  	                  @if (count($post->comments)>0)
                        {{-- expr --}}
                        @foreach ($post->comments as $comment)
                          {{-- expr --}}
              <div class="sinle_comment_wrap">
               

                    <div class="media-heading">
                     {{-- button for toogle the comment --}}
                      <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapse{{ $comment->id }}" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="">
                      @if ($comment->user->photo)
                        <img class="img-raised img-rounded" height="20" src="/images/{{ $comment->user->photo->image }}" alt="">
                      @endif
                      </span> 
                       @if (Auth::check())
                        {{-- show commentor name --}}
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
                    {{-- check if the comment is belongs to logged in user --}}
                      @if (Auth::user()->id==$comment->user->id)
                    {{-- show the delete commnet button --}}
                    <span href="" data-toggle="modal" data-target="#deletecomment{{ $comment->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>

               <!-- deletecomment Modal Core -->
            <div class="modal fade" id="deletecomment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="deletecomment{{ $comment->id }}Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                  
                    <h4 class="modal-title text-center" id="deletecomment{{ $comment->id }}Label">Want to remove The comment?</h4>
                  <div class="modal-body">
                      <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                    {!! Form::open(['action'=>['CommentsController@destroy',$comment->id],'method'=>'delete','class'=>'sm-form']) !!}
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
   
                  @endif
                  @endif
                
                  </div>
         

                       </div>
                     </div>
                   </div>
                   {{-- end of single comment wrap --}}
                        @endforeach

                      @endif
              </div>
              {{-- end of post comment --}}
      </div>
      {{-- end of comment wrap --}}
               
		
 				
 			@else

 			@endif
 	</div>
       
     
@endsection
@section('sidebar')
      {{-- expr --}}
@include('layouts.sidebar')
 @endsection
 

