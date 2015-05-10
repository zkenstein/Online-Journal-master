<!--edit profile -->
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
<head>
<title>eJournal</title>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
<script type="text/javascript" src="engine1/jquery.js"></script>
<style type="text/css">
@import url(css/<?php 
$color=$_SESSION["color"];
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
</style>
<script src="jquery.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){	$("#header").fadeIn();
									$("#wrapper").fadeIn("slow");
									$("#content").fadeIn(700);
									$("#footer").fadeIn(300);
									$("#header_stripe_bottom").fadeIn(500);
									$("#header_stripe").fadeIn(500);
								});
								
</script>
<script>
		$(document).ready(function() {
    $("div.panel_button").click(

        function(){ $("div#panel").animate({ height: "360px" }) .animate({
        height: "350px" }, "fast"); $("div.panel_button").toggle();
            }); $("div#hide_button").click(function(){
        $("div#panel").animate({
            height: "0px"
 
        }, "slow"); 
      });       
});

</script>
<script>
		$(document).ready(function() {
    $("div#sign_up").click(

        function(){ $("div#panel").animate({ height: "420px" }) .animate({
        height: "400px" }, "fast"); 
            }); $("div#hide_button").click(function(){  $("div#panel").animate({  height: "0px"}, "slow"); 
      });       
});</script>
<script>
$(document).ready(function(){
  $("#sign_up").click(function(){
    $(".border").animate({
      height:'250px',
    });
	
  });
});
</script>
<script>
$(document).ready(function(){ $("#sign_up").click(function(){$("#OK").show(),$("#form1").hide(),$("#sign_up").hide(),$("#stay").hide(),$("#remember").hide(),$("#form2").show()}); });
</script>

<script>
$(document).ready(function(){  $("input").focus(function(){    $(this).css("background-color","#cccccc");  }); 
							   $("input").blur (function(){    $(this).css("background-color","#ffffff");  });
							});
</script>
<SCRIPT>
		function validate(form) {
		var e = form.elements;

		/* Your validation code. */

		if(e['password'].value != e['confirm'].value) {	alert('Your passwords do not match. Please type more carefully.'); return false;} return true;}
		
		

</SCRIPT>

</head>
<body>
<div id="header" style="display:none;">
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/lg1__copy.jpg" alt="" title="" id="wows1_0"/></li>
<li><img src="data1/images/lg1.jpg" alt="" title="" id="wows1_1"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title=""><img src="data1/tooltips/lg1__copy.jpg" alt=""/>1</a>
<a href="#" title=""><img src="data1/tooltips/lg1.jpg" alt=""/>2</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">Website Slideshow Maker</a> by WOWSlider.com v4.7</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	<!--Session close-->


</div>
<div id="logout_button">
<input type="submit" value="Logout" onclick="window.location='logout.php'" />
<input value="Back" onclick="window.location='texteditor_test.php'" />
</div>
			<?php
				$name = $_SESSION['name'];
				$username = $_SESSION['username'];
				$email = $_SESSION['email'];
				$phoneno = $_SESSION['phoneno'];
			?>
<div id="profile_div" >		
<form action = "update_profile.php" method="post" >
<p>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" size="15"  value=<?php echo "\"$name\""; ?> name="name" />
<br />
<p>Username:&nbsp;
<input type="text" size="15"  value=<?php echo "\"$username\""; ?> name="username" /> 
<br />
<p>Email:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" size="15"  value=<?php echo "\"$email\""; ?> name="email" />
<p>Phone No:&nbsp;
<input type="text" size="15"  value=<?php echo "\"$phoneno\""; ?> name="phoneno" />
<br />
<input id ="profile_ok" type="submit" value="OK" alt="Submit">
</form>
</div>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>
