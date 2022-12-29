<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;

use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $subCategories=SubCategory::with('Category')->get();
        return view('cms.addProduct',compact('subCategories'));
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
            'color'  => 'required',
            'price'  => 'required',
            'quantity'  => 'required',
            'sortDescription'  => 'required',
            'fulDetail'  => 'required',
            'productTag'  => 'required',
            'subCategory_id'  => 'required',
            'image_main'  => 'required',
            'images'  => 'required',



        ]);


            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {
                $product= new Product();
                $product->name=$request->name;
                $product->slug=$request->slug;
                $product->color=$request->color;
                $product->size=$request->size;
                $product->price=$request->price;
                $product->quantity=$request->quantity;
                $product->sortDescription=$request->sortDescription;
                $product->fulDetail=$request->fulDetail;
                $product->productTag=$request->productTag;
                $product->subCategory_id=$request->subCategory_id;
                $file = $request->image_main;
                $fileName2='img_'.time().'.'.$request->image_main->extension();
                $destinationPath = public_path().'/images' ;
                $file->move($destinationPath,$fileName2);
                $product->image=$fileName2;
                $product->save();

            $count=0;

                foreach($request->images as $image){
                    $productGallery= new ProductGallery();
                    $productGallery->product_id=$product->id;
                    $fileName2='img_'.time().'.'.$count.'.'.$image->extension();
                    $destinationPath = public_path().'/images' ;
                    $image->move($destinationPath,$fileName2);
                    $productGallery->image=$fileName2;
                    $productGallery->save();
                    $count++;
                     }
                     $couluction=collect([$product,$productGallery]);
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
