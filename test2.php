<?php
session_start();
$msg = $_SESSION['msg'];
$array = str_split($msg);
include 'line.php';
$db = new mysqli("localhost", "root", null, "mydb");
$db->set_charset("utf8");

foreach ($array as $value) {
$result = $db->query("SELECT * FROM useg WHERE useg = '{$array[1]}'");
if($row = $result->fetch_assoc()){
    $zurlaga = $row["zurlaga"];
    $sizeY = $row["sizeY"];
}
$zur = json_decode($zurlaga);
//echo $zur_string;
//======================================
$img = imagecreatetruecolor(70, $sizeY);

$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);

imagefill($img,0,0, $white);
foreach($zur as $line){
    imagefilledrectangle($img, $line->Start->X, $line->Start->Y, $line->End->X, $line->End->Y, $black);
}
header('Content-Type: image/png');

imagepng($img);
//imagedestroy($img);
}
//header('Location: index.php');
?>