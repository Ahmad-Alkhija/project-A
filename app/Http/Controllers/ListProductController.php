<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('offer')->get();
        $subCategories=SubCategory::with('Category')->get();
        return view('cms.listProduct', compact('products','subCategories'));
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
        //
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
        $product=Product::find($id);
        $productGallery=ProductGallery::where('product_id',$id)->get();
        $couluction=collect([$product,$productGallery]);
        return ($couluction);
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
            'name'  => 'required',
            'slug'  => 'required',
            'color'  => 'required',
            'price'  => 'required',
            'quantity'  => 'required',
            'sortDescription'  => 'required',
            'fulDetail'  => 'required',
            'productTag'  => 'required',
            'subCategory_id'  => 'required',
            'wholeSaleQuantity'  => 'required',
            'gender'  => 'required',
            'saleType'  => 'required',
            'image_main'  => 'dimensions:width=500,height=500',
            'images.1' => 'dimensions:width=500,height=500',
            'images.3' => 'dimensions:width=500,height=500',
            'images.5' => 'dimensions:width=500,height=500',
            'images.7' => 'dimensions:width=500,height=500',
            'images.9' => 'dimensions:width=500,height=500',
            'images.11' => 'dimensions:width=500,height=500',
            'images.13' => 'dimensions:width=500,height=500',

        ]);


            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()]);
            }
            else
            {

                $product=Product::find($id);
                $product->name=$request->name;
                $product->slug=$request->slug;
                $product->color=$request->color;
                $product->size=$request->size;
                $product->price=$request->price;
                $product->saleType=$request->saleType;
                $product->gender=$request->gender;
                $product->wholeSaleQuantity=$request->wholeSaleQuantity;
                $product->quantity=$request->quantity;
                $product->sortDescription=$request->sortDescription;
                $product->fulDetail=$request->fulDetail;
                $product->productTag=$request->productTag;
                $product->subCategory_id=$request->subCategory_id;
            if ($request->image_main != null) {
                $image_path = 'images/'.$product->image;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $file = $request->image_main;
                $fileName2 = 'img_' . time() . '.' . $request->image_main->extension();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $fileName2);
                $product->image = $fileName2;
            }
                $product->update();

            $count=0;
                foreach($request->images as $key=>$image){
                if ($key % 2 != 0) {

                    $productGallery = ProductGallery::find($request->images[$key-1]);

                    if( $productGallery==null){
                        $productGallery= new ProductGallery();
                        $productGallery->product_id=$product->id;
                        $fileName2='img_'.time().'.'.$count.'.'.$image->extension();
                        $destinationPath = public_path().'/images' ;
                        $image->move($destinationPath,$fileName2);
                        $productGallery->image=$fileName2;
                        $productGallery->save();
                        $count++;
                    } else {
                        $image_path = 'images/' . $productGallery->image;
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                        $fileName2 = 'img_' . time() . '.' . $count . '.' . $image->extension();
                        $destinationPath = public_path() . '/images';
                        $image->move($destinationPath, $fileName2);
                        $productGallery->image = $fileName2;
                        $productGallery->update();
                        $count++;
                    }
                }

                     }


            $offer = Offer::find($id);
            if($offer!=null){

            $offer->oldPrice = $product->price;
            $offer->newPrice =(100-$offer->offer)*$product->price/100;
            $offer->update();


            }

                return $product;
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
        $product=Product::find($id);
        $oldproduct=$product;
        $image_path = 'images/'.$product->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return  $oldproduct;
    }
}
