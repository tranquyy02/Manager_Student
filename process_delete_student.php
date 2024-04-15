<?php
require_once 'connect.php';

if(isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "DELETE FROM Students WHERE student_id = $student_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_form_student.php?delete_success=true");
        exit();
    } else {
        if ($conn->errno == 1451) {
            echo "<script>alert('Không thể xóa sinh viên do có dữ liệu liên quan trong hệ thống');</script>";
            echo "<script>window.location.href='admin_form_student.php.php';</script>";
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
