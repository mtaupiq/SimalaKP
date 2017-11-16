<?php

namespace App\Http\Controllers\Mahasiswa;

use Auth;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mahasiswa.dashboard');
    }
}
