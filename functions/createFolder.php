<?php
session_start();
$rootPath = '../root';
$currentPath = $_SESSION['path'];


if($currentPath == NULL){
    $actualPath = getcwd();
    chdir($rootPath);
    $actualPath = getcwd();
    echo $actualPath;
}else{
    chdir($currentPath);
    $actualPath = getcwd();
    echo $actualPath;
}

// header("Location: ../index.php");
