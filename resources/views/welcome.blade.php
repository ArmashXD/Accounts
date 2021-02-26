@extends('layout.app')

@section('content')
    <div class="breadcrumb">
        <h1 class="mr-2">Version 2</h1>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li>Version 2</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- CARD ICON-->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-icon mb-4">

                        <div class="card-body text-center"><i class="i-Data-Upload"></i>
                            <p class="text-muted mt-2 mb-2">Total Product</p>
                            <p class="text-primary text-24 line-height-1 m-0">{{\App\Models\Product::all()->count()}}</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center"><i class="i-Add-User"></i>
                            <p class="text-muted mt-2 mb-2">New Users</p>
                            <p class="text-primary text-24 line-height-1 m-0">{{\App\Models\User::all()->count()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-icon mb-4">
                        <div class="card-body text-center"><i class="i-Money-2"></i>
                            <p class="text-muted mt-2 mb-2">Total Tax</p>
                            <p class="text-primary text-24 line-height-1 m-0">{{\App\Models\Tax::all()->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card mb-4">
                <div class="card-body p-0">
                    <h5 class="card-title m-0 p-3">taxes </h5>
                    <div id="echart4" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card mb-4">
                <div class="card-body p-0">
                    <h5 class="card-title m-0 p-3 ">Products  </h5>
                    <div id="echart5" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card mb-12">
                <div class="card-body p-0 dropdown">
                    <h5 class="card-title m-0 p-3 dropdown-toggle" data-toggle="dropdown" >See Tables
                        <span class="caret"></span></h5>
                    <ul class="dropdown-menu dropdown-menu-right card-body">
                        <li  data-toggle="collapse" data-target="#demo">
                            Products</li>
                        <li data-toggle="collapse" data-target="#demo1">
                            Taxes</li>
                        <li data-toggle="collapse" data-target="#demo2">
                            Purchases</li>
                    </ul>
                </div>
                    <div id="demo" class="collapse card-title m-0 p-3 card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Model</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Supplier Price</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Category</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach(\App\Models\Product::all() as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->sale_price}}</td>
                                    <td>{{$item->serial_number}}</td>
                                    <td>{{$item->supplier->name}}</td>
                                    <td>{{$item->supplier_price}}</td>
                                    <td>{{$item->tax->name}}</td>
                                    <td>{{$item->mainCategory->name}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo" >
                                Close</button>
                            <a href="{{route('products.create')}}"
                               class="btn btn-primary float-right">Add Product</a>
                        </table>
                    </div>
                    <div id="demo1" class="collapse card-title m-0 p-3 card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach(\App\Models\Product::all() as $item)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->percentage}} %</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo1" >
                                Close</button>
                            <a href="{{route('taxes.index')}}"
                               class="btn btn-primary float-right">Add Tax</a>
                        </table>
                    </div>
                    <div id="demo2" class="collapse card-title m-0 p-3 card-body">
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
                            @foreach(\App\Models\Purchase::all() as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->invoice_number}}</td>
                                    <td>{{rand(0, 99999)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->purchase_date}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo2" >
                                Close</button>
                            <a href="{{route('purchase.create')}}"
                               class="btn btn-primary float-right">Add Purchase</a>
                        </table>
                    </div>
            </div>
        </div>
        <!-- end of col-->

        <!-- best-sellers-->
        <div class="col-xl-8 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="ul-widget__head">
                        <div class="ul-widget__head-label">
                            <h3 class="ul-widget__head-title">Best Sellers</h3>
                        </div>
                        <div class="ul-widget__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold ul-widget-nav-tabs-line" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                                        href="#ul-widget5-tab1-content" role="tab" aria-selected="true">Latest</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                        href="#ul-widget5-tab2-content" role="tab"
                                                        aria-selected="false">Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ul-widget__body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="ul-widget5-tab1-content">
                                <div class="ul-widget5">
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/iphone-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">19,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">1046</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/speaker-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">29,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">4500</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/watch-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">23,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">2046</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="ul-widget5-tab2-content">
                                <div class="ul-widget5">
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/speaker-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">19,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">1046</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/iphone-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">29,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">4500</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__item">
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__pic"><img
                                                        src="../../dist-assets/images/products/watch-1.jpg"
                                                        alt="Third slide"/></div>
                                            <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">Great
                                                    Logo Designn</a>
                                                <p class="ul-widget5__desc">UI lib admin themes.</p>
                                                <div class="ul-widget5__info"><span>Author:</span><span
                                                            class="text-primary">Jon Snow</span><span>Released:</span><span
                                                            class="text-primary">23.08.17</span></div>
                                            </div>
                                        </div>
                                        <div class="ul-widget5__content">
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">23,200</span><span
                                                        class="ul-widget5__sales text-mute">sales</span></div>
                                            <div class="ul-widget5__stats"><span
                                                        class="ul-widget5__number">2046</span><span
                                                        class="ul-widget5__sales text-mute">votes</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest-log-->
        <div class="col-lg-4 col-xl-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="ul-widget__head">
                        <div class="ul-widget__head-label">
                            <h3 class="ul-widget__head-title">Latest Log</h3>
                        </div>
                        <div class="ul-widget__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold ul-widget-nav-tabs-line" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                                        href="#__g-widget-s6-tab1-content" role="tab"
                                                        aria-selected="true">Today</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                        href="#__g-widget-s6-tab2-content" role="tab"
                                                        aria-selected="false">Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ul-widget__body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="__g-widget-s6-tab1-content">
                                <div class="ul-widget-s6__items">
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-primary ul-widget6__dot"></p>
                                    </span><span class="ul-widget-s6__text">12 new users registered</span><span
                                                class="ul-widget-s6__time">Just Now</span></div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-success ul-widget6__dot"></p>
                                    </span>
                                        <p class="ul-widget-s6__text">System shutdown<span
                                                    class="badge badge-pill badge-primary m-2">Primary</span></p><span
                                                class="ul-widget-s6__time">14 mins</span>
                                    </div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-warning ul-widget6__dot"></p>
                                    </span><span class="ul-widget-s6__text">System error -<a
                                                    class="typo_link text-danger"
                                                    href="#">Danger state text</a></span><span
                                                class="ul-widget-s6__time">2 hrs </span></div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-danger ul-widget6__dot"></p>
                                    </span><span class="ul-widget-s6__text">12 new users registered</span><span
                                                class="ul-widget-s6__time">Just Now</span></div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-info ul-widget6__dot"></p>
                                    </span>
                                        <p class="ul-widget-s6__text">System shutdown<span
                                                    class="badge badge-pill badge-success m-2">Primary</span></p><span
                                                class="ul-widget-s6__time">14 mins</span>
                                    </div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-dark ul-widget6__dot"></p>
                                    </span><span class="ul-widget-s6__text">System error -<a
                                                    class="typo_link text-danger"
                                                    href="#">Danger state text</a></span><span
                                                class="ul-widget-s6__time">2 hrs </span></div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-primary ul-widget6__dot"></p>
                                    </span><span class="ul-widget-s6__text">12 new users registered</span><span
                                                class="ul-widget-s6__time">Just Now</span></div>
                                    <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                        <p class="badge-dot-success ul-widget6__dot"></p>
                                    </span>
                                        <p class="ul-widget-s6__text">System shutdown<span
                                                    class="badge badge-pill badge-danger m-2">Primary</span></p><span
                                                class="ul-widget-s6__time">14 mins</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="__g-widget-s6-tab2-content">
                                <div class="ul-widget2">
                                    <div class="ul-widget-s6__items">
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-danger ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">44 new users registered</span><span
                                                    class="ul-widget-s6__time">Just Now</span></div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-warning ul-widget6__dot"></p>
                                        </span>
                                            <p class="ul-widget-s6__text">System shutdown<span
                                                        class="badge badge-pill badge-primary m-2">Primary</span></p>
                                            <span class="ul-widget-s6__time">14 mins</span>
                                        </div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-primary ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">System error -<a
                                                        class="typo_link text-danger"
                                                        href="#">Danger state text</a></span><span
                                                    class="ul-widget-s6__time">2 hrs </span></div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-danger ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">12 new users registered</span><span
                                                    class="ul-widget-s6__time">Just Now</span></div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-info ul-widget6__dot"></p>
                                        </span>
                                            <p class="ul-widget-s6__text">System shutdown<span
                                                        class="badge badge-pill badge-success m-2">Primary</span></p>
                                            <span class="ul-widget-s6__time">14 mins</span>
                                        </div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-dark ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">System error -<a
                                                        class="typo_link text-danger"
                                                        href="#">Danger state text</a></span><span
                                                    class="ul-widget-s6__time">2 hrs </span></div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-primary ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">12 new users registered</span><span
                                                    class="ul-widget-s6__time">Just Now</span></div>
                                        <div class="ul-widget-s6__item"><span class="ul-widget-s6__badge">
                                            <p class="badge-dot-success ul-widget6__dot"></p>
                                        </span><span class="ul-widget-s6__text">System shutdown<span
                                                        class="badge badge-pill badge-danger m-2">Primary</span></span><span
                                                    class="ul-widget-s6__time">14 mins</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- end of row-->
<!-- end of main-content -->
