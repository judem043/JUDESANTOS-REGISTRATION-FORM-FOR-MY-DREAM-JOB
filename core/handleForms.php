<?php
require_once 'dbConfig.php'; 
require_once 'models.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST); 
    echo "</pre>";
}

if (isset($_POST['insertNewStudentBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $yearLevel = trim($_POST['yearLevel']);
    $section = trim($_POST['section']);
    $adviser = trim($_POST['adviser']);

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser)) {
        $query = insertIntoStudentRecords($pdo, $firstName, $lastName, $gender, $yearLevel, $section, $adviser);

        if ($query) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Query failed";
        }
    } else {
        echo "Make sure that no fields are empty.";
    }
}

if (isset($_POST['deleteStudentBtn'])) {
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        $query = deleteAStudent($pdo, $student_id);

        if ($query) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Deletion failed";
        }
    } else {
        echo "Student ID is missing.";
    }
}

if (isset($_POST['editStudentBtn'])) {
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $gender = trim($_POST['gender']);
        $yearLevel = trim($_POST['yearLevel']);
        $section = trim($_POST['section']);
        $adviser = trim($_POST['adviser']);

        if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser)) {
            $query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $yearLevel, $section, $adviser);

            if ($query) {
                header("Location: ../index.php");
                exit;
            } else {
                echo "Update failed";
            }
        } else {
            echo "Make sure that no fields are empty.";
        }
    } else {
        echo "Student ID is missing.";
    }
}
?>
