<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with('Product')->get();
        return view('cms.listOrder',compact('orders'));
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
        $order=Order::find($id);
        return $order;
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
        $order=Order::find($id);
        if($order->productTag!=$request->productTag){
            $products = Product::with('offer')->where('productTag', $request->productTag)->get();
        if (empty($products[0])) {

            $errorMsg = [
                'error1' => 'not found the product tag',
            ];
            return $errorMsg;
        }else{
             $old_product=Product::find($order->product_id);
             $old_product->quantity=  $old_product->quantity+$order->quantity;
             $old_product->update();
            $product = Product::with('offer')->find($products[0]->id);
            $product_new_quantity = $product->quantity - $request->quantity;
            $oldQuantity = $product->quantity;
            $product->quantity = $product_new_quantity;
            if ($product_new_quantity < 0) {
                $errorMsg = [
                    'error1' => ' the product is out of stock the avalibale quantity is ' . $oldQuantity . ' ',
                ];

                return $errorMsg;
        }else{

            $product->update();
            $order->productTag=$request->productTag;
            $order->quantity=$request->quantity;
            $order->product_id=$product->id;
            $order->priceProduct = $product->price;
            if ($product->offer != null) {
                $order->priceOffer = $product->offer->newPrice;
            }

        }

        }

    }
        if($order->quantity!=$request->quantity){
            $product=Product::find($order->product_id);
            $product->quantity=$product->quantity+$order->quantity;
            $oldQuantity = $product->quantity;
            $product->quantity=$product->quantity-$request->quantity;
        $order->quantity=$request->quantity;
            if($product->quantity<0){
                $errorMsg = [
                    'error1' => ' the product is out of stock the avalibale quantity is ' .   $oldQuantity . ' ',
                ];

                return $errorMsg;
            }else{
            $product->update();
            }
        }

        $order->saleType=$request->saleType;
        $order->customerName=$request->customerName;
        $order->customerEmail=$request->customerEmail;
        $order->phoneNumber=$request->phoneNumber;
        $order->priceSale=$request->priceSale;
        $order->update();
        return $order;

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
       $order=Order::find($id);
       $oldOrder=$order;
       $product=Product::find($order->product_id);
       $product->quantity=$product->quantity+$order->quantity;
       $product->update();
       $order->delete();
       return $oldOrder;
    }
}
