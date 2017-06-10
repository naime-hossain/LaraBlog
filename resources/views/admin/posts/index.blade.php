@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All posts</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          posts Database
                        </div>

                        <div class="panel-body">
                            @if(Session::has('message'))
                           @include('alert.success')
                           @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>title</th>
                                            <th>body</th>
                                            <th>photo</th>
                                            <th>author</th>
                                            <th>category</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (count($posts)>0)
                                      @foreach ($posts as $post)
                                     
                                         {{-- expr --}}
                                           <tr class="">
                                          <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->body }}</td>
                                            <td>
                                             @if ($post->photo)
                                              {{-- expr --}}
                                              <img height="50" width="150" src="/{{ $post->photo->image }}" alt="">
                                            @endif
                                            </td>
                                            <td>@if($post->user)
                                      
                                               {{ $post->user->name }}
                                            
                                             @endif</td>
                                            <td>@if($post->categories)
                                             @foreach ($post->categories as $category)
                                               {{-- expr --}}
                                               {{ $category->name }}
                                             @endforeach
                                             @endif</td>
                                        
                                              <td>{{ $post->created_at->diffForHumans() }}</td>
                                              <td>{{ $post->updated_at->diffForHumans() }}</td>
                                            <td>
                                            <a class="btn btn-info" href="{{ route('posts.edit',$post->id) }}">  <i class="fa fa-edit"></i> 
                                            </a>

                                            {!! Form::open(['action'=>['AdminPostsController@destroy',$post->id],'method'=>'delete','class'=>'sm-form']) !!}
                                            {!! Form::button("<i class='fa fa-trash-o'></i>",
                                             [
                                             'class'=>'btn btn-danger',
                                             'onclick'=>"return confirm('want to delete?')",
                                             'type'=>'submit'
                                             ]) !!}
                                            

                                             {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                          <tr>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data </td>
                                            <td>no data </td>
                                            <td>no data</td>
                                        </tr>
                                       @endif
                                      
                                      



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
@endsection