<?php
    $u = $_POST['username'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $email = $_POST['email'];
    $phai = $_POST['phai'];
    $nghenghiep = $_POST['nghenghiep'];
?>

<?php
    // validate dữ liệu
    $u = trim(strip_tags($u));
    $pass = trim(scrip_tags($pass));
    $repass = trim(scrip_tags($email));
    $email = trim(strip_tags($email));
    settype($phai, "int");
    settype($nghenghiep, "int");
?>

<?php
    //kiểm tra và báo lỗi
    $loi="";
    if ($nghnghiep==0)  $loi .= "Bạn chưa chọn nghề<br>";
    if ($phai!=0 && $phai!=1)  $loi .= "Chọn phái đi nha bạn<br>";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)==false)  $loi.= "Email khong đúng<br>";
    if ($pass!=$repass)  $loi .= "Hai mật khẩu không giống nhau<br>";
?>

<?php if ($loi!="" ){ ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet">
    <div class="col-8 m-auto">
        <div class="alert alert-danger mt-5 text-center "> 
            <?=$loi?> 
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>
<?php } else { 
 require_once 'connectdb.php';

 $sql="INSERT INTO users(username, pass, email, ngay) VALUES ('$u','$pass','$email', Now())";
 $kq = $conn->exec($sql);
 if ($kq==1) {
    echo "Thành công";
    //gửi mail
 }
 else echo "Cập nhật không thành công";
} ?>
