@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>Time Archive</h1>
    
    @if (count($posts)>0)
     <p>All post of {{ $month  }} , {{ $year }}</p>
    @else
     <p>There is no post of {{ $month  }} , {{ $year }}</p>
    @endif
@endsection
 
 	@section('content')
 	
   <div class="col-md-8">
        @if(Session::has('message'))
         @include('alert.success')
         @endif
   			@if (count($posts)>0)
   		
   				@foreach ($posts as $post)
   					@include('layouts.single_post')
   				@endforeach
   		 
   			@endif
 		</div>
      
     
@endsection
@section('sidebar')
     
      @include('layouts.sidebar')
@endsection
 

