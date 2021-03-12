@extends('layout.app')

@section('content')
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">manage Bank
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('transaction-create'))
                            <a href="{{route('transaction.create')}}"class="btn btn-primary float-right">Add Transaction</a>@endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Account Type</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Withdraw / Deposite ID</th>
                                <th scope="col">Amount </th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>

                            @foreach($transaction as $item)
                                <tr>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->ac_type}}</td>
                                    <td>{{$item->bank->name}}</td>
                                    <td>{{$item->dep_id}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('transaction-edit'))
                                            <a class="text-success mr-2 btn btn-info"
                                               href="{{route('transaction.edit',$item->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('transaction-delete'))
                                            <form action="{{route('transaction.destroy',$item->id)}}" method="POST">
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
