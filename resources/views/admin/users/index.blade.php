@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All Users</h1>
  </div>
  <!--End Page Header -->
  </div>
  <div class="col-lg-6">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Context Classes
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($users as $user)
                                        <tr class="@if ($user->is_active)
                                          {{ 'success' }}
                                        @else{{ 'warning' }}
                                        @endif">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>@if ($user->is_active)
                                              {{ 'active' }}
                                            @else{{ 'not active' }}
                                            @endif</td>
                                            <td><a href="#">  <i class="fa fa-edit"></i> </a>
                                            <a href="#">  <i class="fa fa-trash-o"></i> </a></td>
                                        </tr>
                                      @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
@endsection
