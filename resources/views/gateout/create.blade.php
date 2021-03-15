@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Gate Out </h4>

                    <div class="table-responsive">
                        <form method="POST" action="{{route('gateOut.store')}}">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                        <th scope="col">Sale ID</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Sale Date </th>
                                        <th scope="col">details</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Tax ID</th>
                                        <th scope="col">Unit ID</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">discount</th>
                                        <th scope="col">rate </th>
                                        <th scope="col">Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sale as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->date}}</td>
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
                                                <input type="checkbox" >
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                    <div class="float-right">
                                        <button class="btn btn-primary" type="submit">Export To PDF</button>
                                    </div>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

