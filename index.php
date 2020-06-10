<?php
	session_start();
	//Connecting The Database
	require('db/db.php');

?>
<!---------Starting of Top----------->
<?php

	require('inc/top.php');

?>
<!--------Ending of Top----------->
	<!-------Starting Of Main--------->
	<div class="container">
		<!---Starting of Card--->
		<div class="card">	
			<!---Card Header--->	
			<?php
				require('inc/card-header.php');
			?>
			<!---Card Body--->
			<div class="card-body">
				<!---Starting Date--->
				<?php
					require('inc/date.php');
				?>
				<!---Starting of Top Body--->
				<div class="top">
					<a href="view_attendance.php" class="btn btn-dark text-white">View	<i class="fa fa-eye"></i></a>
					<a href="add_employee.php" class="btn btn-dark float-right text-white" >Add Employee <i class="fa fa-plus-circle"></i></a>
				</div>
				<hr/>
				<!---Ending of Top Body--->
				<table class="table table-hover table-striped">
				
					<!--Table Header--->
					<tr class="thead-dark">
						<th>Sr.No</th>
						<th>Full Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<th>Attendance</th>
					</tr>
					<!--Table Body--->
					<?php
						//Showing All Employees to Take Attendance
						$select = "SELECT * FROM `employees`";
						//Connecting DB and Query
						$query = mysqli_query($connection_status,$select);
						//Checking Query If Run
						if($query){
							//Now Getting The Row How many selected from table
							
							$a=1;
							while($row = mysqli_fetch_array($query)){
								//Getting Value From employees Tables Row by Row
								$emp_id = $row['emp_id'];
								$name = $row['emp_name'];
								$father_name = $row['emp_father_name'];
								$email = $row['emp_email'];
							?>
							<!------View in Table Row--------->
							<tr>
								<td><?php echo $a++;?></td>
								<td><?php echo $name;?></td>
								<td><?php echo $father_name;?></td>
								<td><?php echo $email;?></td>
								<td>
									<form action="" method="POST">
										Present	<input required="required"  value="PRESENT" type="radio" name="<?php echo $emp_id;?>">
										Absent	<input  type="radio"  value="ABSENT" name="<?php echo $emp_id;?>">
								</td>
							</tr>	
							<!--------End of View in Table Row------>
							
							
							
							<?php
								if(isset($_SESSION['done'])){
									echo 
									" <div class='alert alert-success alert-dismissible fade show'>
												<button type='button' class='close' data-dismiss='alert'>&times;</button>
												<strong>Success!</strong>".$_SESSION['done']."
											  </div>";
									unset($_SESSION['done']);	
								}
							
								//Taking Attendance Dynamic
								if(isset($_POST['btn-take'])){
									//Getting Radio Button Input
									if(isset($_POST[$emp_id])){
										//Print All The Present or Absent
										// echo $_POST[$emp_id];
										//S Values In Variable To Pass
										$attend =  $_POST[$emp_id];
										//Current Date
										$date = date('d-m-y');
										//Inserting The Query
										$insert  = "INSERT INTO `attendance` (`attendance_name`,`attendance_father_name`,`attendance_email`,`attendance_status`,`attendance_date`) VALUES ('$name','$father_name','$email','$attend','$date')";
										$run = mysqli_query($connection_status,$insert);
										
										if($run){
											$_SESSION['done'] = "Attendance take succesfully";
										
										}
										else if(!$run){
											echo "<div class='alert alert-danger alert-dismissible fade show'>
												<button type='button' class='close' data-dismiss='alert'>&times;</button>
												<strong>Alert!</strong> Attendance Can't Take | Retry !
											  </div>";
										}
									
									}
					
									
								}
							?>
								
							<?php
							
								
							}
						}
					?>
				
				
				
					</table>
				<hr/>
				<button type="submit"  name="btn-take" class="btn btn-dark float-right ">Take Attendance <i class="fa fa-check-circle"></i></button>
				</form>			
			
				
			</div>
			<!---Card Footer---
			<div class="card-footer bg-dark">
			
			</div>
			--->
		</div>
		<!---Ending of Card--->
	</div>
	<!-------Ending of Main--------->
<!-------Starting of Footer of --------->
<?php
	
	require('inc/footer.php');
	
?>	
<!-------Ending of Footer--------->