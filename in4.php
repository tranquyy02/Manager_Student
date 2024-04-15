<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
.contact{
    width: 1300px;
    height: 220px;
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
/* .pt-3 > button { 
    float: right;
    margin-top: -46px;
    background-image: none;
    background-color: #ef5350;
    border: none;
    border-radius: 5px;
    box-shadow: 0 -2px 0 0 rgba(0,0,0,.5) inset;
    color: #FFF;.pt-3 
    text-shadow: none;
    transition: background 0.2s ease-out 0s;
    height: 30px;
    width: 80px;
    margin-right: 20px;
}*/
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
            <h1 class="h2">Welcome</h1>
            <p class="ngonngu"><i class="fa-solid fa-earth-americas"></i>  Vietnamese(vi)
            </p>
        </div>
        <h1 class="mt-5">Student Information</h1>
        <div class="row">
        
            <div class="col-md-6 mx-auto">
                <?php
                include 'connect.php';

                session_start();
                if(isset($_SESSION['student_id'])) {
                    $student_id = $_SESSION['student_id'];

                    $sql = "SELECT Students.student_id, Students.student_name, Students.date_of_birth, Students.class_id, Users.role
                            FROM Students
                            INNER JOIN Users ON Students.student_id = Users.student_id
                            WHERE Users.student_id = '$student_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="card mt-3">';
                        echo '<div class="card-body">';
                        while($row = $result->fetch_assoc()) {
                            echo '<h5 class="card-title">Student Information</h5>';
                            echo '<p class="card-text">Student ID: ' . $row["student_id"] . '</p>';
                            echo '<p class="card-text">Student Name: ' . $row["student_name"] . '</p>';
                            echo '<p class="card-text">Date of Birth: ' . $row["date_of_birth"] . '</p>';
                            echo '<p class="card-text">Class ID: ' . $row["class_id"] . '</p>';
                            echo '<p class="card-text">Role: ' . $row["role"] . '</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-warning mt-3" role="alert">';
                        echo 'Student not found';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">';
                    echo 'Please log in first.';
                    echo '</div>';
                }

                $conn->close();
                ?>
            </div>
        </div>
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
