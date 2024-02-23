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
            $this->startConversion($bot);
        });
        $botman->fallback(function (BotMan $bot) {
            $this->sayHi($bot);
        });
        $botman->listen();
    }
    public function startconversion(Botman $bot)
    {
        $bot->startConversation(new OptionConversation());
    }
}
