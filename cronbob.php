<?php
require __DIR__ . '/db.php';
require __DIR__ . '/func.php';

$database = new db;
$f = new func;

if($database->add_new_lottery_record($f->is_it_today(), $database->get_random_place()['placeName']))
    echo "new record written \r\n";
else
    echo "today's record already written \r\n";

