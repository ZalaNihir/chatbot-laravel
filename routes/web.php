<?php

use App\Http\Controllers\BotmanController;
use App\Repositories\TodoRepositoryInterface;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);
// $botman = resolve('botman');
// $botman->hears('What is your name?', function ($bot) {
//     $bot->reply('My name is Bot');
// });
// $botman->hears('age', function ($bot) {
//     $bot->reply('10',[
//         Button::create('Contact Us')->value('contact_us'),
//     ]);
// });
// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });
// $botman->hears('image', function ($bot) {
//     $image = new Image("https://botman.io/img/logo.png");
//     $message = OutgoingMessage::create("This is botman logo")
//         ->withAttachment($image);
//     $bot->reply($message);
// });
// $botman->fallback(function ($bot) {
//     $bot->reply("Sorry! I don't get it!");
// });
// $botman->hears('Start Conversion', BotmanController::class . '@startconversion');

// Route::get('test', function (TodoRepositoryInterface $repository) {
//     $repository->all();
// });
Route::get('about-us',function(){
    return "About Us";
})->name('about');
