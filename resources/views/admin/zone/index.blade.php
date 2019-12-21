@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center"> <span>List of Users By Zone</span>
                <!-- <a href="#" class="float-right btn btn-primary ml-2">Dashboard</a href="#"> -->
                </div>
                @include('layouts.frontend.partial.message')
                <table class="table table-stripped">
                    <thead class="thead-dark">  
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Local Gov</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->localGovern->name }}</td>
                            <td class="d-flex justify-content-space-between"> 
                                <a href="" class="btn btn-success">Show</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
               <div  style="border-radius: .25rem; position: relative; " > {{ $users->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
