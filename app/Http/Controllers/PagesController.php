<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    function store(Request $request) {
        //$name = $request->name;
        //echo $name;
        //dd($request);
        return redirect()->route('contact');
    }
}
