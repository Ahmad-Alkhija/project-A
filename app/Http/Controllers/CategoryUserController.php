<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Offer;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;





use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ElseIf_;

class CategoryUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('offer')->get();
        $priceMax = Product::max('price');
        $categorys = Category::all();

        return view("userPage.category",compact('products','categorys','priceMax'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products =Product::all();
        if($request->category){
         $subcategorys = SubCategory::whereIn('category_id', $request->category)->pluck('id');
         $products = $products->whereIn('subCategory_id', $subcategorys);
        }
        if($request->gender)
        $products = $products->whereIn('gender',$request->gender);
        if($request->saleType)
        $products = $products->whereIn('saleType',$request->saleType);
        if ($request->priceMin && $request->priceMax)
            $products = $products->whereBetween('price', [$request->priceMin, $request->priceMax]);

            return view("includeUser.card", compact('products'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $products = Product::with('offer')->where('id', $id)->get();
        $products = Product::with('offer')->find($id);

        return $products;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
