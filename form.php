<?php
session_start();

$endPoint = $_POST['path'];
// $_SESSION['path'] = $endPoint;
if (isset($_SESSION['path'])) {
  // $_SESSION['path'] .= "/" . $endPoint;
  $_SESSION['path'] = $endPoint;
} else {
  $_SESSION['path'] = $endPoint;
}
header('Location: ./');
