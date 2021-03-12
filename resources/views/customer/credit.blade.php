@extends('layout.app')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Credit Customers
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('customer-create'))
                            <a href="{{route('customers.create')}}" class="btn btn-primary float-right"> add Customer </a>
                        @endif

                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">Name</th>
                                <th scope="col">Phone No</th>
                                <th scope="col">Credit Balance</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($customers as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->previous_credit_balance}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('customer-edit'))

                                            <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                    data-target="#supplierModal{{$item->id}}" href="#"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('customer-delete'))
                                            <form action="{{route('customers.destroy',$item->id)}}" method="POST">
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
                                                <form action="{{route('customers.update',$item->id)}}" method="POST">
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
                    {{$customers->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
