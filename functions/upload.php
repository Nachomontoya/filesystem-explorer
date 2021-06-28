<?php
session_start();
$file = $_FILES['file'];
$fileName = $file['name'];
$fileType = $file['type'];
$rootPath = '../root';
$currentPath = $_SESSION['path'];


if($currentPath == NULL){
    move_uploaded_file($file['tmp_name'],"$rootPath/$fileName");
}else{
    chdir($rootPath.'/'.$currentPath);
    $actualPath = getcwd();
    move_uploaded_file($file['tmp_name'],"$actualPath/$fileName");
}



