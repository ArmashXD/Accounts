@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All GateOut @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('gateout-create'))
                            <a href="{{route('gateOut.create')}}" class="btn btn-primary float-right">Add GateOut</a>
                        @endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sale ID</th>
                                <th scope="col">Sale Date </th>
                                <th scope="col">Code </th>
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

                            @foreach($gateout as $item)
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
                                        <button type="submit" class="btn btn-danger" href="#"><i
                                                class="nav-icon i-Close-Window font-weight-bold"></i></button>
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

@endsection
