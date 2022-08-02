<?php
	// variables definition
	$firstname="";
	$lastname="";
	$email="";
	$password="";
	$number="";
	$error="";
	$firsterror="";
	$lasterror="";
	$emailerror="";
	$passworderror="";

if($_SERVER['REQUEST_METHOD']=="POST"){
			function input_fields($field){
				$field = trim($field);
				$field= stripcslashes($field);
				$field= htmlspecialchars($field);
				return $field;
			}
					$firstname = 	input_fields($_POST['firstname']);
					$email = 		input_fields($_POST['email']);
					$password = 	input_fields($_POST['password']);
					$password1=   md5($password);
					$number = 		input_fields($_POST['number']);
					$lastname = 	input_fields($_POST['lastname']);

	

if (isset($firstname) && $firstname!="" && isset($lastname) && $lastname!= "" && isset($email) && $email!= "" && isset($password1) && $password1!= "") {

	if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
		// code...
		$firsterror="only letters and white space allow";
	}
	if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
		// code...
		$lasterror="only letters and white space allow";
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// code...
		$emailerror="Invalid";
	}

	if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*@$#", $password) && strlen( $password >= 8 )) {
		// code...
		$passworderror="must be 8 characters, containing uppercase letter and numbers";
	}

}

else {
	$error = "Must fill * fields";
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Form Submission</title>

  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
			<h3 id="heading">Form Submission</h3>

			
			<input type="text" name="firstname" placeholder="Enter first name *" id="fname"><br>
			<div id="sp">
			<?php if ($firsterror) {
				// code...
				echo "<span>".$firsterror."</span>";
			}?>
		</div>
			<br>
			<input type="text" name="lastname" placeholder="Enter last name *" id="lname"><br>
			<div id="sp">
			<?php if ($lasterror) {
				// code...
				echo "<span>.$lasterror.</span>";
			}?>
			</div>
			<br>

			<input type="text" name="email" placeholder="Enter email address *" id="email"><br>
			<div id="sp">
			<?php if ($emailerror) {
				// code...
				echo "<span>.$emailerror.</span>";
			}?>
		</div>
			<br>

			<input type="text" name="password" placeholder="Enter password *" id="pass"><br>
			<div id="sp">
			<?php if ($passworderror) {
				// code...
				echo "<span>.$passworderror.</span>";
			}?>
		</div><br>

			<input type="text" name="number" placeholder="Enter contact number" id="num"><br><br><br>

			<input type="submit" name="Submit" id="sub"><br>
		


<div id="span1">
			 <?php
			 if ($error) {
			 	// code...
			 	echo "<span>".$error."</span>";
			 }
			 ?>
			</div>

		</form>
		
	</div>
</body>
</html>