@extends('layout.app')

@section('content')
    <div class="row">
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
                            <select name="customer_id" id="customer_id" required class="form-control">
                                <option value="">Please Select Customer</option>
                                @foreach($customers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Date</label>
                            <input class="form-control" id="name" name="date" type="date"
                                   placeholder="Enter date" {{old('date')}} required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Details</label>
                            <input class="form-control" id="details" name="details" type="text"
                                   placeholder="Enter invoice details" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Type</label>
                            <select name="type" class="form-control" id="type"
                                    onchange="document.getElementById('form-type').submit();">
                                <option value="">Please Select Type</option>
                                <option value="Asset">Asset</option>
                                <option value="Liabilities">Liabilities</option>
                                <option value="Equity">Equity</option>
                                <option value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Category Of Type</label>
                            <select name="category_id" class="form-control" id="">
                                <option value="">Please Select Type</option>
                                @forelse(\App\Models\Category::all() ?? [] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                    <option value=""></option>
                                @endforelse
                            </select>
                        </div>

                        <table class="table" id="products_table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Unit</th>
                                <th></th>
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
                                    <input type="number" name="quantity[]" id="qty" class="form-control"/>
                                </td>
                                <input class="form-control" id="rate" name="rate[]" type="hidden"
                                       placeholder="Enter Rate" required/>
                                <td>
                                    <input class="form-control" id="discount" name="discount[]" type="number"
                                           placeholder="Enter discount %" required/>
                                </td>
                                <td>
                                    <select name="tax_id[]" id="tax_id" class="form-control">
                                        <option value="">Please Select Tax</option>
                                        @foreach($taxes as $item)
                                            <option value="{{$item->id}}"
                                                    data-price="{{$item->percentage}}">{{$item->percentage}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" id="tax" name="tax[]" type="hidden" required/>
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
        let row_number = 1;
        $("#add_row").click(function (e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
            row_number++;
        });
        $('#product_id').on('change', function () {
            let price = $(this).children('option:selected').data('price')
            $('#rate').val(price)
        })
        $("#delete_row").click(function (e) {
            e.preventDefault();
            if (row_number > 1) {
                $("#product" + (row_number - 1)).html('');
                row_number--;
            }
        });
        $('#tax_id').on('change', function () {
            var tax = $(this).children('option:selected').data('price')
            $("#tax").val(tax)
        })
        // // $(function(){
        // //     $('#value1, #value2').keyup(function(){
        // //         var value1 = parseFloat($('#value1').val()) || 0;
        // //         var value2 = parseFloat($('#value2').val()) || 0;
        // //         $('#sum').val(value1 * value2);
        // //     });
        // // });
    </script>

@endsection


