<?php

namespace App\Http\Controllers\Mahasiswa;

use App\User;
use App\Dospem;
use App\Pemlap;
use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('mahasiswa.data.show', compact('mhs'));
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

        return view('mahasiswa.data.edit', compact('mhs', 'dospem', 'pemlap', 'instansi'));
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

        $mhs = User::find($id)->update($request->all());

        $request->session()->flash('message', 'Data berhasil diubah!');
        return redirect(route('data_mahasiswa.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
