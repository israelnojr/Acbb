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
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user->name}}</td>  
                                        <td> 
                                            <form action="{{route('user.post.status', $post->id )}}" method="post">
                                                @csrf  @method('patch')
                                                <button type="submit" class="btn {{$post->status == false ? 'btn-danger' : 'btn-primary'}}">{{$post->status == true ? 'Active' : 'Inactive'}}</button>
                                            </form>
                                        </td>
                                        <td class="d-flex justify-content-space-between"> 
                                            @can('edit-user')
                                            <form action="{{route('user.post.delete', $post->id )}}" method="post">
                                                @csrf() @method('delete')
                                                <button type="submit" class="btn btn-danger ml-1 mr-1">Trash</button>
                                            </form>
                                            @endcan
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

