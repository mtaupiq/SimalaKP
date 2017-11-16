<?php

namespace App\Http\Controllers\Dospem;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MhsDospemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dospem');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = User::where('dosen_pembimbing_id', Auth::id())->get();
        return view('dospem.mahasiswa.index', compact('mhs'));
    }
}
