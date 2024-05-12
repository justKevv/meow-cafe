<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'Title' => 'Pegawai',
            'pegawai' => Pegawai::all()->sortBy('posisi'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $ValidatedData = $request->validate([
                'nama' => 'required',
                'posisi' => 'required|in:Kasir,Koki,Pelayan',
                'alamat' => 'required|unique:pegawai',
                'no_telpon' => 'required|unique:pegawai',
            ]);

            Pegawai::create($ValidatedData);
            return redirect('/');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        return $pegawai;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama = $request->input('nama');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->no_telpon = $request->input('no_telpon');
        $pegawai->posisi = $request->input('posisi');
        $pegawai->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pegawai)
    {
        try {
            $pegawai = Pegawai::findOrFail($id_pegawai);
            $pegawai->delete();
            
            return redirect('/');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
