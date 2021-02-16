<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('category.index', [
            'categoryAsset' => Category::where('type_id', 1)->paginate(5),
            'categoryLiability' => Category::where('type_id', 2)->paginate(5),
            'categoryIncome' => Category::where('type_id', 3)->paginate(5),
            'categoryExpense' => Category::where('type_id', 4)->paginate(5),
            'categoryEquity' => Category::where('type_id', 5)->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'unique:categories'
        ]);
        $category = new Category();
        $category->fill($request->all())->save();
        alert()->success('Success', "Category $category->name Created");
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->fill($request->all())->update();
        alert()->success('Success', "Category $category->name Updated");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        alert()->success('Success', "Category $category->name Deleted");
        return redirect()->back();
    }
}
