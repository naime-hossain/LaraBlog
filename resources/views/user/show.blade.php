@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    @if ($user)
    	{{-- expr --}}
    	 <h1>{{ $user->name }}</h1>

    @else
    <h1>no user found</h1>
    @endif
@endsection
 
 		@section('content')
 @if ($user)
<div class="col-md-8">
 @if(Session::has('message'))
       @include('alert.success')
       @endif
 			
 				{{-- expr --}}
 				
 					{{-- expr --}}
 					 	
 					<div class="post_wrap">
 					
 						<div class="post_body ">
                          <div class="col-md-4">
                              
                        
 							<img class="img-responsive img-raised img-rounded" src="/{{ $user->photo? $user->photo->image: '1' }}" alt="{{ $user->name }}">
 						

 							@if (Auth::check())
 							  @if (Auth::user()->id==$user->id)
 							  	{{-- expr --}}
 							  	  <a class="btn btn-info" href="{{ route('user.edit',$user->name) }}">  <i class="fa fa-edit"></i> 
                                            </a>

                                            {!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'delete','class'=>'sm-form']) !!}
                                            {!! Form::button("<i class='fa fa-trash-o'></i>",
                                             [
                                             'class'=>'btn btn-danger',
                                             'onclick'=>"return confirm('want to delete?')",
                                             'type'=>'submit'
                                             ]) !!}
                                            

                                             {!! Form::close() !!}
 							  @endif
 								{{-- expr --}}
 							@endif
                              </div>
 							<div class="col-md-4">
                            <p>email:{{ $user->email }}</p>
                            <p>role:{{ $user->role->name }}</p>  
                            </div>
 						</div>
 					</div>
 					
 				
 	
 		</div>
            @else
     <div class="col-md-8 col-md-offset-2">
 <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
    

</div>
<div class="col-md-12 text-center">
    <a href="/" class="btn btn-primary" title="">go home</a>
 </div>
            @endif
     
@endsection
 

