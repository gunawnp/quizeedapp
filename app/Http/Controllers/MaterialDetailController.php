<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\MaterialDetail;

class MaterialDetailController extends Controller
{
    public function create(string $id){
        $data = Material::where('id', $id)->first();
        return view('material_detail/create')->with('data', $data);
    }

    public function store(Request $request){
        $request->validate([
            'content' => 'required',
        ]);

        $data = [
            'material_id' => $request->input('id_ref'),
            'material_content' => $request->input('content'),
        ];

        MaterialDetail::create($data);
        return redirect('/material/'.$data['material_id'])->with('success', 'Berhasil Membuat Materi Baru!');
    }

    public function edit(string $id)
    {
        $data = Material::where('id', $id)->first();
        return view('material_detail/edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $data = [
            'material_id' => $request->input('id_ref'),
            'material_content' => $request->input('content'),
        ];

        MaterialDetail::where('id', $id)->update($data);
        return redirect('/material/' . $data['material_id'])->with('success', 'Berhasil Update Data!');
    }

    public function delete(string $id)
    {
        MaterialDetail::where('id', $id)->delete();
        return redirect('/material')->with('success', 'Berhasil hapus data!');
    }
}
