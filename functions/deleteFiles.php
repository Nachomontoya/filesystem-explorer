<?php
//Sacar el path dinamicamente
function deleteFile() {
    if(file_exists('./root/example.txt')){
    unlink('./root/example.txt');
    }else{
        echo 'El archivo no existe';
    }
}