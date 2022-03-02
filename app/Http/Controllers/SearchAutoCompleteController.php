<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class SearchAutoCompleteController extends Controller
{
      /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search-autocomplete');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchQuery(Request $request)
    {
        $data = User::select("name")
                ->where("name","LIKE","%{$request->get('query')}%")
                ->get();
   
        return response()->json($data);
    }
}
