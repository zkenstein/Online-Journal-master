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
if (!empty($_FILES["file"]))
  {
  $upload_dir="profile\\";
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  $name=$_FILES["file"]["tmp_name"];
  $filename=$_FILES["file"]["name"];
  $new_name=substr(md5($_SESSION["id"]),10);
  $new_name=$new_name;
  $path=$upload_dir.$new_name;
  echo $path;
  $result=move_uploaded_file($name,$path);
  if($result)
  {
	echo "File uploaded sucessfully";
	}
	
  }
else
  {
	echo "redirected..";
  }
$id = $_SESSION["id"];
if(!empty($id))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query1 = mysql_query("UPDATE members SET profile = '$new_name' WHERE id = '$id' ") or die(mysql_error());
	if($query1)
	{	echo "Database updated..";
		$_SESSION['pic']=$new_name;
		header( 'Location: texteditor_test.php' ) ;
	}	
}
?>
<?php
	// 5. Close connection
	mysql_close($connection);
?>