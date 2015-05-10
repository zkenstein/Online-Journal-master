<?php session_start();
?>
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
<html>
<?php
//echo"PHP works fine";


if(!isset($_SESSION['lparameter']))
{
	//re-direct function when lparameter is in the set.
   header( 'Location: index.html' ) ;
}
?>
<?php
	$id=$_SESSION["id"];
	$date=$_POST["cal"];
	$data=$_POST["editor1"];
	$title=$_POST["title1"];
	$query = "INSERT INTO user_data (id,date,title,data) VALUES ('$id','$date','$title','$data')";
    $data = mysql_query ($query)or die(mysql_error());
    header( 'Location: texteditor_test.php' ) ;
?>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>