@extends('layouts.backend.app')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
            @include('layouts.frontend.partial.message')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List of all Users</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead class="thead-dark">  
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Local Gov</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ $user->localGovern->name}}</td>
                                        <td> 
                                            <a href="" class=" btn {{ $user->status == true ? 'btn-primary' : 'btn-danger'}}">{{$user->status == true ? 'Active' : 'Inactive'}} </a>
                                        </td>
                                        <td class="d-flex justify-content-space-between"> 
                                            @can('edit-user')
                                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                                            @endcan
                                            @can('super-action')
                                            <form action="{{route('admin.users.destroy', $user->id)}}" method="post">
                                                @csrf() @method('delete')
                                                <button type="submit" class="btn btn-danger ml-1 mr-1">Delete</button>
                                            </form>
                                            @endcan
                                            <a href="{{ route('user.profile.show', $user->id)}}" class="btn btn-success">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection

