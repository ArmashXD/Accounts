@extends('layout.app')

@section('content')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('transaction.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Account Type</label>
                            <select name="ac_type" id="" class="form-control">
                                <option value="credit">Credit (-)</option>
                                <option value="debit">Debit (+)</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Select Bank name</label>
                            <select name="bank_id" id="" class="form-control" required>
                                @foreach($bank as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Withdraw / Deposite ID</label>
                            <input class="form-control" id="date" name="dep_id" type="number" placeholder="Enter account number" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Amount</label>
                            <input class="form-control" id="date" name="amount"  type="number"
                                   placeholder="Enter branch name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Description</label>
                            <textarea class="form-control" name="description"  required></textarea>
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
