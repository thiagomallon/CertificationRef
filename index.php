<?php

require_once 'vendor/autoload.php';

$_closures = new \App\OOProgramming\Closures();

//var_dump($_closures->getClosure());

//var_dump($_GET);
$handler = fopen('php://memory', 'a+');
fwrite($handler, "Churupita, eu te amo - by T.Mallon\n");
fseek($handler, 0);
echo fread($handler, 1024);

$handler2 = fopen('php://memory', 'a+');
fwrite($handler2, "Davi, vou te morder!\n");
fseek($handler2, 0);
echo fread($handler2, 1024);
fseek($handler2, 0, SEEK_END);
fwrite($handler2, "Davi, vou te morder!\n");
fseek($handler2, 0);
echo fread($handler2, 1024)."\n\n\n\n";
