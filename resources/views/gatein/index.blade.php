@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All GateIn
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Purchase ID</th>
                                <th scope="col">Purchase Name</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">details</th>
                                <th scope="col">supplier id</th>
                                <th scope="col">item_information</th>
                                <th scope="col">quantity</th>
                                <th scope="col">rate</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($gatein as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->invoice_number}}</td>
                                    <td>{{$item->purchase_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->purchase_date}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->supplier_id}}</td>
                                    <td>{{$item->item_information}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->rate}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        </form>
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
                    <h4 class="card-title mb-3">All
                        GateIn @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('gatein-create'))
                            <a href="{{route('gateIn.create')}}" class="btn btn-primary float-right">Add GateIn</a>
                        @endif
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Purchase ID</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Purchase Name</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">details</th>
                                <th scope="col">supplier id</th>
                                <th scope="col">item_information</th>
                                <th scope="col">quantity</th>
                                <th scope="col">rate</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($purchase as $item)
                                <form action="{{route('session.getIn')}}" method="POST">
                                    @csrf
                                    <tr>
                                        <td><input type="text" value="{{$item->id}}" readonly style="border: hidden"
                                                   name="purchase_id">
                                        </td>
                                        <td><input type="text" value="{{$item->invoice_number}}" style="border: hidden"
                                                   name="invoice_number">
                                        </td>
                                        <td><input type="text" value="{{$item->name}}" style="border: hidden"
                                                   name="name"></td>
                                        <td><input type="text" value="{{$item->purchase_date}}" style="border: hidden"
                                                   name="purchase_date">
                                        </td>
                                        <td><input type="text" value="{{$item->details}}" name="details"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->supplier_id}}" name="supplier_id"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->item_information}}"
                                                   name="item_information" style="border: hidden"></td>
                                        <td><input type="text" value=" {{$item->quantity}}" name="quantity"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value=" {{$item->rate}}" name="rate"
                                                   style="border: hidden"></td>
                                        <td><input type="text" value="{{$item->total}}" name="total"
                                                   style="border: hidden"></td>
                                        <td>
                                            @foreach($gatein as $get)

                                                <button class="btn btn-primary" type="submit" {{$item->id == $get->id ? 'selected' : ''}}>Add To Get In</button>
                                            @endforeach

                                        </td>
                                    </tr>

                                </form>
                            @endforeach

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


@endsection
