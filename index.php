<?php 
  
  require_once __DIR__ . '/vendor/autoload.php';
  use Cronapis\Greetings;
  use Cronapis\payments;
  echo Greetings::sayHelloWorld();
  echo payments::index();
?>