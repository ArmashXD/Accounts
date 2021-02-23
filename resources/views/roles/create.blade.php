@extends('layout.app')

@section('content')
    <style>
        .form-check-inline {
            display: inline-flex;
            align-items: center;
            padding-left: 56px;
            margin: 1rem;
            margin-right: 51px;
        }
    </style>
    <div class="container">
        <div class="card">

            <form method="POST" action="{{route('roles.store')}}">
                @csrf
                <div class="card-header">
                    <div class="form-group">
                        <label for="">Enter Role</label>
                        <input class="form-control" id="name" name="name" type="text"
                               placeholder="Enter Role Name" required/>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <table class="table">

                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"> Name</th>
                                <th scope="col" style=""></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Categories
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%category%')->get() as $item)
                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Assets
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%asset%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Liabilities
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%liability%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Equity
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%equity%')->get() as $item)
                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Income
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%income%')->get() as $item)
                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Expenses
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%expense%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Products
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%product%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Suppliers
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%supplier%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                                       id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Purchases
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach(\Spatie\Permission\Models\Permission::where('name','LIKE','%purchase%')->get() as $item)

                                            <div class="form-check form-check-inline col-md-1"><input
                                                        class="form-check-input" name="permissions[]" type="checkbox"
                                                        id="inlineCheckbox1" value="{{$item->id}}">
                                                <span class="badge badge-primary" for="inlineCheckbox1"
                                                      style="font-size: 0.60rem">{{$item->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
                        </div>

                    </div>

            </form>
        </div>
    </div>
    </div>
@endsection
