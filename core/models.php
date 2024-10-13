<?php

require_once 'dbConfig.php';

function createStudentRecordsTable($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS student_records (
        student_id INT AUTO_INCREMENT,
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        gender VARCHAR(10),
        year_level VARCHAR(10),
        section VARCHAR(10),
        adviser VARCHAR(50),
        timein TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (student_id)
    )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

function insertIntoStudentRecords($pdo, $first_name, $last_name, $gender, $yearLevel, $section, $adviser) {
    $sql = "INSERT INTO student_records (first_name, last_name, gender, year_level, section, adviser) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $yearLevel, $section, $adviser]);
    if ($executeQuery) {
        return true;
    }
}

function seeAllStudentRecords($pdo) {
    $sql = "SELECT * FROM student_records";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getStudentByID($pdo, $student_id) {
    $sql = "SELECT * FROM student_records WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$student_id])) {
        return $stmt->fetch();
    }
}

function updateAStudent($pdo, $student_id, $first_name, $last_name, $gender, $year_level, $section, $adviser) {
    $sql = "UPDATE student_records 
                SET first_name = ?, 
                    last_name = ?, 
                    gender = ?, 
                    year_level = ?, 
                    section = ?, 
                    adviser = ? 
            WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $year_level, $section, $adviser, $student_id]);
    if ($executeQuery) {
        return true;
    }
}

function deleteAStudent($pdo, $student_id) {
    $sql = "DELETE FROM student_records WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$student_id]);
    if ($executeQuery) {
        return true;
    }
}

createStudentRecordsTable($pdo);

?>