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
                                        <th scope="col">Title</th>
                                        <th scope="col">Creator</th>
                                        @can('edit-user')
                                        <th scope="col">Status</th>
                                        @endcan
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user->name}}</td>  
                                        @can('edit-user')
                                        <td> 
                                            <form action="{{route('user.post.status', $post->id )}}" method="post">
                                                @csrf  @method('patch')
                                                <button type="submit" class="btn {{$post->status == false ? 'btn-danger' : 'btn-primary'}}">{{$post->status == true ? 'Active' : 'Inactive'}}</button>
                                            </form>
                                        </td>
                                        @endcan
                                        <td class="d-flex justify-content-space-between"> 
                                            <a href="" class="btn btn-success">Edit</a>
                                            <form action="" method="post">
                                                @csrf() @method('delete')
                                                <button type="submit" class="btn btn-danger ml-1 mr-1">Delete</button>
                                            </form>
                                            <a href="{{route('show.post', $post->slug)}}" class="btn btn-success">Show</a>
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

