<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exam;

class ExamController extends Controller
{
    public function getAnswer(Request $request, $data)
    {
        $json = [
            'answer' => Exam::getAnswer($data),
        ];

        return response()
            ->json($json, 200)
            ->header('Access-Control-Allow-Origin', '*');
    }
}
