<?php
include("mysql_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Blog</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="includes/style.css">

<!--  jQuery goes here -->
 <script type="text/javascript">

 	$(".commentText").hide();

 	//toggle text boxes
 	$(document).ready(function(){
 		//console.log("ready to rock");

 		$(".commentText").hide();


 		$(".commentLink").click(function(){
 			 // console.log("clicked");
 			var commentText ="#" + $(this).attr('data-x');
 			 console.log(commentText);

 			$(commentText).toggle();

 			event.preventDefault();

 		});

 		//grab the text box form submission

 		$(".commentForm").submit(function(event){
 			//console.log("submitted");

 			var thisOne = $(this).children("input").attr("id");
 			var textVal = $("#" + thisOne).val();

 			//console.log(textval);
 			var post_id = $(this).attr('data-x');
 			 //console.log(post_id);

 			//AJAX 
 			$.ajax({
 				type:"POST",
 				url: "admin/comment.php",
 				data: {
 					'comment':textVal,
 					'post_id' :post_id

 				},

 				success: function(response){
 					 //console.log(response);
 					location.reload();
 				}

 			});


 			event.preventDefault();
 		});



 	});///////////////
 </script>


 
</head>
<body>
<div id="container">
<div id="banner"> 
 Blog
</div>

<div id="content">
<a href="index.php">All Posts</a>
