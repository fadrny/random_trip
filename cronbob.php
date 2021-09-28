<?php
require __DIR__ . '/db.php';
require __DIR__ . '/func.php';

$database = new db;
$f = new func;

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($database->add_new_lottery_record($f->is_it_today(), $database->get_random_place()['placeName']))
    echo "new record written \r\n";
else
    echo "today's record already written \r\n";

