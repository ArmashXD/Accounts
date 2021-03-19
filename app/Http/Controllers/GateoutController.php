<?php

namespace App\Http\Controllers;

use App\Models\GateOut;
use App\Models\Sale;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class GateoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gateout.index', ['gateout' => GateOut::all(), 'sale' => Sale::all(), 'cart' => Cart::content()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeOutSession(Request $request)
    {
        $reset = [
//            'id' => $request->get('id'),
            'sale_id' => $request->get('sale_id'),
            'code' => $request->get('code'),
            'sale_date' => $request->get('sale_date'),
            'details' => $request->get('details'),
            'customer_id' => $request->get('customer_id'),
            'product_id' => $request->get('product_id'),
            'tax_id' => $request->get('tax_id'),
            'unit_id' => $request->get('unit_id'),
            'quantity' => $request->get('quantity'),
            'discount' => $request->get('discount'),
            'rate' => $request->get('rate'),
            'total' => $request->get('total')
        ];
//        dd($reset);
        Session::push('reset', $reset);
        return redirect()->route('gateOut.create');
    }

    public function downloadPDF(){
        set_time_limit(600);
        $pdf = PDF::loadview('gateOut.pdf');
        return $pdf->download('GateOut.pdf');
    }
    public function create()
    {
        return view('gateout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $id = $request->get('id');
        $sale_id = $request->get('sale_id');
        $code = $request->get('code');
        $sale_date = $request->get('sale_date');
        $details = $request->get('details');
        $customer_id = $request->get('customer_id');
        $product_id = $request->get('product_id');
        $unit_id = $request->get('unit_id');
        $quantity = $request->get('quantity');
        $rate = $request->get('rate');
        $discount = $request->get('discount');
        $tax_id = $request->get('tax_id');
        $total = $request->get('total');
        for ($i = 0; $i < collect($request->get('code'))->count(); $i++) {
            GateOut::insert([
//                'id' => $id[$i],
                'sale_id' => $sale_id[$i],
                'details' => $details[$i],
                'code' => $code[$i],
                'date' => $sale_date[$i],
                'customer_id' => $customer_id[$i],
                'product_id' => $product_id[$i],
                'quantity' => $quantity[$i],
                'discount' => $discount[$i],
                'rate' => $rate[$i],
                'total' => $total[$i],
                'tax_id' => $tax_id[$i],
                 'unit_id' => $unit_id[$i],
                'created_at' => Carbon::now()
            ]);
        }
        session()->forget('reset');
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
        $qty = $request->get('qty');
        $rowId = $request->get('rowId');
        Cart::update($rowId, $qty); // for update
        $cartItems = Cart::content(); // display all new data of cart
        return view('cart', compact('cartItems'))->with('status', 'cart updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back(); // will keep same page
    }
//    function get_customer_data()
//    {
//        $customer_data = DB::table('tbl_customer')
//            ->limit(10)
//            ->get();
//        return $customer_data;
//    }
//
//    function pdf()
//    {
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($this->convert_customer_data_to_html());
//        return $pdf->stream();
//    }
//
//    function convert_customer_data_to_html()
//    {
//        $customer_data = $this->get_customer_data();
//        $output = '<h3 align="center">Get Out Data</h3><table width="100%" style="border-collapse: collapse; border: 0px;"><tr> <th style="border: 1px solid; padding:12px;" width="20%">Name</th> <th style="border: 1px solid; padding:12px;" width="30%">Address</th><th style="border: 1px solid; padding:12px;" width="15%">City</th><th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th><th style="border: 1px solid; padding:12px;" width="20%">Country</th> </tr>';
//            foreach($customer_data as $customer)
//            {
//                $output .= ' <tr><td style="border: 1px solid; padding:12px;">'.$customer->CustomerName.'</td><td style="border: 1px solid; padding:12px;">'.$customer->Address.'</td><td style="border: 1px solid; padding:12px;">'.$customer->City.'</td><td style="border: 1px solid; padding:12px;">'.$customer->PostalCode.'</td><td style="border: 1px solid; padding:12px;">'.$customer->Country.'</td> </tr> ';
//        }
//        $output .= '</table>';
//        return $output;
//    }
}
