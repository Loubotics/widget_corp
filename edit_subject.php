
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php 
	echo $_POST['visible'];
	if(intval($_GET['subj']) == 0 ){
		redirect_to('content.php');
	}
	if (isset($_POST['submit'])) { 
		$errors = validate_form($_POST);
		if (empty($errors)) {
			//perform update
			$id = mysql_prep($_GET['subj']);
			$menu_name = mysql_prep($_POST['menu_name']);
			//echo $_POST['menu_name'];
			//echo $_POST['subj'];
			echo $_POST['position'];
			//echo $_POST['visible'];
			$position = mysql_prep($_POST['position']);
			$visible = mysql_prep($_POST['visible']);

			$query = "UPDATE subjects SET
								menu_name = {$menu_name}
								position = {$position}
								visible = {$visible}
							WHERE id = {$id}";

							//echo $query;
			$result = mysql_query($query, $connection);
			if (mysql_affected_rows() == 1) {
				echo 'wahey';
			}else{
				//failed
			}
		}else{
			echo 'nope';
		}
		

	} //end of isset($_POST)	
 ?>

<?php include('includes/header.php'); ?>
<?php find_selected_page();	?>
<div class="container staff-container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php navigation($sel_subject, $sel_page);
						echo '</div>'; //end of outer list-group
					 ?>

				</div>
				<div class="col-md-9 staff-right">
					<form action="edit_subject.php?subj=<?php echo urlencode($sel_subject['id']); ?>" id="subject_form" method="post">
						<fieldset>
						<legend>Edit Subject: <?php echo $sel_subject['menu_name']; ?></legend>
						<div class="input-group subject-input">
							<input type="text" class="form-control" name='menu_name' id="menu_name" value="<?php echo $sel_subject['menu_name']; ?>" placeholder="">
						</div>
						<div class="input-group-btn">
								
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $sel_subject['position'] ?><span class="caret"></span></button>
								<ul class="dropdown-menu">
									<?php 
										$subject_set = get_all_subjects();
										$subject_count = mysql_num_rows($subject_set);
										for ($count=1; $count <= $subject_count+1; $count++) { 
											echo "<li><a href='#' class='edit_dropdown' name = 'position' value='{$count}'>". $count . "</a></li>";
											
										}
									?>
								</ul>
							</div>
							<div class="btn-group visibility-buttons" data-toggle="buttons">									
								<label class="btn btn-default <?php if($sel_subject['visible'] == 1){ echo 'active'; } ?>">
									<input type='radio' name='visible' class='visibility' id='visible'value='1'>Visible
								</label>
								<label class="btn btn-default <?php if($sel_subject['visible'] == 0){ echo 'active'; }?>">
									<input type='radio' name='visible' class='visibility' id='visible'value='0'>Invisible
								</label>
									
							</div> <!-- end of btn-group --><br>
							<button type="submit" id="edit_submit" name="submit" value="Edit Subject" class="btn btn-default">Edit subject</button>
							</fieldset>
					</form>
					
					

<?php include('includes/footer.php'); ?>