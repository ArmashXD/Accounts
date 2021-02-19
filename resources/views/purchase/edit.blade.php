@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">edit purchase<a href="{{route('suppliers.index')}}"
                                                            class="btn btn-primary float-right">Add Supplier</a></div>
                <form enctype="multipart/form-data" method="POST" action="{{route('purchase.update',$purchase->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="lastName1">Select Supplier</label>
                            <select name="supplier_id" id="" class="form-control" placeholder="select one" >
                                @foreach($suppliers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">product name</label>
                            <input class="form-control" id="name" name="name"  type="text" value="{{$purchase->name}}"
                                   placeholder="Enter product name" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="example-date-input">Purchase Date</label>
                            <input class="form-control" id="name" name="purchase_date" type="date"value="{{$purchase->purchase_date}}"
                                   placeholder="Purchase Date" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">invoice Number</label>
                            <input class="form-control" id="date" name="invoice_number" type="text"value="{{$purchase->invoice_number}}" placeholder="Enter invoice number" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Enter Detail</label>
                            <textarea class="form-control"  name="details" value="{{$purchase->details}}" required></textarea>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">item information</label>
                            <input class="form-control" id="name" name="item_information"  value="{{$purchase->item_information}}"type="text"
                                   placeholder="Enter product name" required/>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Stock/Qnt</label>
                            <input class="form-control" id="name" name="" step="0" min="0.00" type="number"
                                   placeholder="0.00" disabled/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Qnt</label>
                            <input class="form-control" id="value1" name="quantity" step="0" value="{{$purchase->quantity}}" min="0.00" type="number"
                                   placeholder="0.00" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">rate</label>
                            <input class="form-control" id="value2" value="{{$purchase->rate}}" name="rate" step="0" min="0.00" type="number"
                                   placeholder="0.00" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">Total</label>
                            <input class="form-control" id="sum" value="{{$purchase->total}}" name="total" step="0" min="0.00" type="number"
                                   placeholder="0.00" />
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
