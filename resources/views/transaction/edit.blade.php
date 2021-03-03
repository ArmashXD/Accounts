@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">edit purchase<a href="{{route('transaction.index')}}"
                                                             class="btn btn-primary float-right">Manage Transaction</a></div>
                <form enctype="multipart/form-data" method="POST" action="{{route('transaction.update',$transaction->id)}}">
                    @csrf
                    @method('PUT')
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
                            <select name="bank_id" id="" class="form-control">
                                @foreach($bank as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Withdraw / Deposite ID</label>
                            <input class="form-control" id="date" value="{{$transaction->dep_id}}"  name="dep_id" type="text" placeholder="Enter account number" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Amount</label>
                            <input class="form-control" id="date" value="{{$transaction->amount}}"  name="amount"  type="text"
                                   placeholder="Enter branch name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Description</label>
                            <textarea class="form-control" name="description" value="" required>{{$transaction->description}}</textarea>
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            $(function(){
                $('#value1, #value2').keyup(function(){
                    var value1 = parseFloat($('#value1').val()) || 0;
                    var value2 = parseFloat($('#value2').val()) || 0;
                    $('#sum').val(value1 * value2);
                });
            });
        </script>
    </div>
@endsection
