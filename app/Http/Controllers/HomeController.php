<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Laratrust::hasRole('admin'))return $this->adminDashboard();
        if (Laratrust::hasRole('user'))return $this->userDashboard();
            return view('home');
    }
    protected function adminDashboard()
    {
        return view('admin.index');
    }
    protected function userDashboard()
    {
        return view('home');
    }
}
