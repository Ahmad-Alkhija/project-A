<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories=SubCategory::with('Category')->get();
        $categories=Category::all();
        return view('cms.subCategory',compact('subCategories','categories'));
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
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'slug'  => 'required',
            'sortDescription'  => 'required',
            'fullDescription'  => 'required',
            'productTag'  => 'required',
            'category_id'  => 'required',


        ]);


            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $subCategory= new SubCategory();
                $subCategory->name=$request->name;
                $subCategory->slug=$request->slug;
                $subCategory->sortDescription=$request->sortDescription;
                $subCategory->fullDescription=$request->fullDescription;
                $subCategory->productTag=$request->productTag;
                $subCategory->category_id=$request->category_id;
                $subCategory->save();
                $category=Category::find($request->category_id);
                $couluction=collect([$subCategory,$category]);
                return ($couluction);
            }
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
        $subCategory=SubCategory::find($id);
        return ($subCategory);
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
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required',
            'slug_edit'  => 'required',
            'sortDescription_edit'  => 'required',
            'fullDescription_edit'  => 'required',
            'productTag_edit'  => 'required',
            'category_id_edit'  => 'required',

        ]);



            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $subCategory= SubCategory::find($id);
                $subCategory->name=$request->name_edit;
                $subCategory->slug=$request->slug_edit;
                $subCategory->sortDescription=$request->sortDescription_edit;
                $subCategory->fullDescription=$request->fullDescription_edit;
                $subCategory->productTag=$request->productTag_edit;
                $subCategory->category_id=$request->category_id_edit;
                $subCategory->update();
                $category=Category::find($request->category_id_edit);
                $couluction=collect([$subCategory,$category]);
                return ($couluction);

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory=SubCategory::find($id);
        $subCategory->delete();
        return ($subCategory);
    }
}
