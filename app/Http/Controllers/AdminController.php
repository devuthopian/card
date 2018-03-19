<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserProfile;
use App\Card;

use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::paginate(10);
        return view('admin.users.index', $data);
    }

    public function dashboard(){
        $data['users'] = User::get();
        $data['user_profiles'] = UserProfile::get();
        $data['cards'] = Card::get();
        return view('admin.dashboard', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect('admin');
    }
}