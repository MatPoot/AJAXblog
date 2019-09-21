<?php
// INSERT.PHP

require_once('../login/classes/Login.php'); // must path to the Login class

$login = new Login();
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    $user_name = $_SESSION['user_name'] ;
    $commentor_id = $_SESSION['user_id'];
	

} else {
    // user MUST be logged in
   header("Location:../login/index.php");

}



$post_id = $_POST['post_id'];

$comment= trim($_POST['comment']);

/* Remember: THis query will not happen unless we get through this if statement. No values...no query. */
if(($post_id != "") && ($comment != "")){
	
    include("../includes/mysql_connect.php");
	$result = mysqli_query($con,"INSERT INTO mubcomments (comment, post_id, commentor_id) VALUES ('$comment ', '$post_id', '$commentor_id')") or die(mysqli_error($con));
		
}


?>


