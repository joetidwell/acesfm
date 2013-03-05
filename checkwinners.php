<!DOCTYPE html>
<html>
<head>


<?php
$username = "eva"; //Change to whatever you want your username to be
$password = "iscool"; //Change to whatever you want your password to be

if(isset($_POST['submit'])){
	if($_POST['username'] == $username && $_POST['password'] == $password){
        //EXECUTE YOUR CODE HERE


$db = new PDO('mysql:host=localhost;dbname=fordham;charset=utf8', 'root', 'grinch99');

$statement = $db->prepare("select * from data where condition = :condition");
$statement->execute(array(':condition' => "1"));
$row = $statement->fetchAll(); // Use fetchAll() 

$idx = 62719;
$stmt = $db->prepare("SELECT * FROM data WHERE `email` <> ''");
#$stmt->bindParam(':name', $idx);
$stmt->execute();
$results = $stmt->fetchAll();





$db = null;


        } else {
        echo "sorry the username and password were incorrect";
        }
} else { //IF THE FORM WAS NOT SUBMITTED
//SHOW FORM
	?><table id="box-table-a"><tr><td><form method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" />
		<input type='submit' name='submit' />
	</form></td></tr></table> <?php 
}


?>

<LINK href="results.css" rel="stylesheet" type="text/css">


	</head>
	<body>

<?php

echo '
 <table id="box-table-a">
	      <thead>
		<tr>
		  <th scope="col">Code</th>
		  <th scope="col">Email Address</th>
		</tr>
	      </thead>
	      <tbody>
';

foreach ($results as $val) {
  echo '<tr><td>'.$val['idx'].'</td><td>'.$val['email'].'</td></tr>';
}

echo '
</tbody>
</table>
';


?>
	</body>
	</html>
