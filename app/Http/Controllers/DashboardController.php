<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    //

    public function _construct()
    {
        // $this->middleware('auth');
    }

    public function dashboard()
    {

        return view('admin.dashboard.index');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');


    }
}
