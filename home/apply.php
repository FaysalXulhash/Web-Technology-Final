<?php 
	session_start();
	$d="";
	$msg=" ";
	$email = $_SESSION['email'];
	if(isset($_SESSION['email'])){		
	include 'variables.php';

	$conn = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
	$sql = "SELECT id,coursename FROM courses";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$users = $stmt->get_result();

	$stmt->close();
	
	//id
	// $mysqli = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
	//
	$query = "SELECT id FROM student_data WHERE email = '{$_SESSION['email']}'"; 
	$result = $conn->query($query);
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			foreach($row as $val) {
				$details[] = $val;
			}
		}
	} else {
		echo "Error no row found";
	}
	

	if(isset($_POST['applyCourse'])){
		echo "Apply course set";
	
		$eQuery = "SELECT ID FROM education_information WHERE ID = $details[0]";			
		$eResult = $conn->query($eQuery);
		
		if(!$eResult->num_rows > 0) {
			header("Location: ../home/educational_details.php");			
			}
			   
		else{
		 $selectedCourse = $_POST['selectedCourse'];
		 $id = $details[0];		
		 $connection = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
		 $query = $connection->prepare("SELECT id,coursename from selected_courses where id=? AND coursename=?");
		 $query->bind_param("is", $id, $selectedCourse);
		 $query->execute();
		 $num_rows = $query->get_result()->num_rows;
		 $query->close();


		if($num_rows > 0 )
		{
			$msg = "<p style='text-align:center; color:red;'>Already applied to this unit</p>";
		} else{
			try {
				$insertQuery = "INSERT INTO selected_courses values(NULL,?,?,1)";
				
				$stmt= $connection->prepare($insertQuery);
				$stmt->bind_param("is", $id, $selectedCourse);
				$update = $stmt->execute();
				
				$stmt->close();
			} catch (Exception $ex) {echo $ex->getMessage();}
			
			if ($update){
				$msg = "<p style='text-align:center; color:green;'>Application Successful </p>";
			} else {
				$msg = "<p style='text-align:center; color:red;'>An Error Occured Contact SysAdmin</p>";
			}
			
		}
	}
}
?>

<html lang="en">
<?php include 'home-menu.php';?>
<?php include 'user-side-menu.php'; ?>
<link rel="stylesheet" href="css/apply.css" type="text/css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<script src="js/apply.js"></script>
<div class="container">
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-heading main-color-bg">
				<h3 class="panel-title"> <b>Apply</b> </h3>
			</div>
			<div class="panel-body">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-10">
							<form action="apply.php" method="post">
								<div class="col-sm-12 form-group">
									<label>Select Unit</label>
									<select class="form-control" name="selectedCourse">
										<?php foreach($users as $user): ?>
										<option value="<?= $user['coursename']; ?>"><?= $user['coursename'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<input class="btn btn-info" type="submit" name="applyCourse" value="Submit">
							</form>
							<p>
								<?php echo $msg;?>
							</p>
						</div>
						<div class="col-sm-12 form-group">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
	}
		else
		{
		?>
<?php
			echo "<script language='javascript'>alert('You are not logged in');
			window.location.href='/Admission/';
			 </script>";
		}
		?>

</html>