@extends('layout.app')

@section('content')
    <div class="row">

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
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($sales->unique('code') as $sale)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter{{$sale->id}}"
                                                href="{{route('sale.show',$sale)}}">{{$sale->code}}</button>
                                    </td>
                                    <td>{{$sale->customer->name}}</td>
                                    <td>{{$sale->total}}</td>
                                    <td>{{$sale->type}}</td>
                                    <td>{{$sale->date}}</td>
                                    <td>

                                        <div style="display: flex">
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('sale-edit'))
                                            <a class="text-success mr-2 btn btn-info"
                                               href="{{route('sale.show',$sale)}}"><i
                                                    class="nav-icon i-Eye-Scan font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('sale-delete'))
                                            <form action="{{route('sale.destroy',$sale)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModalCenter{{$sale->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Products Of This
                                                    Sale</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach($products as $item)
                                                    @if($sale->code == $item->code)
                                                        <p>{{$item->code}}</p>
                                                        <p>{{$item->product->name}}</p>
                                                    @endif
                                                @endforeach
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
                    {{$sales->links()}}
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
