@extends('layout.app')

@section('content')
    <div class="container">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Bank Transaction
@if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('bank-create'))
                            <a href="{{route('bank.create')}}"class="btn btn-primary float-right">Add New Bank</a>@endif
                    </h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Branch </th>
                                <th scope="col">Signature Picture</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>

                            @foreach($banks as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->ac_number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->ac_name}}</td>
                                    <td>{{$item->branch}}</td>
                                    <td>{{$item->image_url}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('bank-edit'))
                                            <a class="text-success mr-2 btn btn-info"
                                               href="{{route('bank.edit',$item->id)}}"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('bank-delete'))
                                            <form action="{{route('bank.destroy',$item->id)}}" method="POST">
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
