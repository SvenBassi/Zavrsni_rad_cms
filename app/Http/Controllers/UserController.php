<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            $users = User::with('roles')->get();
            $roles = DB::table('roles')->pluck('id', 'name');
            return view('users.index', compact('users', 'roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' =>'required',
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $fileName = time() . '.' . $request->img_path->extension();
    $request->img_path->storeAs('public/images', $fileName);
    
    $user = new User;
    $user->name = $request->input('name');
    $user->email = trim($request->input('email'));
    $user->password = bcrypt($request->input('password'));
    $user->role = $request->input('role');
    $user->img_path = $fileName;
    $user->save();
       return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' =>'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName = time() . '.' . $request->img_path->extension();
        $request->img_path->storeAs('public/images', $fileName);

        $user->name = $request->input('name');
    $user->email = trim($request->input('email'));
    $user->role = $request->input('role');
    $user->img_path = $fileName;
    $user->save();
        

        return redirect()->route('users.index');
      
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
