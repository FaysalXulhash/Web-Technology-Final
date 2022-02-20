<html>
<?php include_once 'dbConfig.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" type="text/css" href="css/regForm.css">

<body>
	<div class="container">
		<h1 class="well" style="text-align: center;">Registration Form</h1>
		<?php echo $msg;?>
		<div class="col-lg-12 well">
			<div class="row">
				<form action="register.php" enctype="multipart/form-data" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Fullname</label>
								<input type="text" name="fullname" placeholder="Enter Full Name Here.." class="form-control" required>
							</div>

							<div class="col-sm-6 form-group">
								<label>Image</label>
								<input type="file" name="profile_image" accept="image/*" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Gender </label>
								<select id="gender" name="gender" placeholder="Select Gender" class="form-control" required>
									<option value="Male"> Male </option>
									<option value="Female"> Female </option>

								</select>
							</div>

						<div class="form-group"><br></br></br></br>
							<label>Phone Number</label>
							<input type="text" name="pnumber" placeholder="Enter Phone Number Here.." class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" name="email" placeholder="Enter Email Address Here.." class="form-control" required>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password.." class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Confirm Password</label>
								<input type="password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  name="password2" placeholder="Confirm Password.." class="form-control" required>
							</div>
						</div>
						<input class="btn btn-lg btn-info" type="submit" name="addRegister" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
