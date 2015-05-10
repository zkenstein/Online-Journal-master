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

<div>
<?php
//echo"PHP works fine";


function Login()
{
$password = md5($_POST['password']);
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query1 = mysql_query("SELECT * FROM members WHERE username = '$_POST[username]' and  password = '$password' ") or die(mysql_error());
	mysql_query("UPDATE members SET lparameter = '1' WHERE username = '$_POST[username]' and  password = '$password'  ") or die(mysql_error());
   // $query2 = mysql_query("SELECT * FROM members WHERE password = '$password' ") or die(mysql_error());


	//echo "<br>"."THE Login IS WORKING";
   if (mysql_num_rows($query1) == 0 )//or mysql_num_rows($query2) ==0)
  {
	echo"Invalid username or password!";
	  echo '<script>
		$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "index.html";
    }, 1000)
	});
		</script>';
  }
    else
    {
        echo"LOGGED IN";
		$query3 = mysql_query("SELECT * FROM members WHERE username = '$_POST[username]' and  password = '$password' ") or die(mysql_error());
		$found_user = mysql_fetch_array($query3);
		$_SESSION['lparameter']=$found_user['lparameter'];
		$_SESSION['name']=$found_user['name'];
		$_SESSION['id']=$found_user['id'];
		$_SESSION['pic']=$found_user['profile'];
		$_SESSION['email']=$found_user['email'];
		$_SESSION['phoneno']=$found_user['phoneno'];
		$_SESSION['username']=$found_user['username'];
		$_SESSION['color']=$found_user['color'];
		
		//echo $_SESSION['name'];
		echo '<script>
		$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "texteditor_test.php	";
    }, 1000)
	});
		</script>';
		
    }
	//echo "SIGN UP ENDED";
}
else
{
	header( 'Location: index.html' ) ;
}
}
//echo "Welcome ". $_POST["name"]." your username is: ".$_POST["username"]." and email is: ".$_POST["email"]."<br />";
Login();
?>


</div> 
   
<div id="footer" style="display:none;">
<a href="about1.html">About</a> &nbsp;&nbsp;&nbsp;
<a href="whyjournal.html">Why eJournal</a>&nbsp;&nbsp;&nbsp;
<a href="queries.html">Queries</a>&nbsp;&nbsp;&nbsp;
<a href="privacy and terms.html">Privacy & Terms</a>&nbsp;&nbsp;&nbsp;

</div>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>
