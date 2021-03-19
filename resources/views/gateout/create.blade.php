@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body shadow-lg rounded " style="color: #000">
                    <h4 class="card-title mb-3 text-light" style="color: #000">All GateOut
                        <a href="{{route('gateOut.index')}}" class="btn btn-primary float-right ml-2 shadow rounded">Add more GateOut</a>
                        <a class="btn btn-success float-right mb-2 mr-2 shadow rounded" href="{{ url('download/pdf-getout') }}" type="submit">Export To
                            PDF</a>
                    </h4>
                    <br>
                        <form method="POST" action="{{route('gateOut.store')}}">
                            @csrf
                            <form action="{{route('gateOut.store')}}">

                                @if(Session::get('reset') == null)
                                    <tr>
                                        <td> <p class="" style="color: #000">No Gate ins</p></td>
                                    </tr>
                                @else
                                    @forelse(Session::get('reset') as $item)
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="card text-left">
                                                <div class="card-body ">
                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item   border-0">Sale ID :
                                                            <input type="text"  value="{{$item['sale_id']}}"
                                                                   style="border: hidden" name="sale_id[]"></a>
                                                        <a href="#" class="list-group-item border-0">Code :
                                                            <input type="text" value="{{$item['code']}}" style="border: hidden"
                                                                   name="code[]"></a>
                                                        <a href="#" class="list-group-item border-0">Sale Date :
                                                            <input type="text" value="{{$item['sale_date']}}" style="border: hidden"
                                                                   name="sale_date[]"></a>
                                                        <a href="#" class="list-group-item border-0">Details :
                                                            <input type="text" value="{{$item['details']}}" name="details[]"
                                                                   style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Customer Id :
                                                            <input type="text" value="{{$item['customer_id']}}" name="customer_id[]"
                                                                   style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Product ID :
                                                            <input type="text" value="{{$item['product_id']}}"
                                                                   name="product_id" style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Tax ID :
                                                            <input type="text" value="{{$item['tax_id']}}"
                                                                   name="tax_id" style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Unit ID :
                                                            <input type="text" value="{{$item['unit_id']}}"
                                                                   name="unit_id" style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Quantity :
                                                            <input type="text" value=" {{$item['quantity']}}" name="quantity[]"
                                                                   style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Discount :
                                                            <input type="text" value=" {{$item['discount']}}" name="discount[]"
                                                                   style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Rate :
                                                            <input type="text" value=" {{$item['rate']}}" name="rate[]"
                                                                   style="border: hidden"></a>
                                                        <a href="#" class="list-group-item border-0">Total :
                                                            <input type="text" value="{{$item['total']}}" name="total[]"
                                                                   style="border: hidden"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No Gate In</p>
                                @endforelse
                                <button class="btn btn-primary float-right mb-2 btn-block" type="submit">Add To Get Out
                                </button>
                            </form>
                            @endif
                        </form>

                </div>
            </div>
        </div>
    </div>


@endsection
