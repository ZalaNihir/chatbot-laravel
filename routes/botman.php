<?php 

use App\Http\Controllers\BotmanController;

$botman = resolve('botman');

$botman->hears('hi',function($bot){
    $bot->reply('Hello!');
});

$botman->hears('Start Conversaition',BotmanController::class.'@startconversion');