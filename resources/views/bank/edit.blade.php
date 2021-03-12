@extends('layout.app')

@section('content')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">edit purchase<a href="{{route('bank.index')}}"
                                                             class="btn btn-primary float-right">Manage Bank</a></div>
                <form enctype="multipart/form-data" method="POST" action="{{route('bank.update',$bank->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Bank name</label>
                            <input class="form-control" id="name" name="name" value="{{$bank->name}}" type="text"
                                   placeholder="Enter bank name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="example-date-input">Account name</label>
                            <input class="form-control" id="name" name="ac_name" value="{{$bank->ac_name}}" type="text"
                                   placeholder="account name" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Account Number</label>
                            <input class="form-control" id="date" name="ac_number" value="{{$bank->ac_number}}" type="text" placeholder="Enter account number" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Branch</label>
                            <input class="form-control" id="name" name="branch" value="{{$bank->branch}}" type="text"
                                   placeholder="Enter branch name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Signature Picture</label>
                            <label for="firstName1" style="color: red"><b>{{$bank->image_url}}</b></label>
                            <input type="file" class="form-control" name="image" value="{{$bank->image_url}}" placeholder="select image">
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
