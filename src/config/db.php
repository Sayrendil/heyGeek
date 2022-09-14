<?php

$filename = '../.env';
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$content = explode("\n", $contents);

$db_password = 'admin';
$db_user = 'root';
$db_name = 'db';
$db_host = 'localhost';

foreach($content as $row) {
    $conf = explode("=", $row);
    if($conf[0] == "db_user") {
        $db_user = trim($conf[1]);
    }
    if($conf[0] == "db_password") {
        $db_password = trim($conf[1]);
    }
    if($conf[0] == "db_name") {
        $db_name = trim($conf[1]);
    }
    if($conf[0] == "db_host") {
        $db_host = trim($conf[1]);
    }
}