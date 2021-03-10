<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index', ['sales' => Sale::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create', ['products' => Product::all(), 'units' => Unit::all(),
            'customers' => Customer::all(), 'taxes' => Tax::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale();

        foreach ($request->input('unit_id', []) as $unit) {
            $sale->date = $request->get('date');
            $sale->customer_id = $request->get('customer_id');
            $sale->details = $request->get('details');
            $sale->unit_id = $unit;
        }
        foreach ($request->input('product_id', []) as $product) {
            $sale->product_id = $product;
        }
        foreach ($request->input('quantity', []) as $quantity) {
            $sale->quantity = $quantity;

        }
        foreach ($request->input('rate', []) as $rate) {
            $sale->rate = $rate;

        }
        foreach ($request->input('tax_id', []) as $tax) {
            $sale->tax_id = $tax;
        }
        foreach ($request->input('discount', []) as $discount) {
            $sale->discount = $discount;
        }
        foreach ($request->input('total', []) as $total) {
            $sale->total = $total;
        }
        $sale->save();
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
        return view('sales.index', ['sales' => Sale::find($id), 'products' => Product::all(), 'units' => Unit::all(),
            'customers' => Customer::all(), 'taxs' => Tax::all()]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
        $sale->delete();
        return redirect()->back();
    }
}
