<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    // メソッド内の重複を排除した共通のロジック
    private function updateOrCreateGoal(Request $request, Goal $goal = null)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if (!$goal) {
            $goal = new Goal();
        }

        $goal->title = $request->input('title');
        $goal->user_id = Auth::id();
        $goal->save();

        return $goal;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Auth::user()->goals;
        $tags = Auth::user()->tags;

        return view('goals.index', compact('goals', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
    
        $goal = new Goal();
        $goal->title = $request->input('title');
        $goal->user_id = Auth::id();
        $goal->save();
    
        return redirect()->route('goals.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required',
        ]);
    
        $goal->title = $request->input('title');
        $goal->user_id = Auth::id();
        $goal->save();
    
        return redirect()->route('goals.index');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required',
        ]);
    
        $goal->title = $request->input('title');
        $goal->user_id = Auth::id();
        $goal->save();
    
        return redirect()->route('goals.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->route('goals.index');        
    }

}
