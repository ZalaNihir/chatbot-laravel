<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Foundation\Inspiring;

class OptionConversation extends Conversation
{
    public function run()
    {
        // $this->bot->reply('Done');
        $question = Question::create("How can I help You today?")
            ->fallback('Unable to choose Option')
            ->callbackId('ask_about_options')
            ->addButtons([
                Button::create('Contact Us')->value('contact-us'),
                Button::create('About Us')->value('about-us'),
                Button::create('Faq')->value('faq'),
            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'contact-us') 
                {
                    // $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    // $this->say($joke);
                    $this->say("Contact Us");
                } else if($answer->getValue() === 'about-us')
                {
                    // $aboutus = "<a href=".route('about').">About Us</a>";
                    // $this->say($aboutus);
                    $this->say("This is About Us content");
                }else if($answer->getValue() === 'faq')
                {
                    $this->say("This is FAQ section");
                }
            }
        });
    }
}
