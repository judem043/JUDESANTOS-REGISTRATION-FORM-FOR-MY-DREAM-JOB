<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Student</title>
	<style>
		body {
			font-family: "Arial";
			background: url('https://i.pinimg.com/originals/59/69/84/59698460a33a71e42ddf46e185e17737.gif') no-repeat center center fixed;
            background-size: cover;
		}
		.studentContainer {
			width: 50%;
			margin: 40px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: inset 0vw 0vw 0vw .1vw #d422cc, 0vw 0vw 1.5vw 0vw #ff04de, 0vw 0vw 1.5vw 0vw #d422cc;
		}
		.studentContainer p {
			margin-bottom: 15px;
		}
		.studentContainer label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
		}
		.studentContainer input[type="text"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 1em;
		}
		.studentContainer input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		.studentContainer input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		p {
            font-size: 25px;
            color: #fff;
            text-align: left;
            animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
        from {
             text-shadow: 0 0 10px rgb(243, 133, 7), 0 0 20px rgb(245, 4, 145), 0 0 30px #e6008e, 0 0 40px #e60073, 0 0 50px #ec07a0, 0 0 60px #e600ad, 0 0 70px #f508cd;
        }
  
        to  {
            text-shadow: 0 0 20px rgb(241, 97, 14), 0 0 30px #f73504, 0 0 40px #faa506, 0 0 50px #ff9102, 0 0 60px #ee9d08, 0 0 70px #f7b708, 0 0 80px #fd5d00;
        }
        
       }
	</style>
</head>
<body>
	<?php 
	$getStudentById = getStudentByID($pdo, $_GET['student_id']); 
	if (!$getStudentById) {
		echo "Student not found.";
		exit;
	}
	?>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="student_id" value="<?php echo $getStudentById['student_id']; ?>"> <!-- Hidden student ID -->
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getStudentById['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getStudentById['last_name']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo $getStudentById['gender']; ?>">
		</p>
		<p>
			<label for="yearLevel">Year Level</label>
			<input type="text" name="yearLevel" value="<?php echo $getStudentById['year_level']; ?>">
		</p>
		<p>
			<label for="section">Section</label>
			<input type="text" name="section" value="<?php echo $getStudentById['section']; ?>">
		</p>
		<p>
			<label for="adviser">Adviser</label>
			<input type="text" name="adviser" value="<?php echo $getStudentById['adviser']; ?>">
		</p>
		<p>
			<input type="submit" name="editStudentBtn" value="Update">
		</p>
	</form>
</body>
</html>
