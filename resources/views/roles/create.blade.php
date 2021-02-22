@extends('layout.app')

@section('content')
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
                <th scope="col">Select Permissions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Accounts
                </td>
                <td>
                    <div class="row">
                        @foreach($permissions as $item)
                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]"  type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
                            </div>
                        @endforeach
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    Users
                </td>
                <td>
                    <div class="row">
                        @foreach($permissions as $item)

                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
                            </div>
                        @endforeach
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    categories
                </td>
                <td>
                    <div class="row">
                        @foreach($permissions as $item)

                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]"  type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
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
                        @foreach($permissions as $item)
                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input"  name="permissions[]" type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
                            </div>
                        @endforeach
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    Taxes
                </td>
                <td>
                    <div class="row">
                        @foreach($permissions as $item)
                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]"  type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
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
                        @foreach($permissions as $item)

                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]"  type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
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
                        @foreach($permissions as $item)

                            <div class="form-check form-check-inline col-md-1">
                                <input class="form-check-input" name="permissions[]"  type="checkbox" id="inlineCheckbox1" value="{{$item->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
                            </div>
                        @endforeach
                    </div>

                </td>
            </tr>

            </tbody>
        </table>
        <div class="col-md-12">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>

    </div>

</form>
        </div>
    </div>
</div>
    @endsection
