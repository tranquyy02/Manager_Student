<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO Students (student_id, student_name, date_of_birth, class_id) VALUES ('$student_id', '$student_name', '$date_of_birth', '$class_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_form_student.php?success=true");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
