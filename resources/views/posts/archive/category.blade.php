@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>Category Archive</h1>
    
        @if (count($posts)>0)
    <p>All post of {{ $category->name  }} Category</p>
    @else
    <p>There is no post in {{ $category->name  }} Category</p>
    @endif
@endsection
 
 		@section('content')
 	
   <div class="col-md-8">
      @if(Session::has('message'))
       @include('alert.success')
       @endif
 			@if (count($posts)>0)
 				{{-- expr --}}
 				@foreach ($posts as $post)
 					{{-- expr --}}
 					 <div class="">
 					 	
 				@include('layouts.single_post')
 					 </div>
 				@endforeach
 			  {{ $posts->links() }}
 			@endif
 		</div>
      
     
@endsection
@section('sidebar')
      {{-- expr --}}
@include('layouts.sidebar')
 @endsection
 

