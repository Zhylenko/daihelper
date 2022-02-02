<?php

namespace App\Services;

use App\Services\Contracts\iExamContract;

use Illuminate\Support\Facades\Storage;

class DaiService implements iExamContract
{
    public function getAnswer($data)
    {
        $exam           = $this->getExam($data);
        $questionNum    = $this->getQuestion($data);

        if (empty($exam) || empty($questionNum)) {
            $answer     = 'Ошибка';
        } else {
            try {
                $storageDist    = "public/tickets/{$exam}/{$questionNum}.json";
                $question   = json_decode(Storage::disk('local')->get($storageDist), 1);

                $answerNum  = array_search(1, $question['que_answers_check']) + 1;
                $answer     = !empty($question['que_answers'][$answerNum]) ? $answerNum . '. ' . $question['que_answers'][$answerNum] : $answerNum . '. ';
            } catch (\Throwable $th) {
                $answer     = 'Не существует';
            }
        }

        return $answer;
    }

    public function getExam(string $data)
    {
        $pattern        = "/^(?:(\d+)?\D+?(\d+))+$/uis";
        preg_match_all($pattern, $data, $matches);
        return isset($matches[1][0]) ? $matches[1][0] : null;
    }

    public function getQuestion(string $data)
    {
        $pattern        = "/^(?:(\d+)?\D+?(\d+))+$/uis";
        preg_match_all($pattern, $data, $matches);
        return isset($matches[2][0]) ? $matches[2][0] : null;
    }
}
