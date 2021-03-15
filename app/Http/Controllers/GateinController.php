<?php

namespace App\Http\Controllers;

use App\Models\GateIn;
use App\Models\Purchase;
use Illuminate\Http\Request;
use PDF;

class GateinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gatein.index', ['gatein'=>GateIn::all(),'purchase'=>Purchase::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gatein.create', ['purchase' => Purchase::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $gatein = new GateIn();
        $gatein->fill($request->all())->save();
        alert()->success('Success', "gateIn $gatein->name Created");
        return redirect()->back();

//        $gatein = Product::find($id); 
//        if(!$gatein) { 
//            abort(404); 
//        }
// 
//        $cart = session()->get('cart');
// 
//        // if cart is empty then this the first product
//        if(!$cart) { 
//            $cart = [
//                            $id => [
//                                "name" => $product->name,
//                        "quantity" => 1,
//                        "price" => $product->price,
//                        "photo" => $product->photo
//                    ]
//            ]; 
//            session()->put('cart', $cart); 
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
//        } 
//        // if cart not empty then check if this product exist then increment quantity
//        if(isset($cart[$id])) { 
//            $cart[$id]['quantity']++; 
//            session()->put('cart', $cart); 
//            return redirect()->back()->with('success', 'Product added to cart successfully!'); 
//        } 
//        // if item not exist in cart then add to cart with quantity = 1
//        $cart[$id] = [
//                    "name" => $product->name,
//            "quantity" => 1,
//            "price" => $product->price,
//            "photo" => $product->photo
//        ]; 
//        session()->put('cart', $cart); 
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 


}
