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

<?php
//echo"PHP works fine";


if(!isset($_SESSION['lparameter']))
{
	
	//re-direct function when lparameter is in the set.
   header( 'Location: index.html' ) ;


}

?>
	
   
<html>
<meta charset="utf-8">
<meta charset="utf-8">
<link rel="stylesheet" href="pickadate/demo/styles/<?php 
$color=$_SESSION["color"];
if($color==1)
{
	echo "main";
}
else if($color==2)
{
	echo "main2";
}
else
{
	echo "main3";
}
?>.css">
<link rel="stylesheet" href="pickadate/lib/themes/default.css" id="theme_base">
<link rel="stylesheet" href="pickadate/lib/themes/default.date.css" id="theme_date">
<link rel="stylesheet" href="css/style_placeholder.css">
<script src="js/jquery.js"></script>
<script src="ckeditor/ckeditor.js"></script>   
<script src="pickadate/lib/picker.js"></script>
<script src="pickadate/lib/picker.date.js"></script>
<script src="pickadate/demo/scripts/main.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<head>
<title>eJournal</title>
<script type="text/javascript" src="js/jquery.js"></script>
<style type="text/css">
@import url(css/<?php 
if($color==1)
{
	echo "style";
}
else if($color==2)
{
	echo "style2";
}
else
{
	echo "style3";
}
?>
.css);
@import url(css/player_style.css);
</style>

<script>
	$(document).ready(function(){	$("#header").fadeIn();
									$("#footer").fadeIn(300);
									$("#footer").fadeIn(500);
								});
								
</script>
<script>
function myFunction()
{
alert("Data Updated Sucessfully");
}
</script> 
<script>
$( document ).ready( function() {
	$( '#editor1' ).ckeditor();
} );
</script>

<script>
$( document ).ready( function() {
	$( 'textarea#editor1' ).ckeditor();
} );

		
	</script>
</head>
<body>

<div id="header" style="display:none;">
	<img src="img/<?php 
		if($color==1)
		{
			echo "logo1.png";
		}
		else if($color==2)
		{
			echo "logo2.png";
		}
		else
		{
			echo "logo3.png";
		}
		?>"/>
  <br />
  
</div>
 
<hr id="header_stripe_1"/>

<div id="welcome">
<?php 
if(isset($_SESSION['lparameter'])){echo "Welcome, <b><u>".$_SESSION['name']."</u></b>";}
?>
<?php
	$id = $_GET["artid"];
	$query1 = mysql_query("SELECT * FROM user_data WHERE article_id = '$id'") or die(mysql_error());
	$found_user = mysql_fetch_array($query1);
	$date=$found_user['date'];
	$data=$found_user['data'];
	$title=$found_user['title'];
?>
</div>
<div id="pic">
<a href="pic.php">
<?php
$pic=$_SESSION['pic'];
$path="profile//".$pic;
echo  "<img src=\"$path\" width='162px' height='153px' />";
?>
</a>
</div>
<form  action= "update_data.php?a_id=<?php echo $id; ?>" method="post">
<div class="body--fixed-head">

        <div id="root-outlet" style="position:relative"></div>
        <fieldset class="place_holder"><input id="az" name="cal" type="text" placeholder="<?php echo $date; ?>"><fieldset>	


    <script src="js/jquery.js"></script>
    <script src="pickadate/lib/picker.js"></script>
    <script src="pickadate/lib/picker.date.js"></script>
    <script src="pickadate/demo/scripts/main.js"></script>


</div>

<div id="title">
<input type = "text" value ="<?php echo $title; ?>" name="title2edit">
</div>
<a href="previous_entries.php">
<div id = "browse">
<b>Browse</b><br> previous entries
</div></a>
<div id="text2">

		<p>
			<textarea class="ckeditor" name="editor2edit" cols="100" rows="10"><?php echo $data; ?></textarea>
		</p>
		
</div>
<div id="dataupdate"> <input type="submit" name="textarea" value="Update" onclick="myFunction()">

 </div>
</form>
<div id="logout_button">
<input type="submit" value="Logout" onclick="window.location='logout.php'" />
</div>
<hr id="header_stripe_bottom" />
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