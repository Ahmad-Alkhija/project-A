<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Carbon;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offer::with('Product')->get();
        return view('cms.listOffer', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
            'offer'  => 'required',
            'endDate'  => 'required',

        ]);
        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        } else {

            $offer = new Offer();
            $product = Product::find($request->product_id);
            $offer->product_id = $product->id;
            $date2_start = Carbon\Carbon::now();
            $offer->startDate = $date2_start->toDateString();
            $offer->endDate = $request->endDate;
            $offer->offer = $request->offer;
            $offer->oldPrice = $product->price;
            $offer->newPrice = (100 - $request->offer) * $product->price / 100;
            $offer->save();
            return $offer;

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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer=offer::find($id);
        return ($offer);
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
            'offer' => 'required',
            'endDate' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $offer = Offer::find($id);
            $date2_start = Carbon\Carbon::now();
            $offer->startDate = $date2_start->toDateString();
            $offer->endDate = $request->endDate;
            $offer->offer = $request->offer;
            $offer->newPrice = (100 - $request->offer) * $offer->oldPrice / 100;
            $offer->save();
            return $offer;
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
        //
    }
}
