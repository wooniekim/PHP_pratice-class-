<?php
// 데이터 베이스 연결
const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_NAME = 'myhome';
const DB_LOGIN_ID = 'myhome';
const DB_LOGIN_PWD = 'myhome1234';

$dbConnectionString = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
$db = new PDO($dbConnectionString, DB_LOGIN_ID, DB_LOGIN_PWD);

$_site_options = [
    "board" => [
        "name" => "영진 자게",
        "tableName" => "board",
        "listPage" => "/board/index.php",
        "writePage" => "/board/write.php",
        "writeOkPage" => "/board/write_ok.php",
        "viewPage" => "/board/view.php",
        "modifyPage" => "/board/modify.php",
        "modifyOkPage" => "/board/modify_ok.php",
        "delPage" => "/board/del.php",
    ],
];
?>