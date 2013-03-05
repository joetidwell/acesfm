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


$stmt = $db->prepare("SELECT * FROM data WHERE `email` <> ''");
$stmt->execute();
$results = $stmt->fetchAll();
$numEmail = $stmt->rowCount();

$stmt = $db->prepare("SELECT * FROM data WHERE `didVisit` = 1");
$stmt->execute();
$numVisit = $stmt->rowCount();

$stmt = $db->prepare("SELECT * FROM data WHERE `didVisit` = 1 AND `email` = ''");
$stmt->execute();
$numLoser = $stmt->rowCount();


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

 <table id="box-table-a">
	      <thead>
		<tr>
		  <th scope="col">Code</th>
		  <th scope="col">Email Address</th>
		  <th scope="col">Winner 1</th>
		  <th scope="col">Winner 2</th>
		  <th scope="col">Winner 3</th>
		  <th scope="col">Winner 4</th>
		</tr>
	      </thead>
	      <tbody>
<?php

foreach ($results as $val) {
  echo '<tr><td>'.$val['idx'].'</td><td>'.$val['email'].'</td><td>'.$val['Winner_1'].'</td><td>'.$val['Winner_2'].'</td><td>'.$val['Winner_3'].'</td><td>'.$val['Winner_4'].'</td></tr>';
}
?>

<tr><td colspan=6>
  
 <table id="box-table-b">
	      <thead>
		<tr>
		  <th scope="col">Unique Log-Ins</th>
		  <th scope="col">Winners</th>
		  <th scope="col">Non-Winners</th>
		</tr>
	      </thead>
	      <tbody>
  <tr><td><?php echo $numVisit; ?></td><td><?php echo $numEmail; ?></td><td><?php echo $numLoser; ?></td></tr>
		</tbody>
 </table>


</td>
  </tr>

</tbody>
</table>




	</body>
	</html>
