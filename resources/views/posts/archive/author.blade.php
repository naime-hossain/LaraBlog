@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>Author Archive</h1>
    
    @if (count($posts)>0)
     <p>All post of {{ $user->name  }}</p>
    @else
     <p>There is no post by {{ $user->name  }}</p>
    @endif
@endsection
 
 	@section('content')
 	
   <div class="col-md-8">
        @if(Session::has('message'))
         @include('alert.success')
         @endif
   			@if (count($posts)>0)
   				
   				@foreach ($posts as $post)
   				{{-- single post --}}
   				@include('layouts.single_post')
   
   				@endforeach
   		     {{ $posts->links() }}
   			@endif
 		</div>
      
     
@endsection
@section('sidebar')
      
@include('layouts.sidebar')
 @endsection
 

