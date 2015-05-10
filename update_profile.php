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
<?php
//echo"PHP works fine";


if(!isset($_SESSION['lparameter']))
{
	
	//re-direct function when lparameter is in the set.
   header( 'Location: index.html' ) ;


}

?>
<?php
$name=$_POST["name"];
$email=$_POST["email"];
$phoneno=$_POST["phoneno"];
$username=$_POST["username"];
$id=$_SESSION["id"];
$query1 = mysql_query("UPDATE members SET name='$name', email='$email', phoneno='$phoneno', username = '$username' WHERE id = '$id' ") or die(mysql_error());
if($query1)
{
	$_SESSION["name"]=$name;
	$_SESSION["email"]=$email;
	$_SESSION["phoneno"]=$phoneno;
	$_SESSION["username"]=$username;
	
	header("Location: texteditor_test.php");
}
?>
<?php
	// 5. Close connection
	mysql_close($connection);
?>