# Welcome 

Package Crud Php

# Hướng dẫn sử dụng


## Connect database

      $test = new  Query($server, $username, $password, $database);
$data = array(

'ten' => 'dasdasdasd',
'so_dien_thoai' => '0985234592',
'nha_cung_cap'=> 'asdasdasdas'
);
## Create

	$test->from('phong_ban')->where("")->insert($data);

## Select

	$test->from('phong_ban')->where("")->select();	

## Update

	$test->from('phong_ban')->where("")->update($data);

## Delete

	$test->from('phong_ban')->where("")->update();


