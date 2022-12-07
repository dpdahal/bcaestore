@extends('backend.master.master')
@section('content')

    <main id="main" class="main">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin List <a href="{{route('admin-user.create')}}">Add Admin</a></h3>

                @include('backend.layouts.messages')
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($adminData as $key=>$admin)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->gender}}</td>
                            <td>{{$admin->role}}</td>
                            <td>
                                @if($admin->image)
                                    <img src="{{url($admin->image)}}" width="30" alt="no image">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin-user.edit',$admin->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('admin-user.destroy',$admin->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <div>
                    {{$adminData->links()}}
                </div>
            </div>
        </div>

    </main><!-- End #main -->

@endsection

