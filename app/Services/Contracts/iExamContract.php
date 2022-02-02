<?php

namespace App\Services\Contracts;

interface iExamContract
{
    public function getAnswer($question);

    public function getQuestion(string $data);

    public function getExam(string $data);
}
