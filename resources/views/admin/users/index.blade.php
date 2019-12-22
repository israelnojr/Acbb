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
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td class="d-flex justify-content-space-between"> 
                                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                                            <form action="{{route('admin.users.destroy', $user)}}" method="post">
                                                @csrf() @method('delete')
                                                <button type="submit" class="btn btn-danger ml-1 mr-1">Delete</button>
                                            </form>
                                            <a href="{{ route('user.profile.show', $user->id)}}" class="btn btn-success">Show</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection
