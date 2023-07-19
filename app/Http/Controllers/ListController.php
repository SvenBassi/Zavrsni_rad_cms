<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Lists;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        $lists = Lists::all();
        $users = User::all();
        $roles = DB::table('roles')->pluck('id', 'name');
        $navigations = Navigation::all();
        return view('lists.index', compact('lists','users','navigations'))->with('user', auth()->user());
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $fileName = time() . '.' . $request->img_path->extension();
        $request->img_path->storeAs('public/images', $fileName);

        $user = Auth::user();
        $list = new Lists;
        $list->title = $request->input('title');
        $list->description = $request->input('description');
        $list->img_path = $fileName;
      //  $list->user_id = $user->id;
        $list->save();
        return redirect('lists');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $lists = Lists::findOrFail($id);

        return view('lists.show', ['list' => $lists]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Lists $lists)
    {
        $roles = Role::all();
        $lists = Lists::findOrFail($id);
        return view('lists.edit', ['lists' => $lists]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , Lists $lists)
    {
      $lists = Lists::findOrFail($id);
      $request->validate([
        'title' => 'required',
        'description' => 'required',
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fileName = time() . '.' . $request->img_path->extension();
    $request->img_path->storeAs('public/images', $fileName);

     $lists->title = $request->input('title');
     $lists->description = $request->input('description');
    $lists->img_path = $fileName;
  //  $list->user_id = $user->id;
    $lists->update();
    return redirect('lists');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lists = Lists::findOrFail($id);
        $lists->delete();
        return redirect()->route('lists.index');
    }

    

    public function getList($idList){
        $list = Lists::find($idList);

        if ($list) {
            return $list->title;
        }
    }
}
