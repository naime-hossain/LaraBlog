@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Edit post</h1>

  </div>
  <div class="col-md-3">
    <img class="img-responsive img-rounded" src="/images/thumbnails/{{ $post->photo?$post->photo->image:'http://via.placeholder.com/350x350' }}" alt="{{ $post->photo_id }}">
  </div>

 <div class="col-md-8 col-offset-2">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif



 {!! Form::model($post,['action'=>['AdminPostsController@update',$post->id],'method'=>'put','files' => true]) !!}

    <div class="form-group col-md-12  {{ $errors->has('title') ? ' has-error' : '' }}">
       {!! Form::label('title','Post title', []) !!}
     {!! Form::text('title',null, ['class'=>"form-control"]) !!}
   </div>
  <div class="form-group col-md-6 {{ $errors->has('slug') ? ' has-error' : '' }}">
       {!! Form::label('slug','Post slug', []) !!}
     {!! Form::text('slug',null, ['class'=>"form-control"]) !!}
   </div>
    <div class="form-group col-md-6">
       {!! Form::label('category','Select Category for Post', []) !!}
     {!! Form::select('category_id',$categories ,null, ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>

    <div class="col-md-6">
       {!! Form::label('photo_id','Select a Photo',['class'=>'btn btn-info']) !!}
     {!! Form::file('photo_id', ['class'=>'form-control']) !!}
   </div>

    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
       {!! Form::label('body','Post body', []) !!}
     {!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
   </div>


    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
 

 {!! Form::close() !!}

 </div>
@endsection
