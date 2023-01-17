<?php

require_once __DIR__ . '/../vendor/autoload.php';

$usernames = fopen('top-usernames-shortlist.txt', 'r');

while(!feof($usernames)) {
    $username = fgets($usernames);
    echo $username."<br>";
}

fclose($usernames);

echo '<br>--------------------------------------------------------<br>';

$passwords = fopen('2020-200_most_used_passwords.txt', 'r');

while(!feof($passwords)) {
    $password = fgets($passwords);
    echo $password."<br>";
}

fclose($passwords);

