@extends('layout.app')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
    @if(auth()->user()->hasPermissionTo('create'))
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Create A New User</div>
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Enter User name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Name"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Enter email</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Enter password</label>
                                <input class="form-control" id="password" name="password" type="password"
                                       placeholder="Password"/>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Assign Role</label>
                                <select name="role" id="" class="form-control">
                                    @foreach(\Spatie\Permission\Models\Role::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Users</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->roles->pluck('name')->first()}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasPermissionTo('edit'))
                                        <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                data-target="#rolesModal{{$item->id}}" href="#"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasPermissionTo('delete'))
                                        <form action="{{route('users.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="rolesModal{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Edit {{$item->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('users.update',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter User name</label>
                                                            <input class="form-control" id="name" name="name"
                                                                   value="{{$item->name}}" type="text"
                                                                   placeholder="Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">U
                                                            <label for="firstName1">Enter email</label>
                                                            <input class="form-control" id="email" name="email"
                                                                   value="{{$item->email}}" type="email"
                                                                   placeholder="Email"/>
                                                        </div>

                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="lastName1">Assign Role</label>
                                                            <select name="role_id" id="" class="form-control">
                                                                @foreach(\Spatie\Permission\Models\Role::all() as $r)
                                                                    <option value="{{$r->id}}" {{$r->id == $item->roles->pluck('id')->first()}}>{{$r->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection