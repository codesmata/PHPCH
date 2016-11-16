<?php

require 'vendor/autoload.php';
use AddressBook\Data\Persistence\Sqlite\SqliteConnection;

$SqliteInstance = new SqliteConnection('app.db');

//Create Contact Table
$contactTable = $SqliteInstance->connection->exec('create table CONTACT (ID integer primary key autoincrement, NAME char(100) not null, EMAIL char(100) not null)');

if ( ! $contactTable)
    echo $SqliteInstance->connection->lastErrorMsg();
else
    echo "Contact Table Created Successfully..";

//Create Job Listing Table
$jobTable = $SqliteInstance->connection->exec('create table JOBS (ID integer primary key autoincrement, NAME char(100) not null, STATUS char(25) not null)');

if ( ! $jobTable)
    echo $SqliteInstance->connection->lastErrorMsg();
else
    echo "Jobs Table Created Successfully..";