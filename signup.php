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
if(empty($_POST['username']) or empty($_POST['name']) or empty($_POST['password']) or empty($_POST['email']))
{
	header( 'Location: index.html' ) ;
}

function NewUser()
{
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]); //encrypted biatch!!
    $confirm =  $_POST["confirm"];
    $email =  $_POST["email"];
    $phoneno =  $_POST["phoneno"];
	
	
	//echo "Welcome ". $_POST["name"]." your username is: ".$_POST["username"]." and password is: ".$_POST["password"]."<br />";
    $query = "INSERT INTO members (name,username,password,email,phoneno) VALUES ('$name','$username','$password','$email','$phoneno')";
    $data = mysql_query ($query)or die(mysql_error());
    if($data)
    {
    echo "YOUR REGISTRATION IS COMPLETED...";
	echo '<script>
		$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "index.html";
    }, 2000)
	});
		</script>';
    }
}
function SignUp()
{
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query1 = mysql_query("SELECT * FROM members WHERE username = '$_POST[username]'  ") or die(mysql_error());
    $query2 = mysql_query("SELECT * FROM members WHERE email = '$_POST[email]' ") or die(mysql_error());


	//echo "<br>"."THE SIGNUP IS WORKING";
   if (mysql_num_rows($query1) >0 or mysql_num_rows($query2) >0)
  {
      echo "Username or Email already registered";
	  echo '<script>
		$(document).ready(function () {
    window.setTimeout(function () {
        location.href = "index.html";
    }, 2000)
	});
		</script>';
  }
    else
    {
        NewUser();
    }
	//echo "SIGN UP ENDED";
}
else
{
	//echo "THE SIGNUP NOT WORKING";
}
}
//echo "Welcome ". $_POST["name"]." your username is: ".$_POST["username"]." and email is: ".$_POST["email"]."<br />";
SignUp();
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
