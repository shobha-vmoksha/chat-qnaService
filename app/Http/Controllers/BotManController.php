<?php

namespace App\Http\Controllers;

use App\Models\Question;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {

        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $botman = app('botman');

        $botman->hears('help', function($botman){
            $botman->reply('This is the helping information!');
        })->skipsConversation();

        $botman->hears('stop', function($botman){
            $botman->reply('We stopped your conversation!');
        })->stopsConversation();

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi' || $message == "Hi") {
                $botman->reply("Hi, Welcome to Dr.Gracia");
            }else{
               $findText = Question::where('title', 'like', '%' . $message . '%')->first();
               if(!is_null($findText)){
                   $botman->reply($findText->body);
               }else{
                   $botman->reply('Oops! No data found...!');
               }

            }

        });

        $botman->listen();
    }
}
