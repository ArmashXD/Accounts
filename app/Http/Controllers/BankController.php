<?php

namespace App\Http\Controllers;


use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank.index', ['banks' =>Bank::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create', ['bank' => Bank::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new Bank();
        alert()->success('Success', "Bank $bank->name Created");
            if($request->hasFile('image')) {
                $image = $request->image;
                $image->move('uploads', $image->getClientOriginalName());
                $bank->image_url = $image->getClientOriginalName();
            }
        $bank->fill($request->all())->save();
        return redirect('account/bank');
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
        return view('bank.edit', ['bank'=>Bank::find($id)]);
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
        $bank = Bank::find($id);
        if($request->image_url != ''){
            $path = public_path().'/uploads/images/';

            //code for remove old file
            if($bank->image_url != ''  && $bank->image_url != null){
                $file_old = $path.$bank->image_url;
                unlink($file_old);
            }
            //upload new file
            $file = $request->image_url;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $bank->update(['image_url' => $filename]);
        }
        $bank->fill($request->all())->update();
        alert()->success('Success', "Bank $bank->name updated");
        return redirect('account/bank');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        alert()->success('Success', "Bank $bank->name Deleted   ");
        return redirect()->back();
    }
}
