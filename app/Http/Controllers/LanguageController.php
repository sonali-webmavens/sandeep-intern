<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request){

        $request->session()->put('lang', $request->lang);
        return redirect()->back();
    }
}
