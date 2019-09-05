<?php 
$curl=curl_init('http://www.baidu.com');
$curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$data=curl_exec($curl);
$errno=curl_exec($curl);
$err_msg=curl_error($curl);
var_dump($data);
curl_close($curl);


 ?>