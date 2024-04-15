<?php
require_once 'connect.php';

if(isset($_POST['class_id'], $_POST['class_name'], $_POST['teacher_id'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "UPDATE Classes SET class_name = '$class_name', teacher_id = $teacher_id WHERE class_id = $class_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: form_class.php?edit_success=true");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ";
}
$conn->close();
?>
