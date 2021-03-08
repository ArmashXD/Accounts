@extends('layout.app')

@section('content')
    <div class="container">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Sales
                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('sale-edit'))
                            <a href="{{route('sale.create')}}"
                               class="btn btn-primary float-right">Add Sale</a>
                        @endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Item Information</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$sale->code}}</td>
                                    <td>{{$sale->customer->name}}</td>
                                    <td>{{$sale->total}}</td>
                                    <td>{{$sale->product->name}}</td>
                                    <td>{{$sale->date}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('sale-edit'))
                                            <a class="text-success mr-2 btn btn-info"
                                               href="{{route('sale.edit',$sale->product->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('sale-delete'))
                                            <form action="{{route('sale.destroy',$sale)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        @endif
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
