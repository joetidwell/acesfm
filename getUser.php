<?php
$q=$_GET["q"];

$db = new PDO('mysql:host=localhost;dbname=fordham;charset=utf8', 'root', 'grinch99');

function doSql($db, $stmt) {
   $stmt = $db->query("$stmt");
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$sql="SELECT * FROM data WHERE idx = '".$q."'";
$result = $db->query($sql);
$row = $result->fetch(PDO::FETCH_NUM);

echo $row[0];
echo "howtable";
$db = null;
?> 