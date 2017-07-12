@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>Welcome to Larablog </h1>
    <p>WRITE LIKE THERE'S NO RULE</p>
   {{--  <a href="http://naimehossain.com" class="text-info btn btn-simple">Naime Hossain</a> --}}

@endsection
@section('content')
  <div class="col-md-12">
  	@if(Session::has('message'))
   @include('alert.success')
   @endif
  </div>  


               @if ($latests->count()>0)
                     <div class="" id="carousel">
			
					<div class="col-md-8 col-md-offset-2 text-center">
					{{-- <h2>Recent Posts</h2> --}}
                         
						<!-- Carousel Card -->
						<div class="card card-raised card-carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel slide" data-ride="carousel">
                                  
									<!-- Indicators -->
							{{-- 		<ol class="carousel-indicators">
									 @for ($i = 0; $i<$latests->count() ; $i++)
									 	
									 
									 	@if ($i==0)
									 		
                                         	<li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="active"></li>
									 	@else
									 		<li data-target="#carousel-example-generic" data-slide-to="{{ $i }}"></li>
									 		@endif
									 	
									 @endfor
										
										
									</ol> --}}

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
									
										{{-- expr --}}
									
									@php
										$n=0;
									@endphp
									  @foreach ($latests as $post)
                                    	{{-- expr --}}
                                         @if ($n==0)
                                         	{{-- expr --}}
                                    	<div class="item active">
									<img class="img-responsive" src="/{{ $post->photo?$post->photo->image:'' }}" alt="Awesome Image">
									<div class="carousel-caption">
										<h4>{{ $post->title }}</h4>
											<a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}" title="">Read This</a>
									</div>
										</div>
										@php
											$n++;
										@endphp
                                         @else

                                    	<div class="item">
											<img class="img-responsive" src="/{{ $post->photo?$post->photo->image:'' }}" alt="Awesome Image">
											<div class="carousel-caption">
												<h4>{{ $post->title }}</h4>
												<a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}" title="">Read This</a>
											</div>
										</div>
										@endif
									
                                    @endforeach
							
										
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								</div>
							</div>
						</div>
						<!-- End Carousel Card -->
                     {{-- <a class="btn btn-primary text-center" href="{{ route('posts.index') }}" title="">Read All Posts</a>  --}}
                     
					</div>
				</div>
				@else
					<div class="col-md-8 col-md-offset-2 alt_text_wrap text-center">
				<h2>Waht are you thinking??</h2>
				<p>This is the place of sharing thoughts.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
			@endif
		
			
           
     
@endsection

