<?php
session_start();
$rootPath = '../root';
$currentPath = $_SESSION['path'];
$file =$_POST["trash"];




    if($currentPath == NULL){
        $actualPath = getcwd();
        chdir($rootPath);
        $actualPath = getcwd();
        $pathAndFile = $actualPath. "\\" .$file;

        if(file_exists($pathAndFile)){
            unlink($pathAndFile);
        }else{
            echo 'El archivo no existe';
        }

    }else{
        chdir($currentPath);
        $actualPath = getcwd();
        $pathAndFile = $actualPath. "\\" .$file;
        
        if(file_exists($pathAndFile)){
            unlink($pathAndFile);
            
        }else{
            echo 'El archivo no existe';
        }

    }

header('Location: ../index.php');