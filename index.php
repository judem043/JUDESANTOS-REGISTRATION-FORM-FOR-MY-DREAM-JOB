<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;  
            background: url('https://i.pinimg.com/originals/59/69/84/59698460a33a71e42ddf46e185e17737.gif') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: inset 0vw 0vw 0vw .1vw #d422cc, 0vw 0vw 1.5vw 0vw #ff04de, 0vw 0vw 1.5vw 0vw #d422cc;
        }

		h3 {
            font-size: 25px;
            color: #fff;
            text-align: left;
            animation: glow 1s ease-in-out infinite alternate;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            box-shadow: inset 0vw 0vw 0vw .1vw #d422cc, 0vw 0vw 1.5vw 0vw #ff04de, 0vw 0vw 1.5vw 0vw #d422cc;
        }

        th {
            background-color: #f7f7f7;
            box-shadow: inset 0vw 0vw 0vw .1vw #d422cc, 0vw 0vw 1.5vw 0vw #ff04de, 0vw 0vw 1.5vw 0vw #d422cc;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
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
    <div class="container">
        <h3>Welcome to my school. Latecomers are needed to log </h3>
        <form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="yearLevel">Year Level</label> <input type="text" name="yearLevel"></p>
		<p><label for="section">Section</label> <input type="text" name="section"></p>
		<p><label for="adviser">Adviser</label> <input type="text" name="adviser"></p>
			<input type="submit" name="insertNewStudentBtn">
		</p>
</form>
        <table>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Year Level</th>
                <th>Section</th>
                <th>Adviser</th>
                <th>Actions</th>
            </tr>

            <?php $seeAllStudentRecords = seeAllStudentRecords($pdo); ?>
            <?php foreach ($seeAllStudentRecords as $row) { ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['year_level']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['adviser']; ?></td>
                <td>
                    <a href="editstudent.php?student_id=<?php echo $row['student_id']; ?>">Edit</a>
                    <form action="core/handleForms.php" method="POST" style="display:inline;">
                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                        <input type="submit" name="deleteStudentBtn" value="Delete">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
