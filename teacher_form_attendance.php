<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        
    .contact{
        width: 1107px;
        height: 225px;
        margin-top: 50px;
        background-color: #f6702e;
        display: flex;
        float: right;
    }
    .info{
    margin-right: 10px;
    ;
    }
    .info p{
        color: aliceblue;
        font-size: 15px;
        font-family: 'Times New Roman', Times, serif;
    }
    .info h4{
        color: aliceblue;
        font-family: 'Times New Roman', Times, serif;
    }
    .contact > .info{
        padding-left: 40px;
        padding-top: 20px;
    }

    .pt-3 {
        background-color: #f6702e;
        position: relative;
    }
    .h2{
        margin-left: 20px;
        color: #FFF;
        font-family: 'Times New Roman', Times, serif;
    }
    .ngonngu{
        float: right;
        position: absolute;
        top: 27px;
        right: 150px;
        font-size: 15px;
        color: #FFF;
        font-weight: 400;
    }
    .ngonngu:hover+.boxhover{
    display: block;
    }
    .boxhover{
        width: 150px;
        height: 150px;
        background-color: aqua;
        position: absolute;
        top: 50px;
        right: 120px;
        display: none;
    }
    .pt-3{
        position: relative;
    }
    .btn{
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
    <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome </h1>
            <p class="ngonngu"><i class="fa-solid fa-earth-americas"></i>  Vietnamese(vi)
            </p>
        </div>
        <h2>Attendance</h2>
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
        }

        $sql_classes = "SELECT class_id, class_name FROM Classes";
        $result_classes = $conn->query($sql_classes);
        ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="class_id">Choose class:</label>
                <select class="form-control" id="class_id" name="class_id" required>
                    <?php
                    if ($result_classes->num_rows > 0) {
                        while($row_class = $result_classes->fetch_assoc()) {
                            echo "<option value='".$row_class['class_id']."'>".$row_class['class_name']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="attendance_date">Choose Date:</label>
                <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name student</th>
                        <th>Class</th>
                        <th>Attendace</th>
                    </tr>
                </thead>
                <tbody id="student_list">
                    <?php
                    if (isset($class_id)) {
                        $sql_students = "SELECT student_id, student_name FROM Students WHERE class_id = $class_id";
                        $result_students = $conn->query($sql_students);

                        if ($result_students->num_rows > 0) {
                            while($row_student = $result_students->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row_student['student_id']."</td>";
                                echo "<td>".$row_student['student_name']."</td>";
                                echo "<td>".$class_id."</td>";
                                echo "<td>";
                                echo "<input type='radio' name='attendance[".$row_student['student_id']."]' value='Present'> Present ";
                                echo "<input type='radio' name='attendance[".$row_student['student_id']."]' value='Absent'> Absent";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không có sinh viên trong lớp này.</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" style='background-color: #F6702E; border-color: #F6702E; margin-left: 490px; '  >Save</button>
            <a href="#" class="btn btn-secondary" style='background-color: #F6702E; border-color: #F6702E;'>Back</a>
        </form>

        <?php
        if ($attendance_success) {
            header("Location: teacher_form_attendance.php?success=1");
            exit();
        }
        ?>
        <footer>
            <div class="contact">
                <div class="info">
                    <h4>Ha Noi</h4>
                    <p>Tang 2, Toa nha Detech II, 107 Nguyen Phong Sac, Cau Giay, Ha Noi</p>
                    <p>Dien thoai: 0981 090 513</p>
                    <p>Email: btec.hn@fpt.edu.vn</p>
                    <p>Hotline: 0981 090 513</p>
                </div>
                <div class="info">
                    <h4>Da Nang</h4>
                    <p>66B Vo Van Tan, Quan Thanh Khe, TP.Da Nang (Toa nha Savico Building)</p>
                    <p>Dien thoai: 0236 730 9268</p>
                    <p>Email: btec.dn@fpt.edu.vn</p>
                    <p>Hotline: 0905 888 535</p>
                </div>
                <div class="info">
                    <h4>TP. Ho Chi Minh</h4>
                    <p>275 Nguyen Van Dau - Quan Binh Thanh - TP.Ho Chi Minh</p>
                    <p>Dien thoai: 028 7300 9268</p>
                    <p>Email: btec.hcm@fpt.edu.vn</p>
                    <p>Hotline: 0942 25 68 25</p>
                </div>
                <div class="info">
                    <h4>Can Tho</h4>
                    <p>41 Cach Mang Thang 8, Quan Ninh Kieu, TP. Can Tho.</p>
                    <p>Dien thoai: 0354 583 916</p>
                    <p>Email: btec.hn@fpt.edu.vn</p>
                    <p>Hotline: 091 888 54 35</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>
