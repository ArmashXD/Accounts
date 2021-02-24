@extends('layout.app')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Create A New Role
                        <a href="{{route('roles.create')}}"
                           class="btn btn-primary float-right">Add Roles</a>
                    </div>

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
        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Roles</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>

                            @foreach($roles as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>@foreach($item->permissions as $p)
                                       <span class="badge badge-primary">{{$p->name}}</span>
                                    @endforeach
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                data-target="#rolesModal{{$item->id}}" href="#"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        <form action="{{route('roles.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                        </form>
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
                                                <form action="{{route('roles.update',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Role Name</label>
                                                            <input class="form-control" id="name"
                                                                   value="{{$item->name}}" name="name" type="text"
                                                                   placeholder="Enter Role Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="lastName1">Select Permissions</label>
                                                            <div class="row">
                                                                @foreach($permissions as $item)
                                                                    <div class="col">
                                                                        <span class="badge badge-primary">{{$item->name}}</span>
                                                                        <input value="{{$item->id}}" type="checkbox" name="permission[]" class="checkbox">
                                                                    </div>
                                                                @endforeach
                                                            </div>
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
                    {{$roles->links()}}
                </div>
            </div>
        </div>

@endsection
