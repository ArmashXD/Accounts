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
                            <label for="firstName1">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">Please Select Cusomter</option>
                                @foreach($customers as $item)
                                    <option value="{{$item->id}}"
                                            data-price="{{ $item->sale_price }}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Date</label>
                            <input class="form-control" id="name" name="date" type="date"
                                   placeholder="Enter date" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Details</label>
                            <input class="form-control" id="details" name="details" type="text"
                                   placeholder="Enter invoice details" required/>
                        </div>
                        <table class="table" id="products_table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Tax</th>
                                <th>Unit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="product_id[]" id="product_id" class="form-control">
                                        <option value="">Please Select Product</option>
                                        @foreach($products as $item)
                                            <option value="{{$item->id}}"
                                                    data-price="{{ $item->sale_price }}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control" value="1"/>
                                </td>
                                <td><input class="form-control" id="rate" name="rate[]" type="number"
                                           placeholder="Enter Rate" required/></td>
                                <td>
                                    <input class="form-control" id="discount" name="discount[]" type="number"
                                           placeholder="Enter discount %" required/>
                                </td>
                                <td>
                                    <input class="form-control" id="total" name="total[]" type="number"
                                           placeholder="Enter Total" required/>
                                </td>
                                <td>
                                    <select name="tax_id[]" id="tax_id" class="form-control">
                                        <option value="">Please Select Tax</option>
                                        @foreach($taxes as $item)
                                            <option value="{{$item->id}}"
                                                    data-price="{{$item->percentage}}">{{$item->percentage}} %
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="unit_id[]" id="unit_id[]" class="form-control">
                                        <option value="">Please Select Unit</option>
                                        @foreach(\App\Models\Unit::where('type_id', 7)->get() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr id="product1"></tr>
                            </tbody>
                        </table>
                        <div class="col-md-6 form-group mb-3">
                            <button id="add_row" class="btn btn-success float-left"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-6 form-group mb-3">

                            <button id='delete_row' class="float-right btn btn-danger"><i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
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

        $(document).ready(function () {
            let row_number = 1;
            $('#product_id').on('change', function () {
                var price = $(this).children('option:selected').data('price')
                $('#rate').val(price)
            })
            $('#tax_id').on('change', function () {
                var tax = $(this).children('option:selected').data('price')
                $("input").on("change", function () {
                    var ret = parseInt(tax) + parseInt($("#rate").val()) - parseInt($("#discount").val()  || '0')
                    $("#total").val(ret)
                })
            })

            $("#add_row").click(function (e) {
                e.preventDefault();
                let new_row_number = row_number - 1;
                $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                row_number++;

            });

            $("#delete_row").click(function (e) {
                e.preventDefault();
                if (row_number > 1) {
                    $("#product" + (row_number - 1)).html('');
                    row_number--;
                }
            });
        });

    </script>

@endsection


