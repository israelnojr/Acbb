@extends('layouts.backend.app')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
            @include('layouts.frontend.partial.message')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List of all Categories</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead class="thead-dark">  
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Creator</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->user->name}}</td>  
                                        <td> 
                                            <form action="{{route('admin.status.category', $category->id )}}" method="post">
                                                @csrf  @method('patch')
                                                <button type="submit" class="btn {{$category->status == false ? 'btn-success' : 'btn-danger'}}">{{$category->status == true ? 'Active' : 'Inactive'}}</button>
                                            </form>
                                        </td>
                                        <td class="d-flex justify-content-space-between"> 
                                            @can('edit-user')
                                            <a href="" class="btn btn-success">Edit</a>
                                            @endcan
                                            @can('edit-user')
                                            <form action="" method="post">
                                                @csrf() @method('delete')
                                                <button type="submit" class="btn btn-danger ml-1 mr-1">Delete</button>
                                            </form>
                                            @endcan
                                            <a href="" class="btn btn-success">Show</a>
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

