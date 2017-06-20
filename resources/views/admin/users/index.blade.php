@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All Users</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          Users Database
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
                                            <th>Name</th>
                                            <th>image</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @if (count($posts)>0)
                                      @foreach ($users as $user)
                                        <tr class="{{$user->is_active==1?'success':'warning' }}">
                                          <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><img class="img-rounded raised img-responsive" src="/{{ $user->photo?$user->photo->image:'http://via.placeholder.com/50x50' }}"></td>
                                            <td>{{ $user->email }}</td>
                                            <td> @if($user->role){{ $user->role->name }}@endif</td>
                                            {{-- <td>@if ($user->is_active)
                                              {{ 'active' }}
                                            @else{{ 'not active' }}
                                            @endif</td> --}}
                                          <td>  {{$user->is_active==1?'Active':'Not Active' }}</td>
                                              <td>{{ $user->created_at->diffForHumans() }}</td>
                                              <td>{{ $user->updated_at->diffForHumans() }}</td>
                                            <td>
                                            <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">  <i class="fa fa-edit"></i> 
                                            </a>

                                            {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'delete','class'=>'sm-form']) !!}
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
                                      @endif



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
@endsection
