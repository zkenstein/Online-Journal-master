<?php session_start();?>
<?php
	// Five steps to PHP database connections:
	
	// 1. Create a database connection
	//		(Use your own servername, username and password if they are different.)
	//		$connection allows us to keep refering to this connection after it is established
	$connection = mysql_connect("localhost","root",""); 
	if (!$connection) {
		die("Database connection failed: " . mysql_error());
	}

	// 2. Select a database to use 
	$db_select = mysql_select_db("test_db",$connection);
	if (!$db_select) {
		die("Database selection failed: " . mysql_error());
	}

?>
</html>

<head>
<title>eJournal</title>
<script type="text/javascript" src="js/jquery.js"></script>
<style type="text/css">
@import url(css/style.css);
</style>
<script src="jquery.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){	$("#header").fadeIn();
									$("#footer").fadeIn(300);
									$("#footer").fadeIn(500);
								});
								
</script>

</head>
<body>
<div id="header" style="display:none;">
	<img src="img/logo1.png"/>
  <br />
  
</div>
 
<hr id="header_stripe"/>

<hr id="header_stripe_bottom" />
<div id="back">
<a href="texteditor_test.php"><button>Back</button></a>&nbsp;&nbsp;<input type="submit" value="Logout" onclick= "window.location='logout.php'" />
</div>
<div>
<?php
//echo"PHP works fine";


function retrive()
{
$id = $_SESSION["id"];
if(!empty($id))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query1 = mysql_query("SELECT * FROM user_data WHERE id = '$id' order by date asc") or die(mysql_error());
   // $query2 = mysql_query("SELECT * FROM members WHERE password = '$password' ") or die(mysql_error());


	//echo "<br>"."THE Login IS WORKING";
   if (mysql_num_rows($query1) == 0 )//or mysql_num_rows($query2) ==0)
  {
	echo"<div id='previous'>No previous <br>entries</div>";
	  echo '<script>
		$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "texteditor_test.php";
    }, 2000)
	});
		</script>';
  }
    else
    {
        echo"<div id ='previous' >Click to delete <br>entries</div>";
        echo"<div id ='previous_entry' >";
		
		while($found_user = mysql_fetch_array($query1))
		{
			//echo '<b><a href="edit.php?date='{$found_user["date"]}'"'. id='{$found_user["date"]}'.'>';
			echo "<b><a href=\"delete.php?artid={$found_user["article_id"]}\">";
			echo $found_user["date"];
			echo "</a></b>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $found_user["title"];
			echo "<br><br><br>";
		}
		echo"</div>";
	}
	//echo "SIGN UP ENDED";
}
else
{
	header( 'Location: index.html' ) ;
}
}
//echo "Welcome ". $_POST["name"]." your username is: ".$_POST["username"]." and email is: ".$_POST["email"]."<br />";
retrive();
?>


</div> 
   
<div id="footer" style="display:none;">
<a href="....">About</a> &nbsp;&nbsp;&nbsp;
<a href="...">Design & Logic</a>&nbsp;&nbsp;&nbsp;
<a href="....">Queries</a>&nbsp;&nbsp;&nbsp;
<a href="....">Privacy & Terms</a>&nbsp;&nbsp;&nbsp;

</div>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>
