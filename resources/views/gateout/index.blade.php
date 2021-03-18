@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All
                        GateOut @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('gateout-create'))
                            <a href="{{route('gateOut.create')}}" class="btn btn-primary float-right">Add GateOut</a>
                        @endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sale ID</th>
                                <th scope="col">Sale Date</th>
                                <th scope="col">Code</th>
                                <th scope="col">details</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Tax ID</th>
                                <th scope="col">Unit ID</th>
                                <th scope="col">quantity</th>
                                <th scope="col">discount</th>
                                <th scope="col">rate</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($gateout as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->sale_id}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->customer_id}}</td>
                                    <td>{{$item->product_id}}</td>
                                    <td>{{$item->tax_id}}</td>
                                    <td>{{$item->unit_id}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->discount}}</td>
                                    <td>{{$item->rate}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger" href="#"><i
                                                class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Sales </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sale ID</th>
                                <th scope="col">Code</th>
                                <th scope="col">Sale Date</th>
                                <th scope="col">details</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Tax ID</th>
                                <th scope="col">Unit ID</th>
                                <th scope="col">quantity</th>
                                <th scope="col">discount</th>
                                <th scope="col">rate</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sale as $item)
                                <form action="{{route('session.getOut')}}" method="POST">

                                    @csrf
                                    <tr>
                                        <td><input type="text" value="{{$item->id}}" readonly style="border: hidden"
                                                   name="sale_id">
                                        </td>
                                        <td><input type="text" value="{{$item->code}}" style="border: hidden"
                                                   name="code">
                                        </td>
                                        <td><input type="text" value="{{$item->date}}" style="border: hidden"
                                                   name="sale_date"></td>
                                        <td><input type="text" value="{{$item->details}}" name="details"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->customer_id}}" style="border: hidden"
                                                   name="customer_id">
                                        </td>
                                        <td><input type="text" value="{{$item->product_id}}" name="product_id"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->tax_id}}" name="tax_id"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->unit_id}}" name="unit_id"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value=" {{$item->quantity}}" name="quantity"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value=" {{$item->discount}}" name="discount"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value=" {{$item->rate}}" name="rate"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->total}}" name="total"
                                                   style="border: hidden"></td>
                                        <td>
                                            @foreach($gateout as $gate )
                                            <button class="btn btn-primary" type="submit" {{$item->id == $gate->id ? 'disabled' : ''}}>Add To Get In</button>
                                            @endforeach
                                        </td>
                                    </tr>
                            </form>

                            @endforeach
                            </tbody>

                            <div class="float-right">
                                <button class="btn btn-primary" type="submit" >Export To PDF</button>
                            </div>

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
