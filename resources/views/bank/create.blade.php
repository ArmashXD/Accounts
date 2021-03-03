@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('bank.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Bank name</label>
                            <input class="form-control" id="name" name="name"  type="text"
                                   placeholder="Enter bank name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="example-date-input">Account name</label>
                            <input class="form-control" id="name" name="ac_name" type="text"
                                   placeholder="account name" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Account Number</label>
                            <input class="form-control" id="date" name="ac_number" type="text" placeholder="Enter account number" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Branch</label>
                            <input class="form-control" id="name" name="branch"  type="text"
                                   placeholder="Enter branch name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Signature Picture</label>
                            <input type="file" class="form-control" name="image" placeholder="select image">
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
