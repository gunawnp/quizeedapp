<?php

namespace App\Http\Controllers;

use App\Models\StudentAnswer;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAnswerController extends Controller
{
    public function index(string $id)
    {
        $data = StudentAnswer::where('material_id', $id)->where('general_id', null)->get();
        return view('student_answer/index')->with(['data'=> $data, 'm_id' => $id]);
    }

    public function index_gen(string $m_id, string $qg_id)
    {
        $data = StudentAnswer::where('material_id', $m_id)->where('general_id', $qg_id)->get();
        return view('student_answer/index')->with(['data'=> $data, 'm_id' => $m_id]);
    }
}
