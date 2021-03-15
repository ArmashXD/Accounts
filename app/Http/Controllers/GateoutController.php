<?php

namespace App\Http\Controllers;

use App\Models\GateOut;
use App\Models\Sale;
use Illuminate\Http\Request;
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
        return view('gateout.index', ['gateout'=>GateOut::all(),'sale'=>Sale::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gateout.create', ['gateout'=>GateOut::all(),'sale' => Sale::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gateout = new GateOut();
        $gateout->fill($request->all())->save();
        alert()->success('Success', "gateOut $gateout->name Created");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
