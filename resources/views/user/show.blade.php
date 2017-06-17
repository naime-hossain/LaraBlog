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
 
<div class="col-md-8">
 @if(Session::has('message'))
       @include('alert.success')
       @endif
 			@if ($user)
 				{{-- expr --}}
 				
 					{{-- expr --}}
 					 	
 					<div class="post_wrap">
 					
 						<div class="post_body">
 							<img class="img-responsive img-raised img-rounded" src="/{{ $user->photo? $user->photo->image: '1' }}" alt="{{ $user->name }}">
 							<p>email:{{ $user->email }}</p>
 							<p>role:{{ $user->role->name }}</p>

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
 					</div>
 					
 				
 			@else

 			@endif
 		</div>
       
     
@endsection
 

