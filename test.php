<?php

require_once __DIR__ . '/vendor/autoload.php';
use \tuana8tmt\Curd\Query;
use \tuana8tmt\Curd\Connection;
$server = "localhost";
$username = "root";
$password = "";
$database = "curd";
$conn = new Connection($server, $username, $password, $database)->conn;

$test = new Query($conn);
// $data = $test->delete()->from("nhan_vien")->where("id = '1'")->run();
$data = array(
    'ten' => 'dasdasdasd',
    'so_dien_thoai' => '0985234592',
    'nha_cung_cap'=> 'asdasdasdas'
);
$update = $test->from('phong_ban')->where("ten", 'dasdasdasd')->where("so_dien_thoai", '0985234')->where("nha_cung_cap", 'asdasdasdas')->select();
print_r($update);

