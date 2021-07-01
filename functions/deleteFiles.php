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

        if(file_exists($file)){
            unlink($file);
        }else{
            echo 'El archivo no existe';
        }

    }else{
        chdir($currentPath);
        $actualPath = getcwd();
        $pathAndFile = $actualPath. "\\" .$file;
        
        if(file_exists($file)){
            unlink($file);
        }else{
            echo 'El archivo no existe';
        }

    }

    if(is_dir($pathAndFile)){
        rmdir($pathAndFile);
    }else{
        'Esto no es una carpeta';
    }
header('Location: ../index.php');