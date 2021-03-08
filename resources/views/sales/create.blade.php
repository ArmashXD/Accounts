@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">

                <div class="card-title mb-3">Create A New Sale
                    <a href="{{route('sale.index')}}"
                       class="btn btn-primary float-right">See Sales</a></div>

                <form enctype="multipart/form-data" method="POST" action="{{route('sale.store')}}">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Customer Name</label>
                            <select name="customer_id" id="" class="form-control">
                                @foreach($customers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Date</label>
                            <input class="form-control" id="date" name="date" type="date" placeholder="Enter Product Model" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Item information</label>
                            <select name="product_id" id="product_id"  class="form-control">
                                @foreach($products as $item)
                                    <option value="">Please Select Product</option>
                                    <option value="{{$item->id}}" data-price="{{ $item->sale_price }}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Quantity</label>
                            <input class="form-control" id="name" name="quantity"  type="number"
                                   placeholder="Enter Quantity" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Rate</label>
                            <input class="form-control" id="rate" name="rate" type="number"
                                   placeholder="Enter Rate" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Discount %</label>
                            <input class="form-control" id="discount" name="discount" type="number"
                                   placeholder="Enter discount %" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Tax</label>
                            <select name="tax_id" id="tax_id" class="form-control">
                                @foreach($taxes as $item)
                                    <option value="">Please Select Tax</option>
                                    <option value="{{$item->id}}" data-price="{{$item->percentage}}">{{$item->percentage}} %</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Total</label>
                            <input class="form-control" id="total" name="total" type="number"
                                   placeholder="Enter Total" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Invoice Details </label>
                            <input class="form-control" id="name" name="details" type="text"
                                   placeholder="Enter Invoice Details" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Units </label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                @foreach(\App\Models\Unit::where('type_id', 7)->get() as $item)
                                    <option value="">Please Select Unit</option>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#product_id').on('change',function(){
            var price = $(this).children('option:selected').data('price')
            $('#rate').val(price)
        })
        $("input").on("change", function() {
            var ret = parseInt($("#rate").val()) - parseInt($("#discount").val() || '0')
            $("#total").val(ret)
        })


    </script>

@endsection
