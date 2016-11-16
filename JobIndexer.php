<?php

require_once 'vendor/autoload.php';

use AddressBook\Data\Persistence\Sqlite\SqlitePersistence;
use AddressBook\CURLClient;

$sqlitePersistence = new SqlitePersistence();

$jenkinsAPI = "localhost:8080/jenkins/api/json?pretty=true";
$username = 'codesmata_jenkins';
$password = "d1690a6de9c85972c5175a69919d7d39";

$jobs = CURLClient::makeCall($jenkinsAPI, $username, $password);
$jobs = json_decode($jobs, true);

foreach($jobs['jobs'] as $job) {
    $name = $job['name'];
    $status =  $job['color'];
    $sqlitePersistence->customQuery("insert into jobs (id, name, status) values (null, '$name', '$status')");
}
