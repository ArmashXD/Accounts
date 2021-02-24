@extends('layout.app')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('expense-create'))
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create A New Expense</div>
                        <form method="POST" action="{{route('expenses.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                           placeholder="Enter Name"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Amount</label>
                                    <input class="form-control" id="name" name="amount" step="0" min="0.00"
                                           type="number"
                                           placeholder="Enter Amount"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Date</label>
                                    <input class="form-control" id="date" name="date" type="date"/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="lastName1">Select Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach(\App\Models\Category::where('type_id', 4)->get() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Expenses</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($expenses as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('expense-edit'))
                                            <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                    data-target="#expensesModal{{$item->id}}" href="#"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('expense-delete'))
                                            <form action="{{route('expenses.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="#"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="expensesModal{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Edit {{$item->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('expenses.update',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Name</label>
                                                            <input class="form-control" id="name"
                                                                   value="{{$item->name}}" name="name" type="text"
                                                                   placeholder="Enter Role Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Amount</label>
                                                            <input class="form-control" id="name" name="amount"
                                                                   value="{{$item->amount}}" step="0" min="0.00"
                                                                   type="number"
                                                                   placeholder="Enter Amount"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Date</label>
                                                            <input class="form-control" id="date" name="date"
                                                                   value="{{$item->date}}" type="date"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="lastName1">Select Category</label>
                                                            <select name="category_id" id="" class="form-control">
                                                                @foreach(\App\Models\Category::where('type_id', 4)->get() as $item)
                                                                    <option value="{{$item->id}}" {{$item->id == $item->category_id ? 'selected' : ''}}>{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$expenses->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
