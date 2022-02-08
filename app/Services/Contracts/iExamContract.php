<?php

namespace App\Services\Contracts;

interface iExamContract
{
    public function getAnswer(string $data) : string;

    public function getQuestion(string $data) :? string;

    public function getExam(string $data) :? string;
}
