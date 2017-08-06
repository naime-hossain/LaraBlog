@extends('layouts.app')
@section('heading')
   
    @if ($user)
    	{{-- show user name --}}
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
   		
   					 	
   					<div class="post_wrap">
   					
   						
               <div class="col-md-4">
                                
                            
     						 @if ($user->photo)
                   <img class="img-responsive img-raised img-rounded" src="{{ $user->photo->image() }}" alt="">
                   @else
                    <img class="img-responsive img-raised img-rounded" src="http://via.placeholder.com/350x350" alt="">

                @endif
     						

     							@if (Auth::check())
     							  @if (Auth::user()->id==$user->id)
     							  	{{-- check if the profile belongs to logged in user --}}
     							  	  <a class="btn btn-info" href="{{ route('user.edit',$user->name) }}"> 
                          <i class="fa fa-edit"></i> 
                          </a>

                    <span href="" data-toggle="modal" data-target="#deleteuser{{ $user->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>


                 <!-- deleteuser Modal Core -->
              <div class="modal fade" id="deleteuser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteuser{{ $user->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                    
                      <h4 class="modal-title text-center" id="deleteuser{{ $user->id }}Label">Want to remove The user?</h4>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                      {!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'delete','class'=>'sm-form']) !!}
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
     								{{-- expr --}}
     							@endif
            </div>
   							<div class="col-md-4">
                  <p>email:{{ $user->email }}</p>
                  <p>role:{{ $user->role->name }}</p>  
                </div>
   				
   					</div>
   					
   				
   	
   		</div>
      {{-- end of col-8 --}}
      @else
       <div class="col-md-8 col-md-offset-2">
        <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
      </div>
  <div class="col-md-12 text-center">
      <a href="/" class="btn btn-primary" title="">go home</a>
   </div>
  @endif
     
@endsection
 

