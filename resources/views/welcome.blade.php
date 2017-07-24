@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    @if ($settings)
    <h1>{{ $settings->site_slogan }} </h1>
    <p>{{ $settings->site_subslogan }}</p>
    @endif
    
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
						<div class="card card-raised img-rounded card-carousel">
							<div id="home_slider" class="carousel slide" data-ride="carousel">
								
                                  
									<!-- Indicators -->
									<ol class="carousel-indicators">
									 @for ($i = 0; $i<$latests->count() ; $i++)
									 	
									 
									 	@if ($i==0)
									 		
                                         	<li data-target="#home_slider" data-slide-to="{{ $i }}" class="active"></li>
									 	@else
									 		<li data-target="#home_slider" data-slide-to="{{ $i }}"></li>
									 		@endif
										
									 @endfor
										
										
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
									
									
									  @foreach ($latests as $post)
                                    
                                    	<div class="item {{ $loop->index==0?'active':'' }}">
									<img class="img-responsive" src="/images/{{ $post->photo?$post->photo->image:'' }}" alt="Awesome Image">
									<div class="carousel-caption">
										<h4>{{ $post->title }}</h4>
											<a class="btn btn-primary" href="{{ route('posts.show',$post->slug) }}" title="">Read This</a>
									</div>
										</div>
								
										
									
                                    @endforeach
							
										
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#home_slider" data-slide="prev">
										
									</a>
									<a class="right carousel-control" href="#home_slider" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								
							</div>
						</div>
						<!-- End Carousel Card -->
                     {{-- <a class="btn btn-primary text-center" href="{{ route('posts.index') }}" title="">Read All Posts</a>  --}}
                     
					</div>
				</div>
				@else
					<div class="col-md-8 col-md-offset-2 alt_text_wrap text-center">
				<h2>What are you thinking??</h2>
				 <p>@if ($settings)
          {{ $settings->site_description }}
            @endif</p>
	</div>
			@endif
		
			
           
     
@endsection

