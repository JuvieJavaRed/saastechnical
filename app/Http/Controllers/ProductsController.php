<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all products
        $products = DB::table('products')->get();
        Log::channel('controllers')->info("All products successfully retrieved");
        return response()->json($products, 200);
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
        //validate request
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'category'=>'required',
            'sku'=>'required',
            'price'=>'required',
            'quantity'=>'required'
        ]);
        if($validation->fails()){
            Log::channel('controllers')->error('Request for product creation not granted because of malformed request missing parameters');
            return response()->json($validation->errors(),400);
        }
        //create a new product.
        DB::table('products')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        Log::channel('controllers')->info('Record successfully created for product');
        return response()->json(['success'=>'Record Successfully Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //verify that the id is not empty or null...
        if(empty($id)){
            Log::channel('controllers')->error('Can not fetch data because ID is missing or null');
            return response()->json(['error'=>'Invalid ID has been passed'], 400);
        }
        $products = DB::table('products')->where('id',$id)->first();
        return response()->json($products, 200);
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
    public function update(Request $request)
    {
        //validate request
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'category'=>'required',
            'sku'=>'required',
            'price'=>'required',
            'quantity'=>'required'
        ]);
        if($validation->fails()){
            Log::channel('controllers')->error('Request for product update not granted because of malformed request missing parameters');
            return response()->json($validation->errors(),400);
        }

        //update a specific record
        DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);
        Log::channel('controllers')->info('Record with ID has been successfully updated');
        return response()->json(['success'=>'Record Successfully Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verify that the id is not empty or null...
        if(empty($id)){
            Log::channel('controllers')->error('Delete request failed to be excuted because of null or empty ID');
            return response()->json(['error'=>'Invalid ID has been passed'], 400);
        }

        DB::table('products')->where('id', $id)->delete();
        return response()->json(['success'=>'Record Successfully Deleted'], 200);
    }
}
