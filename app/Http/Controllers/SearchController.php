<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	if($request->has('search')){
    		$movies = Movie::search($request->get('search'))->get();	
    	}else{
    		$movies = Movie::get();
    	}
        return view('movies-search', compact('movies'));
    }
}
