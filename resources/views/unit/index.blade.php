@extends('layout.app')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('create'))
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create A New Unit</div>
                        <form method="POST" action="{{route('units.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Unit Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                           placeholder="Enter Name" required/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>Select Type</label>
                                    <select name="type_id" id="" class="form-control" required>
                                        @foreach(\App\Models\Type::where('id',6)->get() as $item)
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
                    <h4 class="card-title mb-3">All Categories</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($units as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('edit'))
                                            <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                    data-target="#mainCategory{{$item->id}}" href="#"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('delete'))
                                            <form action="{{route('units.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('edit'))
                                    <div class="modal fade" id="mainCategory{{$item->id}}" tabindex="-1" role="dialog"
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
                                                    <form action="{{route('units.update',$item->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="firstName1">Enter Unit Name</label>
                                                                <input class="form-control" id="name"
                                                                       value="{{$item->name}}" name="name" type="text"
                                                                       placeholder="Enter Unit Name" required/>
                                                            </div>
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label>Select Type</label>
                                                                <select name="type_id" id="" class="form-control" required>
                                                                    @foreach(\App\Models\Type::where('id',6)->get() as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$units->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
