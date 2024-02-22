<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;


class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            if (strtolower($message) === 'hi') {
                $this->askOptions($botman);
            } else {
                $botman->reply("Please say 'hi' to start.");
            }
        });

        $botman->listen();
    }

    public function askOptions($botman)
    {
        $botman->ask('Hi, How can I help you?',
            function (Answer $answer) use ($botman) {
                $selectedOption = $answer->getText();
                switch ($selectedOption) {
                    case 'Contact Us':
                        $this->contactUs($botman);
                        break;
                    case 'About Us':
                        $this->aboutUs($botman);
                        break;
                    default:
                        $botman->reply("Sorry, I didn't understand that option.");
                        break;
                }
            },
            [
                Button::create('Contact Us')->value('contact_us'),
                Button::create('About Us')->value('about_us'),
            ]
        );
    }

    public function contactUs($botman)
    {
        // Handle Contact Us logic here
        $botman->reply("You selected 'Contact Us'. How can we help you?");
    }

    public function aboutUs($botman)
    {
        // Handle About Us logic here
        $botman->reply("You selected 'About Us'. Here is some information about us...");
    }
}
