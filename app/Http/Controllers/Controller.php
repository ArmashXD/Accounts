<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createTypeSale( $name, $amount, $date, $category, Model $model)
    {
        $model->insert([
            'name' => $name,
            'amount' => $amount,
            'date' => $date,
            'category_id' => $category,
            'created_at' => Carbon::now(),
            'guid' => Str::uuid()
        ]);
    }

    public function fetchCategories(\Illuminate\Http\Request $request)
    {
        $categories = [];
        if ($request->get('type') =='Asset') {
            $categories = Category::where('type_id', 1)->get();
        } elseif ($request->get('type') == 'Liabilities') {
            $categories = Category::where('type_id', 2)->get();
        } elseif ($request->get('type') == 'Income') {
            $categories = Category::where('type_id', 3)->get();
        } elseif ($request->get('type') == 'Expense') {
            $categories = Category::where('type_id', 4)->get();
        } elseif ($request->get('type') == 'Equity') {
            $categories = Category::where('type_id', 5)->get();
        }
        return view('sales.create', ['categories' => $categories]);
    }
}
