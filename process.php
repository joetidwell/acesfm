<?php

$email = $_POST['email'];
$idx = $_POST['idx'];

$db = new PDO('mysql:host=localhost;dbname=fordham;charset=utf8', 'root', 'grinch99');

$db->query("UPDATE data SET email='$email' WHERE idx=$idx");


$db = null;

?>