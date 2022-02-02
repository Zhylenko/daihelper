<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \Telegram;
use Exam;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        $update         = $request->all();
        $message        = $update['message'];
        $chatId         = $message['chat']['id'];

        Telegram::sendMessage(['chat_id' => $chatId, 'text' => Exam::getAnswer($message['text'])]);

        return '';
    }
}
