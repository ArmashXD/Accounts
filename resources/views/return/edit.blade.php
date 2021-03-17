@extends('layout.app')

@section('content')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('return.update',$return->id)}}">
                    @csrf
                    @method('PUT')
                    <form enctype="multipart/form-data" method="POST" action="{{route('return.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Sale Number</label>
                                <select name="sale_id" id="" class="form-control" placeholder="select one" required>
                                    @foreach($sale as $item)
                                        <option value="{{$sale->id}}">{{$item->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">product name</label>
                                <select name="product_id" id="" class="form-control" placeholder="select one" required>
                                    @foreach($product as $item)
                                        <option value="{{$product->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="example-date-input">Sale ID</label>
                                <select name="sale_id" id="" class="form-control" placeholder="select one" required>
                                    @foreach($sale as $item)
                                        <option value="{{$sale->id}}">{{$item->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Total</label>
                                <input class="form-control" id="total" value="{{$return->total}}" name="total" step="0" min="0.00" type="number"
                                       placeholder="0.00" required/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">quantity</label>
                                <input class="form-control" id="quantity" value="{{$return->quantity}}" name="quantity"  step="0" min="0.00" type="number"
                                       placeholder="0.00" required/>
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
