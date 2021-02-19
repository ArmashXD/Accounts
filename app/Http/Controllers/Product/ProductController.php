<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Media;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Tax;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('product.index', ['products' => Media::with('product')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('product.create', ['categories' => MainCategory::all(),
            'suppliers' => Supplier::all(), 'taxes' => Tax::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tax_id' => 'required',
            'sale_price' => 'required',
            'name' => 'required',
            'serial_number' => 'required',
            'supplier_price' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'images' => 'required'
        ]);
        $product = new Product();
        $product->fill($request->all())->save();
        if ($request->hasfile('images')) {
            Media::imageUpload($request, $product);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->fill($request->all())->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        Media::imageDelete($product);
        $product->delete();
        return redirect()->back();
    }
}
