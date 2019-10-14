<?php
    include_once('header.php');
    include_once('nav.php');
?>

<?php 
        include_once("../model/entity/student.php");
        $maSinhVien = $hoTen = $ngaySinh = $email =  "";
        // var_dump($_SERVER);
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            // var_dump($_FILES);
            $maSinhVien = $_REQUEST["txtMaSinhVien"];
            $hoTen = $_REQUEST["txtHoTen"];
            $ngaySinh = $_REQUEST["dNgaySinh"];
            $email = $_REQUEST['txtEmail'];
            // var_dump($ngaySinh);
            $student = new Student($maSinhVien,$hoTen,$ngaySinh,$email);
            $student->display();
            
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // var_dump($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //echo "<h1>Email hợp lệ</h1>";
            } else echo "<h1>Email không hợp lệ</h1>";
            if (($_FILES["fAnhDaiDien"]["name"])!="") {
                // up anh
                move_uploaded_file($_FILES["fAnhDaiDien"]["tmp_name"], "upload/avt.jpg");
            } else echo "Bạn chưa chọn ảnh";

        }
        $date = getdate();
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-data">
            <div class="form-group">
                <label>Ảnh đại diện</label><br>
                <img class="avt" src="../upload/avt.jpg">
                <input type="file" name="fAnhDaiDien">
            </div>
            <div class="form-group">
                <label> Mã sinh viên :</label>
                <input class="form-control" type="text" name="txtMaSinhVien" value="<?php echo $maSinhVien ?>" required>
            </div>
            <div class="form-group">
                <label> Họ & tên :</label>
                <input class="form-control" type="text" name="txtHoTen" value="<?php echo $hoTen ?>" required>
            </div>
            <div class="form-group">
                <label> Ngày sinh :</label>
                <input class="form-control" type="date" name="dNgaySinh" value="<?php echo $ngaySinh ?>">
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input class="form-control" type="email" name="txtEmail" value="<?php echo $email ?>" required>
            </div>

            <div class="form-group">
                <!-- <input class="btn btn-success" type="submit" name="submit" value="Lưu"> -->
                <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-save"></i> Lưu</button>
            </div>
        </div>
    </form>

                    
<?php
    include_once('footer.php');
?>