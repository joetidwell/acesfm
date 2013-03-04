<!DOCTYPE html>
<html>
<head>

<?php 
if ($_POST['userID']) { 
  $idx = $_POST['userID'];

$db = new PDO('mysql:host=localhost;dbname=fordham;charset=utf8', 'root', 'grinch99');

function getData($db, $stmt) {
   $stmt = $db->query("$stmt");
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$results = getData($db, "SELECT * FROM data WHERE idx=$idx");

}
?>

<LINK href="results.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript">
var idx = '<?php echo $idx;?>';
if (idx != '') {
    $(function() {
        $('#loginText').toggle();
    });    
} else {
    $(function() {
        $('#results').toggle();
    });    

}
</script>
</head>

<body>

<pre>
<?php

print_r($results);
?>
</pre>

  <table id="content">
    <tbody>
      <tr>
	<td>
	  <div id="header"> 
	    <img src="img/titlebar.png"></img>
	  </div>
	  <div class="text">
	    <h1>Forecasting Results</h1>
	  </div>
	</td>
      </tr>
      <tr>
	<td>
	  <div id="loginText">
	    <div>Please type in your identification number and press 'Enter':</div>
	    <form name="getResults" action="index.php" method="post">
	    <input id="userID" name="userID" type="text"></input>
	    </form>
	  </div>
	  
	</td>
      </tr>
      <tr>
	<td>
	  <div id="results">
	    <div>

	      <table id="amazon">
		<tr>
		<td>
		  Congratulations! You won our lottery.  All of your wildest dreams will now come true, as long as those dreams can be purchased from amazon.com for under $50. [Someone will probably want to provide me with better text...]
		</td>
		</tr>
		</table>
	      </div>
	    <div>
	    <table id="box-table-a">
	      <thead>
		<tr>
		  <th scope="col">IFP Description</th>
		  <th scope="col">Score</th>
		  <th scope="col">Percentile</th>
		</tr>
	      </thead>
	      <tbody>
		<tr>
		  <td>The Vancouver Canucks will trade Roberto Luongo by March 1st, 2013.</td>
		  <td>89</td>
		  <td>75th</td>
		</tr>
		<tr>
		  <td>China's one-child policy will be officially revoked by March 1, 2013.</td>
		  <td>40</td>
		  <td>50th</td>
		</tr>
		<tr>
		  <td>Mahmoud Ahmadinejad will resign or otherwise vacate the office of President of Iran before arch 31st, 2013.</td>
		  <td>72</td>
		  <td>98th</td>
		</tr>
	      </tbody>
	    </table>

	    </div>
	  </div>
	  </td>
	</tr>
    </tbody>
  </table>

</body>
</html>
