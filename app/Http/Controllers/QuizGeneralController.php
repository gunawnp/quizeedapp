<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\QuizGeneral;
use App\Models\QuizGeneralDetail;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        QuizGeneralDetail::where('quiz_general_id', $id)->delete();
        QuizGeneral::where('id', $id)->delete();
        return redirect('/quiz_general/' . $m_id)->with('success', 'Berhasil hapus data!');
    }

    public function show(string $m_id, string $qg_id, string $id)
    {
        $dataM = Material::where('id', $m_id)->first();
        $data = QuizGeneral::where('id', $qg_id)->first(); 
        $dataQuizGD = QuizGeneralDetail::where('quiz_general_id', $qg_id)->where('id', $id)->first();
        return view('quiz_general/show')->with(['dataM' => $dataM,'data' => $data, 'dataQGD' => $dataQuizGD]);
    }

    public function showUser(string $m_id, string $qg_id, string $id)
    {
        $dataM = Material::where('id', $m_id)->first();
        $data = QuizGeneral::where('id', $qg_id)->first(); 
        $dataQuizGD = QuizGeneralDetail::where('quiz_general_id', $qg_id)->get();
        $dataAnswer = StudentAnswer::where('material_id', $m_id)->where('user_name', Auth::user()->name)->where('general_id', $qg_id)->first();
        return view('quiz_general/show-user')->with(['dataM' => $dataM,'data' => $data, 'dataQGD' => $dataQuizGD, 'dataSA' => $dataAnswer]);
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

        $dataM = $request->input('id_mat');

        $qgd = QuizGeneralDetail::create($data);

        return redirect('/quiz_general/' . $dataM . '/' . $data['quiz_general_id'] . '/' . $qgd->id)->with('success', 'Berhasil Membuat Soal Baru!');
    }

    public function store_detailUser(Request $request)
    {
        // Mendapatkan data dari formulir
        $formData = $request->input();

        // Mendapatkan data dari database berdasarkan quiz_general_id
        $dataQuizGD = QuizGeneralDetail::where('quiz_general_id', $formData['qg_id'])->get();

        $countCorrect = 0;
        // Membandingkan jawaban
        foreach ($dataQuizGD as $quiz) {
            $questionNumber = $quiz->number;
            $userAnswer = $formData['option-' . $questionNumber];
            $correctAnswer = $quiz->answer;

            // Membandingkan jawaban
            if ($userAnswer === $correctAnswer) {
                // Jawaban benar
                $countCorrect++;
            }
        }

        $score = $countCorrect * 100 / $dataQuizGD->count();

        $dataScore = [
            'user_name' => Auth::user()->name,
            'material_id' => $formData['m_id'],
            'general_id' => $formData['qg_id'],
            'score' => $score
        ];

        StudentAnswer::create($dataScore);
        return redirect('/quiz_general_user/' . $formData['m_id'] . '/' . $formData['qg_id'] . '/1')->with('success', 'Jawaban sudah diunggah!');
    }

    public function delete_detail(string $m_id, string $qg_id, string $id)
    {
        QuizGeneralDetail::where('id', $id)->delete();
        return redirect('/quiz_general/' . $m_id . '/' . $qg_id . '/' . $id-1)->with('success', 'Berhasil hapus data!');
    }
}
    