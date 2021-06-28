<?php

$file = $_FILES['file'];
$fileName = $file['name'];
$fileType = $file['type'];
$root = '../root';
if(!is_dir('../root')){
    opendir('../root',0777);
}else{
    opendir('../root',0777);
    move_uploaded_file($file['tmp_name'],"$root/$fileName");
}
header('Location: ../index.php');


