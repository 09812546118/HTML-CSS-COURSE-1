<?php	
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$idno = $_POST['idno'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$password = $_POST['password'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		
		if(!empty($email) && !empty($password) && !is_numeric($email)) {
			$query = "INSERT INTO users (idno, firstName, middleName, lastName, password, age, gender, contact, email, address) VALUES ('$idno','$firstName','$middleName','$lastName','$password','$age','$gender','$contact','$email','$address')";
			
			// Insert data into users table
			if(mysqli_query($con, $query)) {
				// Insert data into users_sitin table
				$insertSitInQuery = "INSERT INTO users_sitin (idno, firstName, middleName, lastName, password, age, gender, contact, email, address) VALUES ('$idno','$firstName','$middleName','$lastName','$password','$age','$gender','$contact','$email','$address')";
				if(mysqli_query($con, $insertSitInQuery)) {
					echo "<script type='text/javascript'> alert('Registration successful!'); window.location='login.php'; </script>";
					exit;
				} else {
					echo "<script type='text/javascript'> alert('Error in registration!'); window.location='register.php'; </script>";
					exit;
				}
			} else {
				echo "<script type='text/javascript'> alert('Error in registration!'); window.location='register.php'; </script>";
				exit;
			}
		} else {
			echo "<script type='text/javascript'> alert('Invalid information!'); window.location='register.php'; </script>";
			exit;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register HTML</title>
</head>
<body>
    <section class="main-wrapper">
        <div class="branding">
            <h1 class="logo"></h1>
            <h2 class="slogan"></h2>
        </div>
        <div>
            <div class="register">
                <form>
                    <input type="number" class="ID number" placeholder="ID number" name="idno" required>
                    <input type="text" name="FirstName" placeholder="First Name" required>
                    <input type="text" name="MiddleName" placeholder="Middle Name" required>
                    <input type="text" name="LastName" placeholder="Last Name" 
                    required>
                    <input type="password" name="Password" placeholder="Password" required>
                    <input type="password" name="CPassword"  placeholder="Confirm Password" required>
                    <input type="number" name="Age" placeholder="Age" required>
                    <select name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" name="Contact" placeholder="Contact Number" required>
                    <input type="email" name="Email" placeholder="Email" required>
                    <input type="text" name="Address" placeholder="Address" rows="4" required>
                    <input type="button" class="sign-up-button" value="signup">

                  
                </form>
                <div class="terms">
                    </p>
                    <a>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>