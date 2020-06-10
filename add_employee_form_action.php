<?php
	//Adding Employees Form
					if(isset($_POST['add_emp'])){
						//Getting Values From TextBoxes
						$name = $_POST['name'];
						$father_name = $_POST['father-name'];
						$email = $_POST['email'];
						
						//Now Runing The Query
						$insert = "INSERT INTO `employees` (`emp_name`,`emp_father_name`,`emp_email`) VALUES ('$name','$father_name','$email')";
						//Now Passing The Query And Connecting Database
						$query = mysqli_query($connection_status,$insert);
						//Now Running The Query
						if($query){
							echo " <div class='alert alert-success alert-dismissible fade show'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong>Success!</strong> Employee Added Successfully !
							  </div>";
						}else if(!$query){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong>Alert!</strong> Employee Can't Added | Retry.
							  </div>";
						}
					}
				

?>