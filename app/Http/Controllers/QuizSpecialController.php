<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\QuizSpecial;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizSpecialController extends Controller
{
    public function show(string $m_id, string $id)
    {
        $data = Material::where('id', $m_id)->first();
        $dataQuizS = QuizSpecial::where('material_id', $m_id)->where('id', $id)->first();
        return view('quiz_special/show')->with(['data' => $data, 'dataQS' => $dataQuizS]);
    }

    public function showUser(string $m_id)
    {
        $data = Material::where('id', $m_id)->first();
        $dataQuizS = QuizSpecial::where('material_id', $m_id)->get();
        $dataAnswer = StudentAnswer::where('material_id', $m_id)->where('user_name', Auth::user()->name)->first();
        return view('quiz_special/show-user')->with(['data' => $data, 'dataQS' => $dataQuizS, 'dataSA' => $dataAnswer]);
    }

    public function store(Request $request)
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
            'material_id' => $request->input('id_ref'),
            'number' => $request->input('number'),
            'question_text' => $request->input('question_text'),
            'option_a' => $request->input('option_a'),
            'option_b' => $request->input('option_b'),
            'option_c' => $request->input('option_c'),
            'option_d' => $request->input('option_d'),
            'answer' => $request->input('answer'),
        ];

        $qs = QuizSpecial::create($data);

        return redirect('/quiz_special/' . $data['material_id'] . '/' . $qs->id)->with('success', 'Berhasil Membuat Soal Baru!');
    }

    public function storeUser(Request $request)
    {
        // Mendapatkan data dari formulir
        $formData = $request->input();

        // Mendapatkan data dari database berdasarkan material_id
        $dataQuizS = QuizSpecial::where('material_id', $formData['m_id'])->get();

        $countCorrect = 0;
        // Membandingkan jawaban
        foreach ($dataQuizS as $quiz) {
            $questionNumber = $quiz->number;
            $userAnswer = $formData['option-' . $questionNumber];
            $correctAnswer = $quiz->answer;

            // Membandingkan jawaban
            if ($userAnswer === $correctAnswer) {
                // Jawaban benar
                $countCorrect++;
            }
        }

        $score = $countCorrect * 100 / $dataQuizS->count();

        $dataScore = [
            'user_name' => Auth::user()->name,
            'material_id' => $formData['m_id'],
            'score' => $score
        ];

        StudentAnswer::create($dataScore);

        return redirect('/quiz_special_user/' . $formData['m_id'])->with('success', 'Jawaban sudah diunggah!');
    }

    public function delete(string $m_id, string $id){
        QuizSpecial::where('id', $id)->delete();
        return redirect('/quiz_special/' . $m_id . '/' . $id-1)->with('success', 'Berhasil hapus data!');
    }
}
