<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Returns;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('return.index', ['returns' => Returns::all(), 'product' => Product::all(), 'sale' => Sale::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('return.create', ['returns' => Returns::all(), 'product' => Product::all(), 'sale' => Sale::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $return = new Returns();
        $return->fill($request->all())->save();
        alert()->success('Success', "Return $return->id Created");
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
        return view('purchase.edit', ['returns' => Returns::find($id), 'purchase' => Purchase::all(), 'sale' => Sale::all()]);
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
        $return = Returns::find($id);
        $return->fill($request->all())->update();
        alert()->success('Success', "Return $return->id Updated");
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
        $return = Returns::find($id);
        $return->delete();
        alert()->success('Success', "Return $return->id Deleted");
        return redirect()->back();
    }
}
