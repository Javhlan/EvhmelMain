<?php
session_start();
$msg = $_SESSION['msg'];
$array = str_split($msg);
$size = sizeof($array);
//print_r($array[0]);
foreach ($array as $value) {
    echo "Value: $value<br />\n";
}
?>