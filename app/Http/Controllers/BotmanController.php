<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;


class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi' || 'Hi') {
                $this->askName($botman);
            } else {
                $botman->reply("Please Enter Your Name");
            }
        });

        $botman->listen();
    }
    public function askName($botman)
    {
        $botman->ask("Hello! What is Your Name?", function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you ' . $name);
        });
    }
}
