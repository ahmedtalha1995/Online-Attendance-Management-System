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
				
				<!---Starting of Top Body--->
				<div class="top">
					
					<a href="index.php" class="btn btn-dark float-right btn-def text-white">Back</a>
					<hr/>
					<p class="text-dark add-p"><i class="fa fa-user-plus"></i>	Add Employee</p>
					<hr/>
				</div>
				
				<!---------Starting of Add Employee Form---------->
				<?php
					
					require('inc/add_employee_form.php');
					
				?>
				<!--------End of Add Employee Form------------->
				
				<?php
					//Add_Employee_From Action
					require('inc/add_employee_form_action.php');
				?>
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