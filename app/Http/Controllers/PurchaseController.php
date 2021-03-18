<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase.index', ['purchase' => Purchase::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.create', ['suppliers' => Supplier::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'name' => 'required',
            'purchase_date' => 'required',
            'invoice_number' => 'required',
        ]);
        $purchase = new Purchase();
        $purchase->fill($request->all())->save();
        alert()->success('Success', "Purchase $purchase->name Created");
        return redirect('account/purchase');
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
        return view('purchase.edit', ['purchase' => Purchase::find($id), 'suppliers' => Supplier::all()]);
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
        $purchase = purchase::find($id);
        $purchase->fill($request->all())->update();
        alert()->success('Success', "Purchase $purchase->name Updated");
        return redirect('account/purchase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = purchase::find($id);
        $purchase->delete();
        alert()->success('Success', "Purchase $purchase->name Deleted");
        return redirect()->back();
    }

}
