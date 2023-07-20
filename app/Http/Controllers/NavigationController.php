<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navigations = Navigation::all();
        $lists = Lists::all();

        return view('navigations.index', compact('navigations', 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lists = Lists::all();
        $navigations = Navigation::all();
        return view('navigations.create', compact('navigations', 'lists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lists_id' => 'nullable',
            'lists' => 'required'
        ]);

        
        $navigation = new Navigation();
        $navigation->name = $request->input('name');
        $navigation->lists= $request->input('lists');
        $navigation->lists_id= $request->input('lists');
        

        $navigation->save();
        
        return redirect()->route('navigations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $navigations = Navigation::findOrFail($id);
        $lists = Lists::all();
        return view('navigations.show', compact('navigations', 'lists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navigation = Navigation::findOrFail($id);
        $lists = Lists::all();
        return view('navigations.edit', compact('navigation', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $navigation = Navigation::findOrFail($id);
        
        // Validate input data
        $validated = $request->validate([
            'name' => 'required',
            'lists_id' => 'nullable',
        ]);
        
        // Update navigation
        $navigation->name = $request->input('name');
        $navigation->lists_id = $request->input('lists');
        
        $navigation->save();
        
        return redirect()->route('navigations.index', ['navigation' => $navigation->id]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $navigations= Navigation::findOrFail($id);
        $navigations->delete();
        return redirect()->route('lists.index');;
    }
}
