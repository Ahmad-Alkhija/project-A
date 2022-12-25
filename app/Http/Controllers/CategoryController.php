<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all();
        $subCategories=SubCategory::with('Category')->get();
        return view('cms.mainCategory',compact('categories','subCategories'));


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



        ]);


            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $category= new Category();
                $category->name=$request->name;
                $category->slug=$request->slug;
                $category->sortDescription=$request->sortDescription;
                $category->fullDescription=$request->fullDescription;
                $category->productTag=$request->productTag;
                $category->save();
                return $category;

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
        $category=Category::find($id);
        return ($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return ($category);
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
        ]);



            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $category= Category::find($id);
                $category->name=$request->name_edit;
                $category->slug=$request->slug_edit;
                $category->sortDescription=$request->sortDescription_edit;
                $category->fullDescription=$request->fullDescription_edit;
                $category->productTag=$request->productTag_edit;
                $category->update();
                return $category;

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
        $category=Category::find($id);
        $category->delete();
        return ($category);
    }
}
