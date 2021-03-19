<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Customer;
use App\Models\Equity;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Liability;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('sales.index', ['sales' => Sale::with('customer', 'product', 'tax', 'unit')->paginate(10), 'products' => Sale::with('customer', 'product', 'tax', 'unit')->get()]);
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
     * @return \Illuminate\Http\RedirectResponse
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
        $tax = $request->input('tax', []);
        $discount = $request->input('discount', []);
        $type = $request->get('type');
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
            $sale->total = ($rate[$i] * $quantity[$i]) - $discount[$i] + $tax[$i];
            $sale->type = $type;
            $category = $request->get('category_id');
            $sale->code = "SL-" . str_pad($i + 1, 8, "0", STR_PAD_LEFT);
            $sale->save();
            $this->checkSaleType($type, $sale, $category);
        }
        return redirect()->back();
    }

    protected function checkSaleType($type, $sale, $category)
    {
        switch ($type) {
            case 'Liabilities':
                $this->createTypeSale($sale->code, $sale->total, $sale->date, $category, new Liability());
                break;
            case 'Asset':
                $this->createTypeSale($sale->code, $sale->total, $sale->date, 1, new Asset());
                break;
            case 'Income':
                $this->createTypeSale($sale->code, $sale->total, $sale->date, 1, new Income());
                break;
            case 'Equity':
                $this->createTypeSale($sale->code, $sale->total, $sale->date, 1, new Equity());
                break;
            case 'Expense':
                $this->createTypeSale($sale->code, $sale->total, $sale->date, 1, new Expense());
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
        return view('sales.show', ['products' => Sale::where('code', $sale->code)->get()]);
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
