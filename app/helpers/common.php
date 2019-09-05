<?php

function uploads($name)
 {
     if (request()->file($name)->isValid()) {
         $photo = request()->file($name);
         //$extension = $photo->extension();
         //$store_result = $photo->store('photo');
         $store_result = $photo->store('', 'public');
         
         return $store_result;
         }
         exit('未获取到上传文件或上传过程出错');
 }


?>