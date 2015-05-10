<html>
   <script src="js/jquery.js"></script>
   <script src="ckeditor/ckeditor.js"></script>   
  <head>
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
<?php
echo '
<form method="post" action="test.php">  
<div id="text">

		<p>
			<textarea class="ckeditor" name="editor1" cols="100" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://ckeditor.com/"&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
		</p>
		
</div>
<input type="submit" value="Submit"> 
</form>
';
?>
</body>