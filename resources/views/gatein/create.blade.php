@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All GateIn </h4>
                    <a class="btn btn-primary float-right mb-2" href="{{ url('download/pdf') }}">Export to PDF</a>
                    <div class="table-responsive">
                        <form method="POST" action="{{route('gateIn.store')}}">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Purchase Id</th>
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
                                <form action="{{route('gateIn.store')}}">
                                @if(Session::get('data') == null)
                                    <tr>
                                        <td>No Gate ins</td>
                                    </tr>
                                    @else

                                        @forelse(Session::get('data') as $item)
                                            <tr>
                                                <td>
                                                    <input type="text" value="{{$item['id']}}" style="border: hidden"
                                                           name="id[]">
                                                </td>
                                                <td>
                                                    <input type="text" value="{{$item['purchase_id']}}" style="border: hidden"
                                                           name="purchase_id[]">
                                                </td>
                                                <td><input type="text" value="{{$item['invoice_number']}}" style="border: hidden"
                                                           name="invoice_number[]">
                                                </td>
                                                <td><input type="text" value="{{$item['name'] ?? 'asd'}}" name="name[]" style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['purchase_date']}}" style="border: hidden"
                                                           name="purchase_date[]">
                                                </td>
                                                <td><input type="text" value="{{$item['details']}}" name="details[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['supplier_id']}}" name="supplier_id[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['item_information']}}"
                                                           name="item_information" style="border: hidden"></td>
                                                <td><input type="text" value=" {{$item['quantity']}}" name="quantity[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value=" {{$item['rate']}}" name="rate[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['total']}}" name="total[]"
                                                           style="border: hidden"></td>
                                                <td>
                                                </td>
                                            </tr>

                                        @empty
                                            <p>No Gate In</p>
                                        @endforelse
                                        <button class="btn btn-primary float-right mb-2" type="submit">Add To Gate IN</button>
                                </form>
                                    @endif

                                {{--                            @foreach($cart as )--}}


                                {{--                            @endforeach--}}

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
