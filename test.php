<?php

require_once __DIR__ . '/vendor/autoload.php';
use \tuana8tmt\Curd\Query;

$server = "localhost";
$username = "root";
$password = "";
$database = "curd";

$test = new Query($server, $username, $password, $database);
// $data = $test->delete()->from("nhan_vien")->where("id = '1'")->run();
$data = array(
    'ten' => 'dasdasdasd',
    'so_dien_thoai' => '0985234592',
    'nha_cung_cap'=> 'asdasdasdas'
);
$update = $test->from('phong_ban')->where("ten", 'dasdasdasd')->where("so_dien_thoai", '0985234')->where("nha_cung_cap", 'asdasdasdas')->select();
print_r($update);

