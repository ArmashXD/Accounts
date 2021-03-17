<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Sale;
use Illuminate\Http\Request;
use Validator;
use App\DynamicField;

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
        $customer = $request->get('customer_id');
        $details = $request->get('details');
        $date = $request->get('date');
        $unit_id = $request->input('unit_id', []);
        $product_id = $request->input('product_id', []);
        $quantity = $request->input('quantity', []);
        $rate = $request->input('rate', []);
        $tax_id = $request->input('tax_id', []);
        $tax = $request->input('tax',[]);
        $discount = $request->input('discount', []);
        for ($i = 0; $i < collect($request->get('product_id'))->count(); $i++) {
            $sale = new Sale();
            $sale->customer_id = $customer;
            $sale->details = $details;
            $sale->date = $date;
            $sale->unit_id = $unit_id[$i];
            $sale->product_id = $product_id[$i];
            $sale->quantity = $quantity[$i];
            $sale->rate = $rate[$i];
            $sale->tax_id = $tax_id[$i];
            $sale->discount = $discount[$i];
            $sale->total = ($rate[$i] * $quantity[$i]) -$discount[$i] + $tax[$i];
            $sale->save();
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
    public function edit(Sale $sale)
    {
        return view('sales.edit', ['sale' => $sale, 'products' => Product::all(), 'units' => Unit::all(),
            'customers' => Customer::all(), 'taxes' => Tax::all()]);
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
        $sale = sale::find($id);
        $sale->fill($request->all())->update();
        alert()->success('Success', "sale $sale->name Updated");
        return redirect()->back();
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
