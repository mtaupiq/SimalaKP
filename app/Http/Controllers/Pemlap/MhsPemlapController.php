<?php

namespace App\Http\Controllers\Pemlap;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MhsPemlapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pemlap');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = User::where('pembimbing_lapangan_id', Auth::id())->get();
        return view('pemlap.mahasiswa.index', compact('mhs'));
    }
}
