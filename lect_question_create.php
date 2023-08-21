<?php 
	session_start();
	include 'dbcon.php'; 
	include 'lect_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<strong>Upload file</strong>
				<form method="post" enctype="multipart/form-data">
					<?php
						// If submit button is clicked
						
						if (isset($_POST['submit']) && isset($_SESSION['username']))
						{
							$username = mysqli_real_escape_string($con, $_SESSION['username']);
							// get name from the form when submitted
							$name = $_POST['name'];	
							echo $username;				
							echo $name;
							if (isset($_FILES['pdf_file']['name']))
							{
							// If the ‘pdf_file’ field has an attachment
								$file_name = $_FILES['pdf_file']['name'];
								$file_tmp = $_FILES['pdf_file']['tmp_name'];
								echo $file_name;
								// Move the uploaded pdf file into the pdf folder
								move_uploaded_file($file_tmp,"./uploads/".$file_name);
								// Insert the submitted data from the form into the table
								
								$insertquery = "INSERT INTO question(name,file,username) VALUES('$name','$file_name','$username')";
								
								// Execute insert query
								$iquery = mysqli_query($con, $insertquery);	
								// $error = mysqli_error($con);
   								// print("Error Occurred: ".$error);
								if($iquery){
									echo "taoj file thanh cong";
									header('Location: lect_question_main.php');
								}
								else{
									echo "connect failed";
								}
					
							} else {
							?>
								<div class= "alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">× </a>
									<strong>Failed!</strong> File must be uploaded in format!
								</div>
								<?php
							}// end if
						}// end if
					?>
					
					<div class="form-input py-2">
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="exercise name" name="name">
						</div>								
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" required/>
						</div>
						<div class="form-group">
							<input type="submit" class="btnRegister" name="submit" value="Submit">
							
						</div>
					</div>
				</form>
			</div>		
	</div>
</body>
</html>
