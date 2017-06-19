@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>Welcome to Larablog</h1>

@endsection
@section('content')
   <div class="section" id="carousel">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">

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
									@if ($latests->count()>0)
										{{-- expr --}}
									
									@php
										$n=0;
									@endphp
									  @foreach ($latests as $post)
                                    	{{-- expr --}}
                                         @if ($n==0)
                                         	{{-- expr --}}
                                    	<div class="item active">
									<img src="/{{ $post->photo->image }}" alt="Awesome Image">
									<div class="carousel-caption">
										<h4>{{ $post->title }}</h4>
											{{-- <a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}" title="">Read This</a> --}}
									</div>
										</div>
										@php
											$n++;
										@endphp
                                         @else

                                    	<div class="item">
											<img src="/{{ $post->photo->image }}" alt="Awesome Image">
											<div class="carousel-caption">
												<h4>{{ $post->title }}</h4>
												{{-- <a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}" title="">Read This</a> --}}
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
                     <a class="btn btn-primary text-center" href="{{ route('posts.index') }}" title="">Read All Posts</a> 
                     @endif
					</div>
				</div>
			</div>
		</div>
           
     
@endsection

