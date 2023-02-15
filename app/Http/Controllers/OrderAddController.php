<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
            'saleType' => 'required',
            'customerName' => 'required',
            'customerEmail' => 'required',
            'phoneNumber' => 'required',
            'priceSale' => 'required',
            'productTag' => 'required',


        ]);



        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {

            $products = Product::with('offer')->where('productTag', $request->productTag)->get();
            $errorMsg = [
                'error1' => '1',
            ];
            if (empty($products[0])) {

                $errorMsg = [
                    'error1' => 'not found the product tag',
                ];
                return $errorMsg;
            } else {
                $product = Product::with('offer')->find($products[0]->id);
                $product_new_quantity = $product->quantity - $request->quantity;
                $oldQuantity = $product->quantity;
                $product->quantity = $product_new_quantity;
                if ($product_new_quantity < 0) {
                    $errorMsg = [
                        'error1' => ' the product is out of stock the avalibale quantity is ' . $oldQuantity . ' ',
                    ];

                    return $errorMsg;
                } else {
                    $product->update();
                    $order = new order();
                    $order->productTag = $product->productTag;
                    $order->product_id = $product->id;
                    $order->name = $product->name;
                    $order->quantity = $request->quantity;
                    $order->saleType = $request->saleType;
                    $order->customerName = $request->customerName;
                    $order->customerEmail = $request->customerEmail;
                    $order->phoneNumber = $request->phoneNumber;
                    $order->priceSale = $request->priceSale;
                    $order->priceProduct = $product->price;
                    if ($product->offer != null) {
                        $order->priceOffer = $product->offer->newPrice;
                    }

                    $order->save();
                    return $order;

                }

            }
            ;


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
