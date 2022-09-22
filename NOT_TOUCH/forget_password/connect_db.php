<?php

$db_host='localhost';
$db_name='members';
$db_user='root';
$db_pass='1234';

$dsn="mysql:host={$db_host};dbname={$db_name};charset=utf8";

$pdo_option=[
  PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn,$db_user,$db_pass,$pdo_option);

if(! isset($_SESSION)){
  session_start();
}
$pageName='';