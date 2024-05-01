<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Support\Facades\App;

class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($lang)
    // {
    //     App::setLocale($lang);

    //,$locale
    public function index()
    {
        $title = __('dashbord.title');
        $companies = Companies::all();
        $employees = Employees::all();

        return view("dashbord.dashbord_index", compact("title", "companies", "employees"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
