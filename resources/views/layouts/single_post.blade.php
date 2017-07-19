
 					<div class="post_wrap">
 						<div class="post_heading col-md-4">
 					      <img class="img-responsive img-raised img-rounded" src="/images/thumbnails/{{ $post->photo?$post->photo->image:'' }}" alt="">
 						</div>
 						<div class="post_body col-md-8">
 						  <div class="">

 						  			<h2><a class="" href="{{ route('posts.show', $post->id) }}" title="">{{ $post->title }}</a></h2>
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
	 							</span>||<span>
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
	 							  </span>
	 							  ||
	 							 <span>
	 							 <i class="fa fa-edit"></i>
	 							  {{count($post->comments)==0?'0':count($post->comments) }}
	 							  Comments
	 							</span>
 							</p>
 						  </div>
 							
 							<p>{!! str_limit($post->body,150) !!}</p>
 							
 						</div>
 					</div>