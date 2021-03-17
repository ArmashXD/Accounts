@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Add Return<a href="{{route('return.index')}}"
                                                            class="btn btn-primary float-right">See Returns</a></div>
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
                            <select name="product_id" id="product_name" class="form-control" placeholder="select one" required>
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
                            <input class="form-control" id="total" name="total" step="0" min="0.00" type="number"
                                   placeholder="0.00" required/>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="firstName1">quantity</label>
                            <input class="form-control" id="quantity" name="quantity"  step="0" min="0.00" type="number"
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#product_id').on('change', function () {
            var name = $(this).children('option:selected').data('name')
            $('#product_name').val(name)
        })
    </script>
@endsection
