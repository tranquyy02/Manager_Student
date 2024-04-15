<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View attendance</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome </h1>
            <p class="ngonngu"><i class="fa-solid fa-earth-americas"></i>  Vietnamese(vi)
            </p>
        </div>
        <h2>View attendance</h2>
        <?php
        require_once 'connect.php';

        $sql_classes = "SELECT class_id, class_name FROM Classes";
        $result_classes = $conn->query($sql_classes);
        ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="class_id">Choose Class:</label>
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
            <button type="submit" class="btn btn-primary">View attendance</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>

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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $class_id = $_POST['class_id'];

            $sql_students = "SELECT student_id, student_name FROM Students WHERE class_id = $class_id";
            $result_students = $conn->query($sql_students);

            if ($result_students->num_rows > 0) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Name Student</th>";
                echo "<th>Class</th>";
                echo "<th>Status attendance</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while($row_student = $result_students->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row_student['student_id']."</td>";
                    echo "<td>".$row_student['student_name']."</td>";
                    echo "<td>".$class_id."</td>";
                    echo "<td>Thông tin điểm danh không có sẵn trong phiên bản xem này.</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Dont have student in class.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
