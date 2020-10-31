<?php

require './vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    // Your driver-specific configuration
     'facebook' => [
       'token' =>  $_ENV["FACEBOOK_TOKEN"],
       'app_secret' => $_ENV['FACEBOOK_APP_SECRET'],
       'verification'=>$_ENV['FACEBOOK_VERIFICATION'],
  ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

$botman->hears('wtf', function (BotMan $bot) {
    $bot->reply('idki.');
});

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello yourself.');
});



// Start listening
$botman->listen();