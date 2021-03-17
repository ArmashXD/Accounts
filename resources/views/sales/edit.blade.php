@extends('layout.app')

@section('content')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">edit sale<a href="{{route('sale.index')}}"
                                                             class="btn btn-primary float-right">All Sale</a></div>
                <form enctype="multipart/form-data" method="POST" action="{{route('sale.update',$sale)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control" required>
                                <option value="">Please Select Cusomter</option>
                                @foreach($customers as $item)
                                    <option value="{{$item->id}}"
                                            {{$item->id == $sale->customer_id ? 'selected' : ''}}
                                            data-price="{{ $item->sale_price }}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Date</label>
                            <input class="form-control" id="name" name="date" type="date"
                                   placeholder="Enter date" value="{{$sale->date}}" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Details</label>
                            <input class="form-control" value="{{$sale->details}}" id="details" name="details" type="text"
                                   placeholder="Enter invoice details" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1"> Product</label>
                        <select name="product_id"  id="product_id" class="form-control" required>
                            <option value="">Please Select Product</option>
                            @foreach($products as $item)
                                <option value="{{$item->id}}"
                                        {{$item->id == $sale->product_id ? 'selected' : ''}}
                                        data-price="{{ $item->sale_price }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">quantity</label>
                            <input type="number" value="{{$sale->quantity}}" name="quantity" id="qty" class="form-control" value="1" required/>
                        </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">rate</label>
                                <input class="form-control" value="{{$sale->rate}}" id="rate" name="rate" type="number"
                                       placeholder="Enter Rate" required/>
                            </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">discount</label>
                                    <input class="form-control" value="{{$sale->discount}}" id="discount" name="discount" type="number"
                                           placeholder="Enter discount %" required/>
                                </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">total</label>
                                        <input class="form-control" value="{{$sale->total}}" id="total" name="total" type="number"
                                               placeholder="Total + Tax" required />
                                    </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Tax</label>
                            <select name="tax_id"  id="tax_id"  class="form-control" required>
                                <option value="">Please Select Tax</option>
                                @foreach($taxes as $item)
                                    <option value="{{$item->id}}"
                                            {{$item->id == $sale->tax_id ? 'selected' : ''}}
                                            data-price="{{$item->percentage}}">{{$item->percentage}} %
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Unit</label>
                                <select name="unit_id" id="unit_id" class="form-control" required>
                                    <option value="">Please Select Unit</option>
                                    @foreach(\App\Models\Unit::where('type_id', 7)->get() as $item)
                                        <option value="{{$item->id}}" {{$item->id == $sale->unit_id ? 'selected' : ''}}>{{$item->name}}</option>
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            $(document).ready(function () {
                // let row_number = 1;
                $('#product_id').on('change', function () {
                    var price = $(this).children('option:selected').data('price')
                    $('#rate').val(price)
                })
                $('#tax_id').on('change', function () {
                    var tax = $(this).children('option:selected').data('price')
                })
                $("input").on("change", function () {
                    var ret = parseInt(tax) + parseInt($("#rate").val()) - parseInt($("#discount").val() * parseInt($("#qty").val())  || '0')
                    $("#total").val(ret)
                })

                // $("#add_row").click(function (e) {
                //     e.preventDefault();
                //     let new_row_number = row_number - 1;
                //     $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                //     $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                //     row_number++;
                //
                // });
                //
                // $("#delete_row").click(function (e) {
                //     e.preventDefault();
                //     if (row_number > 1) {
                //         $("#product" + (row_number - 1)).html('');
                //         row_number--;
                //     }
                // });
            });

        </script>
    </div>
@endsection
