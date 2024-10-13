<?php  
require_once 'core/dbConfig.php';
require_once 'core/models.php';

// Check if student_id is set and fetch student data
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $studentRecord = getStudentById($pdo, $student_id); 

    // If no student found, show error and exit
    if ($studentRecord === false) {
        echo "Student not found.";
        exit;
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Student</title>
	<style>
		body {
			font-family: "Arial";
			background-color: #f5f5f5;
		}
		.studentContainer {
			width: 50%;
			margin: 40px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: inset 0vw 0vw 0vw .1vw #d422cc, 0vw 0vw 1.5vw 0vw #ff04de, 0vw 0vw 1.5vw 0vw #d422cc;
		}
		.studentContainer p, h3, label {
			margin-bottom: 10px;
		}
		.studentContainer input[type="text"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
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
	</style>
</head>
<body>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="student_id" value="<?php echo htmlspecialchars($studentRecord['student_id']); ?>"> <!-- Hidden student ID -->
		<div class="studentContainer">
			<h3>Edit Student</h3>
			
			<p>
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" value="<?php echo htmlspecialchars($studentRecord['first_name']); ?>" required>
			</p>
			<p>
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" value="<?php echo htmlspecialchars($studentRecord['last_name']); ?>" required>
			</p>
			<p>
				<label for="gender">Gender</label>
				<input type="text" name="gender" value="<?php echo htmlspecialchars($studentRecord['gender']); ?>" required>
			</p>
			<p>
				<label for="yearLevel">Year Level</label>
				<input type="text" name="yearLevel" value="<?php echo htmlspecialchars($studentRecord['year_level']); ?>" required>
			</p>
			<p>
				<label for="section">Section</label>
				<input type="text" name="section" value="<?php echo htmlspecialchars($studentRecord['section']); ?>" required>
			</p>
			<p>
				<label for="adviser">Adviser</label>
				<input type="text" name="adviser" value="<?php echo htmlspecialchars($studentRecord['adviser']); ?>" required>
			</p>
			
			<p>
				<input type="submit" name="editStudentBtn" value="Update">
			</p>
		</div>
	</form>
</body>
</html>
