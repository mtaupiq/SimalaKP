<?php

namespace App\Http\Controllers\Pemlap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemlapDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:pemlap');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemlap.pemlap-dashboard');
    }
}
