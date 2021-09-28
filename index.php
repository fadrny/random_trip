<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/db.php';
require __DIR__ . '/func.php';

$database = new db;
$f = new func;

$latte = new Latte\Engine;
$latte->setTempDirectory(__DIR__ . '/temp');



$params = [
    'days_in_table' => $database->get_count_of_records(),
    'already_successful' => $database->already_succesful(),
];

if($database->get_count_of_records() > 0){
    $params['latest_record'] = $database->get_latest_record();
    $params['maps_url'] = "https://www.google.com/maps/search/?api=1&query=" . urlencode($database->get_latest_record()['place']);
}

$latte->render('index.latte', $params);
//$html = $latte->renderToString('index.latte');