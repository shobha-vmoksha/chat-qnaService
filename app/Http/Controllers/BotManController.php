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

        //to use this chatbot in web interfaces this webDriver is required
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        //this will act as variable that uses all the properties of botman
        $botman = app('botman');

        $botman->hears('help', function($botman){
            $botman->reply('This is the helping information!');
        })->skipsConversation();

        $botman->hears('stop', function($botman){
            $botman->reply('We stopped your conversation!');
        })->stopsConversation();

        $botman->hears('{message}', function($botman, $message) {

            //if user say hi. it will return a response of line no 34
            if ($message == 'hi' || $message == "Hi") {
                $botman->reply("Hi, Welcome to Dr.Gracia");
            }else{
                //in this loop it will search for the keyword if it exists in db return the response.
               $findText = Question::where('title', 'like', '%' . $message . '%')->first();
               if(!is_null($findText)){
                   $botman->reply($findText->body);
               }else{
                   //if it not exists return this line
                   $botman->reply('Oops! No data found...!');
               }

            }

        });

        $botman->listen();
    }
}