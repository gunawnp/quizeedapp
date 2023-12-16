<?php

namespace App\Http\Controllers;

use App\Models\QuizGeneral;
use App\Models\QuizGeneralDetail;
use Illuminate\Http\Request;

class QuizGeneralController extends Controller
{
    public function index(string $id)
    {
        $data = QuizGeneral::where('material_id', $id)->get();
        return view('quiz_general/index')->with(['data'=> $data,'m_id' => $id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ref' => 'required'
        ]);

        $data = [
            'material_id' => $request->input('id_ref')
        ];

        QuizGeneral::create($data);

        return redirect('/quiz_general/' . $data['material_id'])->with('success', 'Berhasil Membuat Stage Baru!');
    }

    public function delete(string $m_id, string $id)
    {
        QuizGeneral::where('id', $id)->delete();
        return redirect('/quiz_general/' . $m_id)->with('success', 'Berhasil hapus data!');
    }

    public function show(string $qg_id, string $id)
    {
        $data = QuizGeneral::where('id', $qg_id)->first();
        $dataQuizGD = QuizGeneralDetail::where('id', $id)->first();
        return view('quiz_general/show')->with(['data' => $data, 'dataQGD' => $dataQuizGD]);
    }

    public function store_detail(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'question_text' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
        ]);

        $data = [
            'quiz_general_id' => $request->input('id_ref'),
            'number' => $request->input('number'),
            'question_text' => $request->input('question_text'),
            'option_a' => $request->input('option_a'),
            'option_b' => $request->input('option_b'),
            'option_c' => $request->input('option_c'),
            'option_d' => $request->input('option_d'),
            'answer' => $request->input('answer'),
        ];

        $qgd = QuizGeneralDetail::create($data);

        return redirect('/quiz_general/' . $data['quiz_general_id'] . '/' . $qgd->id)->with('success', 'Berhasil Membuat Soal Baru!');
    }
}
