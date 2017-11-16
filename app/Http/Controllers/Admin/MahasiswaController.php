<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Dospem;
use App\Pemlap;
use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = User::all();
        return view('admin.mahasiswa.index', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dospem = Dospem::pluck('nama', 'id');
        $pemlap = Pemlap::pluck('nama', 'id');
        $instansi = Instansi::pluck('nama', 'id');
        return view('admin.mahasiswa.create', compact('dospem', 'pemlap', 'instansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'npm' => 'required|digits:9|unique:users',
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        $mhs = User::create($request->except('password') + [
            'password' => bcrypt($request->password),
        ]);

        $request->session()->flash('message', 'Data berhasil ditambahkan ke database!');
        return redirect(route('mahasiswa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = User::find($id);
        return view('admin.mahasiswa.show', compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = User::find($id);

        $dospem = Dospem::pluck('nama', 'id');
        $pemlap = Pemlap::pluck('nama', 'id');
        $instansi = Instansi::pluck('nama', 'id');

        return view('admin.mahasiswa.edit', compact('mhs', 'dospem', 'pemlap', 'instansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = Rule::unique('users')->ignore($id);
        $this->validate($request,[
            'npm' => [
                'required',
                'digits:9',
                $rule,
            ],
            'nama' => 'required|max:255',
            'email' => [
                'required',
                'email',
                $rule,
            ],
            'password' => 'required|min:6',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        $mhs = User::find($id)->update($request->except('password') + [
            'password' => bcrypt($request->password),
        ]);

        $request->session()->flash('message', 'Data berhasil diubah!');
        return redirect(route('mahasiswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $mhs = User::find($id)->delete();

        $request->session()->flash('message', 'Data berhasil di hapus!');
        return redirect()->back();
    }
}
