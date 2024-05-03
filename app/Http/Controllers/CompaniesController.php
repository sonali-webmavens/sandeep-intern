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
    public function index(Request $request)
    {

        $title = __('companies.title');
        $companies = Companies::all();

        return view('companies.companies_index', compact('companies', 'title'));
    }

    public function create($locale)
    {
        $title = __('companies.Companies Create Form');
        return view('companies.companies_create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaniesRequest $request, $locale)
    {
        $title = __('companies. ');
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
        } else {
            $path = null;
        }
        $companies = Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $path,
        ]);
        Notification::send($companies, new WelcomeNotification($companies));

        // Check if the request expects JSON response
        if ($request->expectsJson()) {
            return response()->json($companies, 200);
        } else {
            // If not JSON, redirect
            return redirect()->route('companies.index', app()->getLocale());
        }
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
    public function edit(string $locale, $id)
    {
        $title = __('companies.Companies Update Form');
        $companies = Companies::find($id);
        return view('companies.companies_edit', compact('title', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompaniesRequest $request,  $locale, $id)
    {
        $companies = Companies::findOrFail($id);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logo', 'public');
        } else {
            $path = null;
        }
        $companies->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $path,
        ]);
        return redirect()->route('companies.index',app()->getLocale());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale ,  $id)
    {
        $companies = Companies::find($id);
        $companies->delete();
        return back();
    }
}
