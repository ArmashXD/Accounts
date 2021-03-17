@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Return
                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('return-edit'))
                            <a href="{{route('return.create')}}"
                               class="btn btn-primary float-right">Add return</a>
                        @endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Purchase ID</th>
                                <th scope="col">Sale ID</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($returns as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->purchase_id}}</td>
                                    <td>{{$item->sale_id}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('return-edit'))
                                            <a class="text-success mr-2 btn btn-info" data-toggle="modal"
                                               href="{{route('return.edit',$item->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('return-delete'))
                                            <form action="{{route('return.destroy',$item->id)}}" method="POST">
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
