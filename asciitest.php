<?php
$db = new mysqli("localhost", "root", null, "mydb");
$db->set_charset("utf8");
$result = $db->query("SELECT * FROM useg");
while($row = $result->fetch_assoc()){
    $useg = $row["useg"];
    echo $useg;
}
?>