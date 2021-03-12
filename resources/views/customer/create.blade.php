@extends('layout.app')

@section('content')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Add customer
                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('customer-create'))
                    <a href="{{route('customers.index')}}"
                                                            class="btn btn-primary float-right">manage customer</a></div>
                @endif
                <form enctype="multipart/form-data" method="POST" action="{{route('customers.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">customer name</label>
                            <input class="form-control" id="name" name="name"  type="text"
                                   placeholder="Enter product name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="example-date-input">Customer Email</label>
                            <input class="form-control" id="name" name="email" type="email"
                                   placeholder="Purchase Date" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Customer mobile</label>
                            <input class="form-control" id="name" name="phone" type="text" placeholder="Enter invoice number" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Customer Address</label>
                            <textarea class="form-control" name="address"  required></textarea>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Previous Balance</label>
                            <input class="form-control" id="name" name="previous_credit_balance"  type="text"
                                   placeholder="Enter product name" required/>
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
@endsection

