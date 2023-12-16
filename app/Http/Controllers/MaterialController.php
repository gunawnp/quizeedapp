<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialDetail;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Material::orderBy('bab', 'asc')->get();
        return view('material/index')->with('data', $data);
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
        $request->validate([
            'bab' => 'required',
            'title' => 'required'
        ]);

        $data = [
            'bab' => $request->input('bab'),
            'title' => $request->input('title')
        ];

        Material::create($data);
        return redirect('material')->with('success', 'Berhasil Membuat Materi Baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Material::where('id', $id)->first();
        return view('material/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MaterialDetail::where('material_id', $id)->delete();
        Material::where('id', $id)->delete();
        return redirect('/material')->with('success', 'Berhasil hapus data!');
    }
}
