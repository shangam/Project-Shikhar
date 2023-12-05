<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Http\Resources\PriceResource;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $price = Price::with('product','size')->get();
        
        return response()->json(PriceResource::collection($price), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'size_id' => 'required|exists:sizes,id',
            'product_id' => 'required|exists:products,id'
        ]);

        $price = Price::create($request->all());

        return response()->json(new PriceResource($price), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return response()->json(new PriceResource($price), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'size_id' => 'required|exists:sizes,id',
            'product_id' => 'required|exists:products,id'
        ]);

        $price->update($request->all());

        return response()->json(new PriceResource($price), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json(null, 204);
    }
}
