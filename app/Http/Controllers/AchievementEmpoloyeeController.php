<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\AchievementEmployee;
use App\Models\Employee;
use Illuminate\Http\Request;

class AchievementEmpoloyeeController extends Controller
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

        $add = AchievementEmployee::paginate(4);
        $ftt = Achievement::all();
        $pop = Employee::all();
        return view('AchievementEmpoloyee.index',['pass'=>$add, 'sed'=>$ftt, 'emp'=>$pop]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $add = AchievementEmployee::where('id', 'like', '%' . $query . '%')
            ->paginate(4);

        $ftt = Achievement::all();
        $pop = Employee::all();
        return view('AchievementEmpoloyee.index', ['pass'=>$add, 'sed'=>$ftt, 'emp'=>$pop, 'query' => $query]);
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $add = Achievement::all();
        $pop = Employee::all();
        return view('AchievementEmpoloyee.create',['pass'=>$add, 'bil'=>$pop]);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sv = new AchievementEmployee();
        $sv->employee_id = $request['emp_name'];
        $sv->achievement_id = $request['ach_name'];
        $result = $sv->save();
        if ($result) {
            return back()->with('success', ' Achievement Employee Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }


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
