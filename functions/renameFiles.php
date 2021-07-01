<?php
session_start();
$rootPath = '../root';
$currentPath = $_SESSION['path'];

$oldName = $_POST['oldNames'];
$newName = $_POST['renameFileInput'];


if($currentPath == NULL){
    $actualPath = getcwd();
    chdir($rootPath);
    $actualPath = getcwd();
    $oldNamePath = $actualPath. '\\' .$oldName;
    $newNamePath = $actualPath. '\\' .$newName;
    rename($oldNamePath, $newNamePath);
}else{
    chdir($currentPath);
    $actualPath = getcwd();
    $oldNamePath = $actualPath. '\\' .$oldName;
    $newNamePath = $actualPath. '\\' .$newName;
    rename($oldNamePath, $newNamePath);

}

header('Location: ../index.php');


