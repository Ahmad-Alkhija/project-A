<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;


use Illuminate\Http\Request;

class OrderAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.order');
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

        $products = Product::with('offer')->where('productTag',$request->productTag)->get();
        $product = Product::with('offer')->find($products[0]->id);
        $errorMsg = "";

       if(empty($product)){
            $errorMsg = 'not found the product tag';
            return   $errorMsg ;
       }else{
        $product_new_quantity = $product->quantity - $request->quantity;
$oldQuantity=$product->quantity;
        $product->quantity=$product_new_quantity;
            if($product_new_quantity<0){
        $errorMsg = ' the product is out of stock the avalibale quantity is '.$oldQuantity.' ';

                return $errorMsg;
            }else{
                $product->update();
                $order= new order();
                $order->productTag = $product->productTag;
                $order->name = $product->name;
                $order->quantity = $request->quantity;
                $order->saleType = $request->saleType;
                $order->customerName = $request->customerNumber;
                $order->customerEmail = $request->customerEmail;
                $order->phoneNumber = $request->phoneNumber;
                $order->priceSale = $request->priceSale;
                $order->priceProducr = $product->price;
                if($product->offer!=null){
                $order->priceOffer = $product->offer->newPrice;
                }

                $order->save();
                return $order;

            }

       };


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
