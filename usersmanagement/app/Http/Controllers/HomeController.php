<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function assignUserRole()
    {
        $user = User::find(1); // Replace 1 with the user's ID
        $adminRole = Role::where('name', 'admin')->first();
        
        if ($adminRole) {
            $user->role()->associate($adminRole);
            $user->save();
            
            // Role assigned successfully
        } else {
            // Role not found
        } 
    } 

}
