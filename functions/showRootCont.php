<?php
session_start();

function getRootPath()
{
    getcwd();
    chdir("root");
    return getcwd() . "/";
}

function getPathContent($path)
{
    $files = array();
    if ($gestor = opendir($path)) {
        while ($archivo = readdir($gestor)) {
            if ($archivo != '.' && $archivo != '..' && $archivo != '.DS_Store') {
                $files[] = $archivo;
            }
        }
        closedir($gestor);
    }
    return $files;
}

function renderOnlyFolders($files)
{
    echo '<li class="nav-item">';
    echo "<form action='form.php' method='post' >";
    echo "<button type='submit' name='home' class='pl-4 nav-link btn-link collapsed' value='./'/'>";
    echo '<i class="fas fa-home"></i>';
    echo "Home";
    echo "</button>";
    echo "</form>";
    foreach ($files as $file) {
        if (is_dir($file)) {
            echo "<form action='form.php' method='post'>";
            echo "<button type='submit' name='path' class='pl-4 nav-link btn-link collapsed' value='$file'/'>";
            echo '<i class="fas fa-folder"></i>';
            echo "$file";
            echo "</button>";
        }
    }
    echo '</li>';
    //    Divider
    echo '<hr class="sidebar-divider d-none d-md-block" />';
}

function getCreationDate($file)
{
    if (file_exists($file)) {
        return date("d/m/Y", filectime($file));
    }
}

function getLastModified($file)
{
    if (file_exists($file)) {
        return date("d/m/Y", filemtime($file)) . " at " . date("H:i:s", filemtime($file));
    }
}

function getSize($file)
{
    if (file_exists($file)) {
        $fileSize = ((int)filesize($file));
        if ($fileSize >= 1048576) {
            $result = number_format($fileSize / 1048576, 2);
            return $result . "MB";
        } elseif ($fileSize >= 1024) {
            $result = number_format($fileSize / 1024, 2);
            return $result . "KB";
        } elseif ($fileSize >= 1073741824) {
            $result = number_format($fileSize / 1073741824, 2);
            return $result . "GB";
        } else {
            return "--";
        }
    }
}

function getExtension($file)
{
    if (file_exists($file)) {
        if (pathinfo($file, PATHINFO_EXTENSION) == "") {
            return "folder";
        } else {
            return pathinfo($file, PATHINFO_EXTENSION);
        }
    }
}

function renderAllContent($files)
{
    var_dump($files);
    foreach ($files as $file) {
        echo "<div class='d-flex w-100 justify-content-between'>";
        echo "<span class='d-flex w-40 pr-4'>";
        echo "<i class='fas fa-fw fa-folder mr-2 '></i>";
        echo "<p class='w-100 mb-0'>" . $file . "</p>";
        echo "<i class='far fa-edit text-right'></i>";
        echo "</span>";
        echo "<p class='w-15 mb-0'>";
        echo getCreationDate($file);
        echo "</p>";
        echo "<p class='w-15 mb-0'>";
        echo getLastModified($file);
        echo "</p>";
        echo "<p class='w-15 mb-0'> ";
        echo getSize($file);
        echo "</p>";
        echo "<span class='w-15 mb-0 d-flex'>";
        echo "<p class='mb-0 w-100'>";
        echo getExtension($file);
        echo "</p>";
        echo '<i class="fas fa-trash"></i>';
        echo "</span>";
        echo "</div>";
        echo '<hr class="sidebar-divider d-none d-md-block" />';
    }
}
