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
    public function index()
    {
        $title = 'Employees All Data';
        $employees = Employees::paginate(10); // Paginate the results directly
        // $employees->paginate(5);



        // $employees->load('companies');
        // dd($employees);
        return view('employees.employess_index' , compact('title' ,'employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Employees Add Form';

        $companies = Companies::all();
        // dd($companies);
        return view('employees.employees_create', compact('companies','title' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeesStoreReuest  $request)
    {

        $employees = Employees::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'companies_id'=> $request->companies,
        ]) ;
        return redirect()->route('employees.index');
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
        $title = 'Update Employees Form';
        $companies = Companies::all();
        $employees = Employees::find($id);
        return view('employees.employees_edit',compact('companies','employees','title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeesStoreReuest $request,  $id)
    {
        $employees = Employees::findOrFail($id);

        $employees->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'companies_id'=> $request->companies,
        ]);
        return redirect()->route('employees.index');
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();
        return back();
    }
}
