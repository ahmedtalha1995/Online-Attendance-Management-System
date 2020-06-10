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
						<th>Sr.No</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
					<!--Table Body--->
					<?php
						//Select The Data From The Table to View Attendance Dates
						$select = "Select DISTINCT `attendance_date` from attendance";
						//Connecting db and query to Run 
						$query = mysqli_query($connection_status,$select);
						//Running The Query
						if($query){
							//If The Query Is Runned Then The Retrive The Data To Show
							//Running The While loop to Get Arrays
							$a=1;
							while($row = mysqli_fetch_array($query)){
								
								$view_date = $row['attendance_date'];
								
							?>
									
								<tr>
									<td><?php echo $a++;?></td>
									<td><?php echo $view_date;?></td>
									<td><a href="view_all_employees.php?view_date=<?php echo $view_date;?>" class="btn btn-dark text-white">View</a></td>
									
								</tr>
								


							<?php
								
							}
						}else if(!$query){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong>Alert!</strong> Attendance Can't Show | Refresh !
									</div>";
						}
					
					
					?>
				
					
					
				</table>
				<hr/>
				<a href="index.php" class="btn btn-dark float-right text-white">Take Attendance <i class="fa fa-plus"></i></a>
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