<?php
require_once 'connect.php';

$attendance_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = $_POST['class_id'];
    $attendance_date = $_POST['attendance_date'];
    
    if(isset($_POST['attendance']) && is_array($_POST['attendance'])) {
        $stmt = $conn->prepare("INSERT INTO Attendance (student_id, class_id, attendance_date, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $student_id, $class_id, $attendance_date, $status);

        foreach ($_POST['attendance'] as $student_id => $status) {
            if ($stmt->execute()) {
                $attendance_success = true;
            } else {
                echo "Lỗi khi điểm danh cho sinh viên có ID: $student_id";
            }
        }

        $stmt->close();
    } else {
        echo "Không có dữ liệu điểm danh được gửi từ form.";
    }
} else {
    echo "Dữ liệu không được gửi bằng phương thức POST.";
}

if ($attendance_success) {
    header("Location: teacher_form_attendance.php?success=1");
    exit();
}
?>
