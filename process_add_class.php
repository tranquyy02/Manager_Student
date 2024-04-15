<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'connect.php';

    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "INSERT INTO Classes (class_id, class_name, teacher_id) VALUES ('$class_id', '$class_name', '$teacher_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: form_class.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
