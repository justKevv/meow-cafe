<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('meja', [
            'Title' => 'Meja',
            'meja' => Meja::all(),
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
                'lantai' => 'required|numeric',
            ]);
            Meja::create($ValidatedData);
            return redirect('/meja');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($no_meja)
    {
        $meja = Meja::find($no_meja);
        return $meja;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $no)
    {
        $meja = Meja::findOrFail($no);
        $meja->lantai = $request->input('lantai');
        $meja->save();
        return redirect('/meja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_meja)
    {
        try {
            $meja = Meja::findOrFail($id_meja);
            $meja->delete();
            return redirect('/meja');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
