<!DOCTYPE html>
<html>
<head>

<?php 
if ($_POST['userID']) { 
  $idx = $_POST['userID'];

function doSql($db, $stmt) {
   $stmt = $db->query("$stmt");
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$db = new PDO('mysql:host=localhost;dbname=fordham;charset=utf8', 'root', 'grinch99');

$stmt = $db->prepare("SELECT idx FROM data WHERE idx = :name");
$stmt->bindParam(':name', $idx);
$stmt->execute();
if($stmt->rowCount() > 0){
#exists
$results = doSql($db, "SELECT * FROM data WHERE idx=$idx");
$results = $results[0];
$db->query("UPDATE data SET didVisit=true WHERE idx=$idx");


$isWinner = ((intval($results['Winner_1'])+intval($results['Winner_2'])+intval($results['Winner_3'])+intval($results['Winner_4'])) > 0?true:false); 
$f_1 = intval($results['GP_Q1']);
$f_2 = intval($results['GP_Q2']);
$f_3 = intval($results['GP_Q3']);
$f_4 = intval($results['GP_Q4']);
$s_1 = intval($results['Score1']);
$s_2 = intval($results['Score2']);
$s_3 = intval($results['Score3']);
$s_4 = intval($results['Score4']);

$message = "";

} else {
#doesn't exist
  $idx = '';
  $message = 'Code does not exist.';
}




}
?>

<LINK href="results.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript">

$('html').bind('keypress', function(e)
{
   if(e.keyCode == 13 && e.target.name != "userID")
   {
      return false;
   }
});


$(function() {$('#userInfo').html('<?php echo $message ?>')});

var idx = '<?php echo $idx;?>';
var isWinner = '<?php echo $isWinner;?>';


if (idx != '') {
  var message = '';
  if (isWinner) {
     message = "Congratulations! You won our lottery. Please type in and then submit your email address in the field below, and we will send you a $20 gift certificate to Starbucks.<p>Thank you for participating in our experiment!";
  } else {
     message="You were not one of our lottery winners, but thank you for participating in our experiment.<p>You're forecasting results are included below.";
 }
    $(function() {
       if (!isWinner) $('#contact').hide();

        $('#loginText').toggle();
        $('#message').html(message);

       $(".button").click(function() {  
        // validate and process form here  
        $('.error').hide();  
        var email = $("input#email").val();  
        if (email == "") {  
          $("input#email").focus();
          $("#error").html("Please Enter an Email Address")
          return false;  
        }  else {

var dataString = 'email=' + email + '&idx=' + idx; 
$.ajax({  
  type: "POST",  
  url: "process.php",  
  data: dataString,  
  success: function() {  
    $('#error').html("<p style='color: green;'>E-mail Address Submitted.</p></h2>")  
    $('#contact').hide();
  }  
});  



        }
       });  


return false; 






    });    
} else {
    $(function() {

        $('#results').toggle();
    });    
}


</script>
</head>

<body>

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
	    <form name="getResults" action="index.php" method="POST">
	    <input id="userID" name="userID" type="text"></input>
	    <div id="userInfo" style="color: red; font-style: italic;"></div>
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
		  <span id="message"></span>
		</td>
		</tr>
		<tr>
		  <td>
		    <form id="contact" name="contact" action="">
		    <input id="email" type="text" size="30"></input>
		    <input class="button" type="button" value="Submit">
		      </form>
		    </td>
		  </tr>
		  <tr><td><span id="error" style="color: red; font-weight: bold;"></span></td></tr>
		</table>
	      </div>


	    <div>
	    <table id="box-table-a">
	      <thead>
		<tr>
		  <th scope="col">Question</th>
		  <th scope="col">Result</th>
		  <th scope="col">Your Prediction</th>
		  <th scope="col">Your Score</th>
		</tr>
	      </thead>
	      <tbody>
		<tr>
		  <td>The exchange rate for 1 Euro will remain above 1.30 US dollars through March 1st, 2013.</td>
		  <td>Yes, according to the average rate posted by the ECB.</td>
		  <td><?php echo $f_1;?>%</td>
		  <td><?php echo $s_1;?></td>
		</tr>
		<tr>
		  <td>Iran will sign an IAEA Structured Approach document (i.e., let UN or IAEA inspectors access to Iran's Parchin nuclear site) before March 1st, 2013.</td>
		  <td>No, the inspectors are still not allowed at the Parchin site.</td>
		  <td><?php echo $f_2;?>%</td>
		  <td><?php echo $s_2;?></td>
		</tr>
		<tr>
		  <td>Microsoft will release the next version of its Xbox gaming console by March 1st, 2013.</td>
		  <td>No release date yet.</td>
		  <td><?php echo $f_3;?>%</td>
		  <td><?php echo $s_3;?></td>
		</tr>
		<tr>
		  <td>China's one-child policy will be officially revoked by March 1st, 2013.</td>
		  <td>There has been no change to the policy.</td>
		  <td><?php echo $f_4;?>%</td>
		  <td><?php echo $s_4;?></td>
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
<?php $db = null; ?>
