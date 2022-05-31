<?php
use App\Http\Controllers\BotManController;
use App\Conversations\BiranjeAkcijeConversation;
use App\Conversations\TestConversation;
$botman = resolve('botman');

$botman->hears('/vodic', function($bot) {
    $bot->startConversation(new BiranjeAkcijeConversation);
});


$botman->hears('/pretraga', function($bot) {
    $bot->startConversation(new TestConversation);

});





