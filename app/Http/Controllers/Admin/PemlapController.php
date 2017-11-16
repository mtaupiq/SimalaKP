<?php

namespace App\Http\Controllers\Admin;

use App\Pemlap;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PemlapController extends Controller
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
        $pemlap = Pemlap::all();
        return view('admin.pemlap.index', compact('pemlap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemlap.create');
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
            'nip' => 'required|digits:10|unique:pemlaps',
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:pemlaps',
            'password' => 'required|min:6',
            'jabatan' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        $pemlap = Pemlap::create($request->all());

        $request->session()->flash('message', 'Data berhasil ditambahkan ke database!');
        return redirect(route('pemlap.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemlap = Pemlap::find($id);
        return view('admin.pemlap.show', compact('pemlap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemlap = Pemlap::find($id);
        return view('admin.pemlap.edit', compact('pemlap'));
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
        $rule = Rule::unique('pemlaps')->ignore($id);
        $this->validate($request,[
            'nip' => [
                'required', 
                'digits:10', 
                $rule,
            ],
            'nama' => 'required|max:255',
            'email' => [
                'required', 
                'email', 
                $rule,
            ],
            'password' => 'required|min:6',
            'jabatan' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        $pemlap = Pemlap::find($id)->update($request->all());

        $request->session()->flash('message', 'Data berhasil diubah!');
        return redirect(route('pemlap.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pemlap = Pemlap::find($id)->delete();

        $request->session()->flash('message', 'Data berhasil di hapus!');
        return redirect()->back();
    }
}
