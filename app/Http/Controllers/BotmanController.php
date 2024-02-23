<?php

namespace App\Http\Controllers;

use App\Conversations\OptionConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Support\Facades\URL;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        // $botman->hears('{message}', function ($botman, $message) {
        //     if (strtolower($message) === 'hi') {
        //         $this->askOptions($botman);
        //     } else {
        //         $botman->reply("Please say 'hi' to start.");
        //     }
        // });
        $botman->hears('hi',function ($bot){
            // $bot->reply('Hello');
            $this->startconversion($bot);
        });
        $botman->listen();
    }

    // public function askOptions($botman)
    // {
    //     $botman->ask(
    //         'Hi, How can I help you?',
    //         function (Answer $answer) use ($botman) {
    //             $selectedOption = $answer->getText();

    //             switch ($selectedOption) {
    //                 case 'Contact Us':
    //                     $contactUsUrl = URL::to('contact-us'); // Replace with your actual URL
    //                     $botman->reply("Sure, here is the link to our Contact Us page: $contactUsUrl");
    //                     break;
    //                 case 'About Us':
    //                     $aboutUsUrl = URL::to('about-us'); // Replace with your actual URL
    //                     $botman->reply("Great! Learn more about us here: $aboutUsUrl");
    //                     break;
    //                 case 'Services':
    //                     $servicesUrl = URL::to('services'); // Replace with your actual URL
    //                     $botman->reply("Here is a link to our Services page: $servicesUrl");
    //                     break;
    //                 default:
    //                     $botman->reply("Sorry, I didn't understand that option.");
    //                     break;
    //             }
    //         },
    //         [
    //             Button::create('Contact Us')->value('contact_us'),
    //             Button::create('About Us')->value('about_us'),
    //             Button::create('Services')->value('services'),
    //         ]
    //     );
    // }

    // public function contactUs($botman)
    // {
    //     // Handle Contact Us logic here
    //     $botman->reply("You selected 'Contact Us'. How can we help you?");
    // }

    // public function aboutUs($botman)
    // {
    //     // Handle About Us logic here
    //     $botman->reply("You selected 'About Us'. Here is some information about us...");
    // }
    public function tinker()
    {
        return view('tinker');
    }

    // public function startConversation(BotMan $bot)
    // {
    //     $bot->startConversation(new ExampleConversation());
    // }
    public function startconversion(Botman $bot)
    {
        $bot->startConversation(new OptionConversation());
    }
}
