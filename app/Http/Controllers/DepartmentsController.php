<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch departments
        $departments = Department::orderby("name","asc")
        ->select('id','name')
        ->get();

        // Load index view
        return view('ajax.index')->with("departments",$departments);
    }

    // Fetch records
    public function getEmployees($departmentid=0){

        // Fetch Employees by Departmentid
        $empData = Employee::orderby("name","asc")
             ->select('id','name')
             ->where('department_id',$departmentid)
             ->get();

        return response()->json($empData);

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
