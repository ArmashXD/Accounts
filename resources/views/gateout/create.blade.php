@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All GateOut </h4>
                    <a class="btn btn-primary float-right mb-2" href="{{ url('download/pdf') }}">Export to PDF</a>
                    <div class="table-responsive">
                        <form method="POST" action="{{route('gateOut.store')}}">
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
{{--                                    <th>#</th>--}}
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

                                <form action="{{route('gateOut.store')}}">
                                    @if(Session::get('reset') == null)
                                        <tr>
                                            <td>No Gate ins</td>
                                        </tr>
                                    @else
{{--                                        {{Session::get('data')}}--}}
{{--                                        @php--}}
{{--                                            $count = 1;--}}
{{--                                        @endphp--}}
                                        @forelse(Session::get('reset') as $item)
                                            <tr>
{{--                                                <td>--}}
{{--                                                    <input type="text" value="{{$count++}}" style="border: hidden"--}}
{{--                                                           name="id[]">--}}
{{--                                                </td>--}}
                                                <td>
                                                    <input type="text" value="{{$item['sale_id']}}" style="border: hidden"
                                                           name="sale_id[]">
                                                </td>
                                                <td><input type="text" value="{{$item['code']}}" style="border: hidden"
                                                           name="code[]">
                                                </td>

                                                <td><input type="text" value="{{$item['sale_date']}}" style="border: hidden"
                                                           name="sale_date[]">
                                                </td>
                                                <td><input type="text" value="{{$item['details']}}" name="details[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['customer_id']}}" name="customer_id[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['product_id']}}"
                                                           name="product_id" style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['tax_id']}}"
                                                           name="tax_id" style="border: hidden"></td>
                                                <td><input type="text" value="{{$item['unit_id']}}"
                                                           name="unit_id" style="border: hidden"></td>
                                                <td><input type="text" value=" {{$item['quantity']}}" name="quantity[]"
                                                           style="border: hidden"></td>
                                                <td><input type="text" value=" {{$item['discount']}}" name="discount[]"
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

                                        <button class="btn btn-primary float-right mb-2" type="submit">Add To Get Out</button>
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
