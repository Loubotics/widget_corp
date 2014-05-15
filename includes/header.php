<!DOCTYPE html> 
<?php require_once('includes/functions.php'); ?>

<html>
<head>
	<title>Widget Corp</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/custom.css">
	<script type="text/javascript" src="javascripts/jquery.js"></script>
	<script type="text/javascript" src="javascripts/bootstrap.js"></script>
	<script type="text/javascript" src="javascripts/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".dropdown-menu li a").click(function(){
				$(this).parents(".input-group-btn").find('.btn').text($(this).text());
			  var select = $(this).parents(".input-group-btn").find('.btn').val($(this).text());

			  //alert($('.input-group-btn').find('.btn').val());
			});
			$('#edit_submit').click(function(e){
				var value = $('.btn-group').find('.active').children('.visibility').val();
				$('#subject_form').append("<input type='hidden' name='visible' value=" + value +"/>");
				alert($('.dropdown-menu').text());
				// alert($('.edit_dropdown').text());
			})

		})
	</script>
</head>
<body>
	
		<div class="container staff_header" >
			<div class="container-fluid">
				<div class="page-header"><h1>Widget Corp</h1></div>
			</div> <!-- end of container-fluid -->
		</div> <!-- end of staff header -->
		