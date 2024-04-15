<?php
require_once 'connect.php';

if(isset($_GET['id'])) {
    $class_id = $_GET['id'];

    $sql = "DELETE FROM Classes WHERE class_id = $class_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: form_class.php?delete_success=true");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không có ID lớp học được cung cấp.";
}

$conn->close();
?>
