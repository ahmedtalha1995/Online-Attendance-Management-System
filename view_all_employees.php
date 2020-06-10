<?php
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
				<table class="table table-hovered table-striped">
					<!--Table Header--->
					<tr class="thead-light">
						<th>Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<th>Attendance_status</th>
						<th>Date</th>
					</tr>
					<!--Table Body--->
					<?php
						//Getting Id Which is Coming from View Attendance
						$view_date = $_GET['view_date'];
						//Now Running The Query TO Get Given Attendance Students
						$select = "SELECT * FROM `attendance` where `attendance_date` ='$view_date'";
						//Connecting db and query
						$query = mysqli_query($connection_status,$select);
						//Running The Query
						if($query){
							while($row=mysqli_fetch_array($query)){
								$name = $row['attendance_name'];
								$father_name = $row['attendance_father_name'];
								$email = $row['attendance_email'];
								$attend_status = $row['attendance_status'];
								$attend_date = $row['attendance_date'];
							?>
							
								<tr>
									<td><?php echo $name?></td>
									<td><?php echo $father_name?></td>
									<td><?php echo $email?></td>
									<td><?php echo $attend_status?></td>
									<td><?php echo $attend_date?></td>
								</tr>
							
							<?php
							}
							
						}else if(!$query){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong>Alert!</strong> Attendance Can't View| Retry !
								</div>";
						}
						?>
					
					
					
				</table>
			
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
