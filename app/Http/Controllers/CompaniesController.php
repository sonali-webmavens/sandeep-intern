<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests\StoreCompaniesRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeNotification;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Companies All Data';
        $companies = Companies::all();

        return view('companies.companies_index' , compact('companies' ,'title'));
    }

    public function create()
    {
        $title = 'Companies Create Form ';
        return view('companies.companies_create' , compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaniesRequest $request)
    {
        $title = 'Companies All Data';
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
        } else {
            $path = null;
        }
        $companies = Companies::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'website'=> $request->website,
            'logo'=> $path,
        ]);
        Notification::send($companies, new WelcomeNotification($companies)); // Fixed
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Companies Update Form ';
        $companies = Companies::find($id);
        return view('companies.companies_edit' , compact('title' ,'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompaniesRequest $request, string $id)
    {
        $companies = Companies::findOrFail($id);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
        } else {
            $path = null;
        }        $companies->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'website'=> $request->website,
            'logo'=> $path,
        ]);
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $companies = Companies::find($id);
        $companies->delete();
        return back();
    }
}
