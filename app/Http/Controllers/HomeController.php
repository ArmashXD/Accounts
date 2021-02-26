<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Media;
use App\Models\Product;
use App\models\Purchase;
use App\Models\Supplier;
use App\Models\Tax;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home',['products' ,$products  ]);
    }

}
