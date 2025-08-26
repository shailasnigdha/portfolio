<?php
$dataDir=__DIR__.'/../storage'; if(!is_dir($dataDir)) mkdir($dataDir,0777,true);
$file=$dataDir.'/messages.json';
$payload=['name'=>$_POST['name']??'','email'=>$_POST['email']??'','subject'=>$_POST['subject']??'','message'=>$_POST['message']??'','time'=>date('c')];
$all=[]; if(file_exists($file)){ $json=file_get_contents($file); $all=json_decode($json,true)?:[]; } $all[]=$payload; file_put_contents($file,json_encode($all,JSON_PRETTY_PRINT));
header('Location: ../index.php?page=contact&sent=1');