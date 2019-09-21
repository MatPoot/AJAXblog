<?php
// INSERT.PHP

// let's protect this file with our login script !

require_once('../login/classes/Login.php'); // must path to the Login class
$login = new Login();
if ($login->isUserLoggedIn() == true) {

    $user_name = $_SESSION['user_name'] ;
    $user_id = $_SESSION['user_id'];

} else {
   header ("Location: ../login/index.php");
}

// end login script


include("adminheader.php");
echo "You are logged in $user_name" . " | <a href=\"../login/index.php?logout\">Logout</a>";

echo "<h2>New Blog Entry</h2>";

$blogTitle = trim($_POST['title']);
$blogEntry = trim($_POST['entry']);
// echo $blogTitle . " | ". $blogEntry;

if(isset($_POST['submit']) && ($blogTitle != "") && ($blogEntry != "")){
	
	$result = mysqli_query($con,"INSERT INTO mubdata (title, message, author_id) VALUES ('$blogTitle ', '$blogEntry', '$user_id')");
		if (!$result) {    
			die('Invalid query: ' . mysql_error());
		}else{
	  		echo "<h2>Blog Entry Added to DB\n</h2>". $varMessage;
			
	  }
}


?>

<!-- entry form -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="myform" id="editform">
	<p><label for="title">Title: </label>
	<input type="text" name="title" id="title" /></p>
	<p><label for="entry">Entry: </label>
	<textarea name="entry" id="entry"></textarea></p>
	<p>
	<input type="submit" name="submit" id="submit" /></p>
	
</form>
<br style="clear:both" />
<?php
include("adminfooter.php");
?>
