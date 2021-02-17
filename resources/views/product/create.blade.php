@extends('layout.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-title mb-3">Create A New Product</div>
            <form enctype="multipart/form-data" method="POST" action="{{route('products.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Name</label>
                        <input class="form-control" id="name" name="name" type="text"
                               placeholder="Enter Name" required/>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Detail</label>
                        <textarea class="form-control" name="details"  required></textarea>
                    </div>


                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Model</label>
                        <input class="form-control" id="date" name="model" type="text" placeholder="Enter Product Model" required/>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Serial Number</label>
                        <input class="form-control" id="name" name="serial_number"  type="text"
                               placeholder="Enter Sale Price" required/>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Sale Price</label>
                        <input class="form-control" id="name" name="sale_price" step="0" min="0.00" type="number"
                               placeholder="Enter Sale Price" required/>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Select Supplier</label>
                        <select name="supplier_id" id="" class="form-control">
                            @foreach($suppliers as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Enter Supplier Price</label>
                        <input class="form-control" id="name" name="supplier_price" step="0" min="0.00" type="number"
                               placeholder="Enter Supplier Price" required/>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Select Tax</label>
                        <select name="tax_id" id="" class="form-control">
                            @foreach($taxes as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="lastName1">Select Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label>Select Images</label>
                        <input type="file" class="form-control" name="images[]" placeholder="address" multiple>
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
