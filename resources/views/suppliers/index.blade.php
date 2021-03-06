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
                        <div class="card-title mb-3">Create A New Supplier</div>
                        <form method="POST" action="{{route('suppliers.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                           placeholder="Enter Name" required/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Phone</label>
                                    <input class="form-control" id="phone" name="phone" step="0" min="0.00"
                                           type="number"
                                           placeholder="Enter Phone" required/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Address</label>
                                    <input class="form-control" id="date" name="address" required PLACEHOLDER="Enter Address" type="text"/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Details</label>
                                    <input class="form-control" id="date" name="details" placeholder="Enter Details" type="text" required/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Previous Credit Balance</label>
                                    <input class="form-control" id="date" name="previous_credit_balance"  step="0" min="0.00" placeholder="Enter Number" type="number" required/>
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
                    <h4 class="card-title mb-3">All Suppliers</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone No</th>
                                <th scope="col">Address</th>
                                <th scope="col">Details</th>
                                <th scope="col">Credit Balance</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($suppliers as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->previous_credit_balance}}</td>
                                    <td>
                                        @if(auth()->user()->hasPermissionTo('edit'))

                                            <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                    data-target="#supplierModal{{$item->id}}" href="#"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasPermissionTo('delete'))
                                            <form action="{{route('suppliers.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="supplierModal{{$item->id}}" tabindex="-1" role="dialog"
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
                                                <form action="{{route('suppliers.update',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Name</label>
                                                            <input class="form-control" id="name" name="name" value="{{$item->name}}" type="text"
                                                                   placeholder="Enter Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Phone</label>
                                                            <input class="form-control" id="phone" name="phone" step="0" value="{{$item->phone}}" min="0.00"
                                                                   type="number"
                                                                   placeholder="Enter Phone"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Address</label>
                                                            <input class="form-control" id="date" value="{{$item->address}}" name="address" type="text"/>
                                                        </div>

                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Details</label>
                                                            <input class="form-control" id="date" value="{{$item->details}}"  name="details" type="text"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Previous Credit Balance</label>
                                                            <input class="form-control" value="{{$item->previous_credit_balance}}"  id="date" name="previous_credit_balance" type="number"/>
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
                    {{$suppliers->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
