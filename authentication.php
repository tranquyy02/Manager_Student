<?php
session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['student_id'] = $row['student_id'];

$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['student_id'] = $row['student_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    
    if ($row['role'] == 'admin') {
        header("Location: manager_admin.html");
    } elseif ($row['role'] == 'teacher') {
        header("Location: manager_teacher.html");
    } elseif ($row['role'] == 'student') {
        header("Location: manager_student.html");
    } else {
        echo "Invalid role";
    }
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
