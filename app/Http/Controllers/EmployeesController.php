<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Companies;
use App\Http\Requests\EmployeesStoreReuest;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$locale)
    {
        $title = __('employees.title');
        $employees = Employees::all(); // Paginate the results directly

        return view('employees.employess_index', compact('title', 'employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($locale)
    {
        $title = __('employees.Employees Add Form');

        $companies = Companies::all();
        return view('employees.employees_create', compact('companies', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeesStoreReuest $request, $locale)
    {

        $employees = Employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'companies_id' => $request->companies,
        ]);
        return redirect()->route('employees.index', app()->getLocale());
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
    public function edit(string $locale, $id)
    {
        $title =  __('employees.Update Employees Form');
        $companies = Companies::all();
        $employees = Employees::find($id);
        return view('employees.employees_edit', compact('companies', 'employees', 'title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeesStoreReuest $request, $locale, $id)
    {
        $employees = Employees::findOrFail($id);
        $employees->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'companies_id' => $request->companies,
        ]);
        return redirect()->route('employees.index', app()->getLocale());
    }


    public function destroy(string $locale, $id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();
        return back();
    }
}
