<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#pane {
    width: 1000px;
    background-color: white;
    position: relative;
    z-index: 0;
}
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, legend, textarea, p, blockquote, th, td {
    margin: 0;
    padding: 0;
}


body {
    font-family: Arial,Verdana,sans-serif;
    font-size: 12px;
    background-color: #B8B8BA;
    margin: 0;
    position: relative;
    top: 107px;
}

body.IE{
    position:static;
    top:0;
} 

#header {
    width: 100%;
    padding-top: 15px;
    padding-bottom: 15px;
}

#content {
    font-size: 16px;
    text-align: left;
    font-family: Arial,Verdana,sans-serif;
    margin: auto;
    background-color: #FFFFFF;
    border: 2px solid #888888;
}


#loginText {
    text-align: center;
    width: 600px;
    border: 1px solid black;
    font-size: 16px;
    margin: auto;
    margin-bottom: 10px;
    margin-top: 20px;
    padding: 10px;
    background-color: #CCCCCC;
}

.text {
    margin-left: 50px;
}

h1 {
    font-size: 24px;
    font-weight: normal;
    text-decoration: underline;
}

#userID {
    margin-top: 10px;
}


#results {
   position: relative;
   margin: auto;
   text-align: center;
}

#results-table {
    border-collapse: collapse;
    margin: 20px;
    text-align: left;
}

#amazon {
    width: 480px;
    font-size: 14px;
    font-style: italic;
    margin: auto;
    margin-top: 45px;
    margin-bottom: 45px;
    border-collapse: collapse;
}

#amazon td{
    padding: 8px;
    background: #EEEEEE;
    border-bottom: 1px solid #999999;
    color: #444;
    border-top: 1px solid transparent;
}

#box-table-a
{
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: auto;
    margin-top: 45px;
    margin-bottom: 45px;
    width: 480px;
    text-align: left;
    border-collapse: collapse;
}
#box-table-a th
{
    font-size: 13px;
    font-weight: normal;
    padding: 8px;
    background: #CCCCCC;
    border-top: 4px solid #666666;
    border-bottom: 1px solid #999999;
    color: #000;
}
#box-table-a td
{
    padding: 8px;
    background: #EEEEEE;
    border-bottom: 1px solid #999999;
    color: #444;
    border-top: 1px solid transparent;
}
#box-table-a tr:hover td
{
    background: #d0dafd;
    color: #000000;
}


#box-table-b
{
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: 45px;
    width: 480px;
    text-align: center;
    border-collapse: collapse;
    border-top: 7px solid #9baff1;
    border-bottom: 7px solid #9baff1;
}
#box-table-b th
{
    font-size: 13px;
    font-weight: normal;
    padding: 8px;
    background: #e8edff;
    border-right: 1px solid #9baff1;
    border-left: 1px solid #9baff1;
    color: #039;
}
#box-table-b td
{
    padding: 8px;
    background: #e8edff;
    border-right: 1px solid #aabcfe;
    border-left: 1px solid #aabcfe;
    color: #669;
}
</style>

<?php 
if ($_POST['userID']) 
  $idx = $_POST['userID'];
?>


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
