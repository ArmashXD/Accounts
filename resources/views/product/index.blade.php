@extends('layout.app')

@section('content')
    <div class="container">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Products
                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('product-edit'))
                            <a href="{{route('products.create')}}"
                                                                class="btn btn-primary float-right">Add Product</a>
                            @endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Model</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Supplier Price</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter{{$item->id}}">
                                            {{$item->product->name}} </button>
                                    </td>
                                    <td>{{$item->product->details}}</td>
                                    <td>{{$item->product->model}}</td>
                                    <td>{{$item->product->sale_price}}</td>
                                    <td>{{$item->product->serial_number}}</td>
                                    <td>{{$item->product->supplier->name}}</td>
                                    <td>{{$item->product->supplier_price}}</td>
                                    <td>{{$item->product->tax->name}}</td>
                                    <td>{{$item->product->mainCategory->name}}</td>
                                    <td>{{$item->product->created_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('product-edit'))
                                            <a class="text-success mr-2 btn btn-info" 
                                               href="{{route('products.edit',$item->product->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('product-delete'))
                                            <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p><strong>Name: </strong>{{$item->product->name}}</p>
                                                        <p><strong>Details: </strong>{{$item->product->details}}</p>
                                                        <p><strong>Model: </strong>{{$item->product->model}}</p>
                                                        <p><strong>Price: </strong>{{$item->product->sale_price}}</p>
                                                        <p><strong>S.NO: </strong>{{$item->product->serial_number}}</p>
                                                        <p><strong>Supplier
                                                                Name: </strong>{{$item->product->supplier->name}}</p>
                                                        <p><strong>Supplier
                                                                Price: </strong>{{$item->product->supplier_price}}</p>
                                                        <p><strong>Tax Name: </strong>{{$item->product->tax->name}}</p>
                                                        <p>
                                                            <strong>Category: </strong>{{$item->product->mainCategory->name}}
                                                        </p>
                                                        <p><strong>Created at: </strong>{{$item->created_at}}</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="carouselExampleSlidesOnly" class="carousel slide"
                                                             data-ride="carousel">
                                                                @foreach(json_decode($item->image_url) as $p)
                                                                <div class="carousel-inner">

                                                                    <div class="carousel-item active">
                                                                        <img class="d-block w-100"
                                                                             src="{{asset('/images/'. $p)}}"/>
                                                                    </div>
                                                                </div>

                                                                @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
