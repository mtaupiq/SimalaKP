<?php

namespace App\Http\Controllers\Dospem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DospemDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dospem');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dospem.dospem-dashboard');
    }
}
