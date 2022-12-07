@extends('backend.master.master')
@section('content')

    <main id="main" class="main">

        <div class="card">
            <div class="card-body">
                <h1 class="myTitle">Add Admin</h1>
                @include('backend.layouts.messages')

                <form action="{{route('admin-user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Name:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('name')}}
                            </a>
                        </label>
                        <input type="text" name="name" id="name" value="{{old('name')}}"
                               class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="username">Username:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('username')}}
                            </a>
                        </label>
                        <input type="text" name="username" id="username" value="{{old('username')}}"
                               class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('password')}}
                            </a>
                        </label>
                        <input type="password" name="password" id="password"
                               class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="confirm_password">Confirm Password:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('confirm_password')}}
                            </a>
                        </label>
                        <input type="password" name="confirm_password" id="confirm_password"
                               class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('email')}}
                            </a>
                        </label>
                        <input type="text" name="email" id="email" value="{{old('email')}}"
                               class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gender">Gender:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('gender')}}
                            </a>
                        </label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" readonly>---Select Gender---</option>
                            <option value="male" {{old('gender') =='male' ? 'selected' :''}}>Male</option>
                            <option value="female" {{old('gender') =='female' ? 'selected' :''}}>Female</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="role">Role:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('role')}}
                            </a>
                        </label>
                        <select name="role" id="role" class="form-control">
                            <option value="" readonly>---Select Role---</option>
                            <option value="admin" {{old('role') =='admin' ? 'selected' :''}}>Admin</option>
                            <option value="super_admin" {{old('role') =='super_admin' ? 'selected' :''}}>Super Admin</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Image:
                            <a style="color: red;text-decoration: none;">
                                {{$errors->first('image')}}
                            </a>
                        </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                       <button class="btn btn-success">Add record</button>
                    </div>

                </form>

            </div>
        </div>

    </main><!-- End #main -->

@endsection

