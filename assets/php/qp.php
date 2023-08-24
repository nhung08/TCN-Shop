<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<form action="" method="post" class="col-5 m-auto bg-secondary p-2 text-white">
    <div class="form-group">
      <h4 class="border-bottom pb-2">QUÊN MẬT KHẨU</h4>
      <label for="email">Nhập email</label>
      <input class="form-control" name="email" type="email">
    </div>
    <div class="form-group">
      <button type="submit" name="btn1" class="btn btn-primary">Gửi yêu cầu</button>
    </div>
</form>
<?php
$thongbao="";
if (isset($_POST['btnl'])) {
    $email = trim( strip_tags( $_POST['email'] ) ); //tiếp nhận email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
        //kiểm tra định dạng
        $thongbao .= "Email không đúng <br>";
    }
    //kiểm tra email có phải là thành viên không
    require_once 'connectdb.php';
    $sql = "SELECT count(*) FROM users WHERE email = '{$email}'";
    $kq = $conn->query($sql);
    $row = $kq->fetch();
    if ($row[0]==0) $thongbao .= "Email này không phải là thành viên <br>";
    // tạo 1 chuỗi ngẫu nhiên để làm pass mới và cập nhật vào bảng users
    // gửi mail đến user
}
//code hiện thông báo
<?php if ($thongbao!="") { ?> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet" >
    <div class="col-8 m-auto">
       <div class="alert alert-danger mt-5 text-center "> 
            <?=$thongbao?> 
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button> 
            <a href="index.php" class="btn btn-info">Trang chủ</a>
        </div>
    </div>
   <?php exit(); } ?>
//code phát sinh mật khẩu ngẫu nhiên và cập nhập vào db
$pass_moi = md5(random_int(0, 999)); //phát sinh số ngẫu nhiên, mã hóa md5 ra 32 ký tự
$pass_moi = substr ($pass_moi, 0,8);//cắt 8 ký tự đầu
$sql = "UPDATE users SET pass='{$pass_moi}' WHERE EMAIL='{$email}'";
$kq = $conn->query($sql);
if ($kq==l) $thongbao .= "Cập naht65 mật khẩu thành công<br>";
else $thongbao .= "Cập nhật mật khẩu không thành công<br>";
//code gửi mail
require_once "PHPMailer-master/src/PHPMailer.php";
require_once "PHPMailer-master/src/Exception.php";
require_once "PHPMailer-master/src/OAuth.php";    
require_once "PHPMailer-master/src/SMTP.php";
$mail = new PHPMailer\PHPMailer\PHPMailer(true);     
try {        
    $mail->SMTPDebug = 2;   //chế độ full debug, khi mọi thứ ok thì chỉnh lại 0
    $mail->isSMTP();       // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Server gửi thư
    $mail->SMTPAuth = true;
    $mail->Username = 'địa chỉ gmail của bạn';  // ví dụ: abc@gmail.com
    $mail->Password = 'mật khẩu gmail của bạn';
    $mail->SMTPSecure = 'ssl'; //TLS hoặc `ssl` 
    $mail->Port = 465;    // 587 hoặc 465
    $mail -> CharSet = "UTF-8"; 
    $mail->smtpConnect([ "ssl" => [
              "verify_peer"=>false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
              ]
           ]
    );        
    //Khai báo người gửi và người nhận mail        
    $mail->setFrom('địa chỉ gmail của bạn', 'Ban quản trị website');
    $mail->addAddress("{$email}", 'Quý khách'); 
    $mail->isHTML(true);  // nội dung của email có mã HTML
    $mail->Subject = 'Cấp lại mật khẩu mới';
    $mail->Body = "Đây là mật khẩu mới của bạn <b> {$pass_moi} </b>";
    $mail->send();
    $thongbao .= "Đã gửi mail thành công<br>";
} catch (Exception $e) {
        $thongbao .= "Lỗi khi gửi thư: " . $mail->ErrorInfo;
}
