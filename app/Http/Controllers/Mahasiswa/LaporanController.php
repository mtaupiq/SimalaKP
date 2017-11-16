<?php

namespace App\Http\Controllers\Mahasiswa;

use Auth;
use File;
use App\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
    	$laporan = Laporan::where('user_id', 1)->orderBy('created_at', 'desc')->get();
        return response()->json($laporan);
    }

    public function store(Request $request)
    {
        $exploded = explode(',', $request->foto);
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg'))
            $ext = 'jpg';
        else
            $ext = 'png';

        $filename = str_random().'.'.$ext;

        $path = public_path().'/foto/'.$filename;

        file_put_contents($path, $decoded);

    	$laporan = Laporan::create($request->except('foto') + [
    		'user_id' => '1',
    		'foto' => 'https://dashboard.simalakp.dev/foto/'.$filename,
    		'verified_by_dp' => 0,
    		'verified_by_pl' => 0
    	]);

        return $laporan;
    }

    public function show($id)
    {
        $laporan = Laporan::find($id);
        return response()->json($laporan);
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::find($id);

        $explode = explode('/', $laporan->foto);
        File::delete('foto/'.$explode[4]);

        $exploded = explode(',', $request->foto);
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg'))
            $ext = 'jpg';
        else
            $ext = 'png';

        $filename = str_random().'.'.$ext;

        $path = public_path().'/foto/'.$filename;

        file_put_contents($path, $decoded);

        $laporan->update($request->except('foto') + [
            'foto' => 'https://dashboard.simalakp.dev/foto/'.$filename
            ]);

        return response()->json($laporan);
    }

    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $explode = explode('/', $laporan->foto);
        try {
            File::delete('foto/'.$explode[4]);
            Laporan::destroy($id);

            return response([], 204);
        } catch (\Exception $e) {
            return response(['Ada masalah ketika menghapus data'], 500);
        }
    }
}
