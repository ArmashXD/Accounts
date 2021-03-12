@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">manage purchase @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('purchases-create')) <a href="{{route('purchase.create')}}"
                                                                class="btn btn-primary float-right">Add purchase</a>@endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Purchase ID</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Purchase Date </th>
                                <th scope="col">Total Amount</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>

                            @foreach($purchase as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->invoice_number}}</td>
                                    <td>{{rand(0, 99999)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->purchase_date}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('purchases-edit'))
                                            <a class="text-success mr-2 btn btn-info"
                                               href="{{route('purchase.edit',$item->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('purchases-delete'))
                                            <form action="{{route('purchase.destroy',$item->id)}}" method="POST">
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
