<?php

require_once __DIR__ . '/../vendor/autoload.php';

$usernames = fopen('top-usernames-shortlist.txt', 'r');
$passwords = fopen('2020-200_most_used_passwords.txt', 'r');

while(!feof($usernames)) {
    $username = fgets($usernames);
    while(!feof($passwords)) {
        $password = fgets($passwords);
        echo 'DEBUG => username: ' . $username . ' - password: ' . $password . "<br>";
    }
}

fclose($passwords);
fclose($usernames);

