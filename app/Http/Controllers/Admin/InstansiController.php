<?php

namespace App\Http\Controllers\Admin;

use App\Instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstansiController extends Controller
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
        $instansi = Instansi::all();
        return view('admin.instansi.index', compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instansi.create');
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
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required',
        ]);

        $instansi = Instansi::create($request->all());

        $request->session()->flash('message', 'Data berhasil ditambahkan ke database!');
        return redirect(route('instansi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instansi = Instansi::find($id);
        return view('admin.instansi.show', compact('instansi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instansi = Instansi::find($id);
        return view('admin.instansi.edit', compact('instansi'));
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
        $this->validate($request,[
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required',
        ]);

        $instansi = Instansi::find($id)->update($request->all());

        $request->session()->flash('message', 'Data berhasil diubah!');
        return redirect(route('instansi.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $instansi = Instansi::find($id)->delete();

        $request->session()->flash('message', 'Data berhasil di hapus!');
        return redirect()->back();
    }
}
