<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ url('/') }}">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-light">
@forelse(Session::get('reset') as $item)
    <div class="container-fluid">
        <div class="row bg-white p-3 mb-5">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">Sale Id</label>
                            <input type="text" value="{{$item['sale_id']}}" style="border: hidden"
                                   name="sale_id[]">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">Invoice No.</label>
                            <input type="text" value="{{$item['code']}}" style="border: hidden"
                                   name="code[]">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="job_title">Sale Date</label>
                            <input type="text" value="{{$item['sale_date']}}" style="border: hidden"
                                   name="sale_date[]">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="job_title">Details</label>
                            <input type="text" value="{{$item['details']}}" name="details[]"
                                   style="border: hidden">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="soldier_id">Customer ID</label>
                            <input type="text" value="{{$item['customer_id']}}" name="customer_id[]"
                                   style="border: hidden">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="birth_date_day">Product ID</label>
                            <input type="text" value="{{$item['product_id']}}"
                                   name="product_id" style="border: hidden"></td>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="month_id">Quantity</label>
                            <input type="text" value=" {{$item['quantity']}}" name="quantity[]"
                                   style="border: hidden">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birth_date_year">Discount</label>
                            <input type="text" value=" {{$item['discount']}}" name="discount[]"
                                   style="border: hidden">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birth_date_year">rate</label>
                            <input type="text" value=" {{$item['rate']}}" name="rate[]"
                                   style="border: hidden">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birth_date_year">total</label>
                            <input type="text" value="{{$item['total']}}" name="total[]"
                                   style="border: hidden">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</body>
</html>
