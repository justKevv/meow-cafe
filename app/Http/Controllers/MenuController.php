<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu', [
            'Title' => 'Menu',
            'menu' => Menu::all()->sortBy('kategori'),

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
                'kategori' => 'required|in:Makanan,Minuman',
                'harga' => 'required|numeric',
            ]);

            Menu::create($ValidatedData);
            return redirect('/menu');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return $menu;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->nama = $request->input('nama');
        $menu->kategori = $request->input('kategori');
        $menu->harga = $request->input('harga');
        $menu->save();
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_menu)
    {
        try {
            $menu = Menu::findOrFail($id_menu);
            $menu->delete();
            
            return redirect('/menu');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
