<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::paginate(4);
        $d_data = Department::all();
        $a_data = Achievement::all();
        return view('Employee.index', ['employees' => $data, 'dep' => $d_data, 'ach' => $a_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $d_data = Department::all();
        $a_data = Achievement::all();
        return view('Employee.create', ['dep' => $d_data, 'ach' => $a_data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $obj_emp = new Employee();
        $obj_emp->name = $request['name'];
        $obj_emp->email = $request['email'];
        $obj_emp->phone = $request['phone'];
        $obj_emp->address = $request['address'];
        $obj_emp->dept_id = $request['dem_name'];
        $obj_emp->ach_id = $request['ach_name'];
        $result = $obj_emp->save();
        if ($result) {
            return back()->with('success', 'Add Employee Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $obj=[];
        $d_data = Department::all();
        $a_data = Achievement::all();
        $obj=Employee::find($employee);

        return view('Employee.edit',compact('obj', 'd_data', 'a_data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request['name'];
        $result = $employee->save();
        if ($result) {
            return back()->with('success', 'Employee Edit Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $data = Employee::find($employee) ;
        $data->each-> delete();
        return redirect()->route('employee.index')->with('detele_message', 'Employee Delete Successfully');

    }
}
