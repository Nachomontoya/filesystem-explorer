<?php


function showRootContent()
{
    $files = array();

    $path = getcwd();
    chdir('root/');
    $path = getcwd();
    if ($gestor = opendir($path)) {
        while ($archivo = readdir($gestor)) {
            if ($archivo != '.' && $archivo != '..') {
                // echo "nombre archivo: $archivo : tipo archivo: " . filetype($path.'/' . $archivo) . "<br>";
                $files[] = $archivo;
            }
        }
        closedir($gestor);
    }
    foreach ($files as $file) {
        if (is_dir($file)) {
            echo '<li class="nav-item">';
            echo '<a class="nav-link collapsed" href="#">';
            echo '<i class="fas fa-fw fa-folder"></i>';
            echo '<span>' . $file . '</span>';
            echo '</a>';
            echo '</li>';

            //    Divider
            echo '<hr class="sidebar-divider d-none d-md-block" />';
        }
    }
    return $files;
}
