<?php

namespace App\Http\Controllers\Admin;

use App\Dospem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DospemController extends Controller
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
        $dospem = Dospem::all();
        return view('admin.dospem.index', compact('dospem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dospem.create');
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
            'nidn' => 'required|digits:10|unique:dospems',
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:dospems',
            'password' => 'required|min:6',
            'no_hp' => 'required|numeric',
        ]);

        $dospem = Dospem::create($request->all());

        $request->session()->flash('message', 'Data berhasil ditambahkan ke database!');
        return redirect(route('dospem.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dospem = Dospem::find($id);
        return view('admin.dospem.show', compact('dospem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dospem = Dospem::find($id);
        return view('admin.dospem.edit', compact('dospem'));
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
        $rule = Rule::unique('dospems')->ignore($id);
        $this->validate($request,[
            'nidn' => [
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
            'no_hp' => 'required|numeric',
        ]);

        $dospem = Dospem::find($id)->update($request->all());

        $request->session()->flash('message', 'Data berhasil diubah!');
        return redirect(route('dospem.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $dospem = Dospem::find($id)->delete();

        $request->session()->flash('message', 'Data berhasil di hapus!');
        return redirect()->back();
    }
}
