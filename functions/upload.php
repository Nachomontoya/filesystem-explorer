<?php
session_start();
$file = $_FILES['file'];
$fileName = $file['name'];
$fileType = $file['type'];
$currentPath = $_SESSION['path'];
getcwd($currentPath);

if(!is_dir($currentPath)){
    opendir($currentPath,0777);
}else{
    opendir($currentPath,0777);
    move_uploaded_file($file['tmp_name'],"$currentPath/$fileName");
}
header('Location: ../index.php');


