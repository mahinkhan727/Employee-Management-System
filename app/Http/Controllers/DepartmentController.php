<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $value = Department::all();
        return view('Department.index', ['data' => $value]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Department();
        $data->name = $request['name'];
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Add Department Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $dep= Department::find($department);
        return view('Department.edit',['depart'=>$dep]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {

        $department->name = $request['name'];
        $result = $department->save();
        if ($result) {
            return back()->with('success', 'Department Edit Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $data = Department::find($department);
        $data->each->delete();
        return redirect()->route('department.index')->with('detele_message', 'Department Delete Successfully');
    }
}
