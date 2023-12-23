<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->has('query')) {
            return $this->search($request);
        }

        $data = Employee::paginate(4);
        $d_data = Department::all();
        return view('Employee.index', ['employees' => $data, 'dep' => $d_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $d_data = Department::all();
        return view('Employee.create', ['dep' => $d_data]);
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
        $obj = [];
        $d_data = Department::all();
        $obj = Employee::find($employee);

        return view('Employee.edit', compact('obj', 'd_data'));
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
        $data = Employee::find($employee);
        $data->each->delete();
        return redirect()->route('employee.index')->with('detele_message', 'Employee Delete Successfully');
    }

    /**
     * Custom made Sreach Function.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = Employee::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('phone', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhere('id', 'like', '%' . $query . '%')
            ->paginate(4);

        $d_data = Department::all();
        return view('Employee.index', ['employees' => $data, 'dep' => $d_data, 'query' => $query]);
    }
}


