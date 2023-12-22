<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Achievement::all();
        return view('Achievement.index', ['temp' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sav = new Achievement;
        $sav->name = $request['name'];
        $result = $sav->save();
        if ($result) {
            return back()->with('success', 'Add Achievement Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        $ach = Achievement::find($achievement);
        return view('Achievement.edit', ['send' => $ach]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {

        $achievement->name = $request['name'];
        $result = $achievement->save();
        if ($result) {
            return back()->with('success', 'Achievement Edit Completed.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        $data = Achievement::find($achievement);
        $data->each->delete();
        return redirect()->route('achievement.index')->with('detele_message', 'Achievement Delete Successfully');
    }
}
