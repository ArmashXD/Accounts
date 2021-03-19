<?php

namespace App\Http\Controllers;

use App\Models\GateIn;
use App\Models\Purchase;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
use DB;

class GateinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('gatein.index', ['gatein' => GateIn::all(), 'purchase' => Purchase::all(), 'cart' => Cart::content()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function storeInSession(Request $request)
    {

        $data = [
            'purchase_id' => $request->get('purchase_id'),
            'invoice_number' => $request->get('invoice_number'),
            'purchase_date' => $request->get('purchase_date'),
            'details' => $request->get('details'),
            'name' => $request->get('name'),
            'supplier_id' => $request->get('supplier_id'),
            'item_information' => $request->get('item_information'),
            'quantity' => $request->get('quantity'),
            'rate' => $request->get('rate'),
            'total' => $request->get('total')
        ];

        Session::push('data', $data);
        return redirect()->route('gateIn.create');
    }
    public function downloadPDF(){
        set_time_limit(600);
            $pdf = PDF::loadview('gatein.pdf');
        return $pdf->download('GateIn.pdf');
    }

    public function create()
    {
        return view('gatein.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase_id = $request->get('purchase_id');
        $invoice_number = $request->get('invoice_number');
        $purchase_date = $request->get('purchase_date');
        $details = $request->get('details');
        $name = $request->get('name');
        $supplier_id = $request->get('supplier_id');
        $item_information = $request->get('item_information');
        $quantity = $request->get('quantity');
        $rate = $request->get('rate');
        $total = $request->get('total');
        for ($i = 0; $i < collect($request->get('invoice_number'))->count(); $i++) {
            GateIn::insert([
                'purchase_id' => $purchase_id[$i],
                'details' => $details[$i],
                'invoice_number' => $invoice_number[$i],
                'name' => $name[$i],
                'supplier_id' => $supplier_id[$i],
                'item_information' => $item_information[$i],
                'quantity' => $quantity[$i],
                'rate' => $rate[$i],
                'total' => $total[$i],
                'date' => $purchase_date[$i],
                'created_at' => Carbon::now()
            ]);
        }

        \session()->forget('data');
        return redirect()->back();
    }





//
//    public function createPDF() {
//        // retreive all records from db
//        $item = GateIn::all();
//        // share data to view
//        view()->share('gatein',$item);
//        $pdf = PDF::loadView('pdf_view', $item);
//        // download PDF file with download method
//        return $pdf->download('pdf_file.pdf');
//    }
//    function pdf()
//    {
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($this->convert_customer_data_to_html());
//        return $pdf->stream();
//    }
//
//    function convert_customer_data_to_html()
//    {
//        $gatein = $this->get_customer_data();
//        $output = '<h3 align="center">Customer Data</h3><table width="100%" style="border-collapse: collapse; border: 0px;"> <tr><th style="border: 1px solid; padding:12px;" width="20%">Name</th><th style="border: 1px solid; padding:12px;" width="30%">Address</th> <th style="border: 1px solid; padding:12px;" width="15%">City</th><th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th> <th style="border: 1px solid; padding:12px;" width="20%">Country</th></tr>';
//        foreach($gatein as $item)
//        {
//            $output .= ' <tr><td style="border: 1px solid; padding:12px;">'.$item->CustomerName.'</td> <td style="border: 1px solid; padding:12px;">'.$item->Address.'</td> <td style="border: 1px solid; padding:12px;">'.$item->City.'</td> <td style="border: 1px solid; padding:12px;">'.$item->PostalCode.'</td> <td style="border: 1px solid; padding:12px;">'.$item->Country.'</td> </tr>';
//        }
//        $item .= '</table>';
//        return $item;
//    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

}
