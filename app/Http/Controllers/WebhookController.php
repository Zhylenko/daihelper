<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Telegram;
use Exam;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        $update     = $request->all();
        $message    = $update['message'];
        $chatId     = $message['chat']['id'];

        $answer     = Exam::getAnswer($message['text']);

        Telegram::sendMessage(['chat_id' => $chatId, 'text' => $answer]);

        return '';
    }
}
