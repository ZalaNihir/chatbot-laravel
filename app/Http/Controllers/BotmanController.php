<?php

namespace App\Http\Controllers;

use App\Conversations\OptionConversation;
use BotMan\BotMan\BotMan;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('hi', function (BotMan $bot) {
            $this->startConversion($bot); // Updated method name
        });
        $botman->fallback(function (BotMan $bot) {
            $this->startConversion($bot); // Updated method name
        });
        $botman->listen();
    }

    public function startConversion(Botman $bot) // Updated method name
    {
        $bot->startConversation(new OptionConversation());
    }
}
