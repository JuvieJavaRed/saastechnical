<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoriesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //retrieve all categories
         $categories = DB::table('categories')->get();
         Log::channel('controllers')->info("All categories successfully retrieved");
         return response()->json($categories, 200);
    }

    
}
