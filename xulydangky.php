<?php
header('Content-Type: text/html; charset=utf-8');
//ket noi database
$dns = 'mysql:host=localhost;dbname=database_myweb';
$username = 'root';
$password = '';
$db = new PDO($dns, $username, $password);

if(isset($_POST['btn-reg'])){
    $msv = $_POST['uid'];
    $hoten = $_POST['fullname'];
    $email = $_POST['email'];
    if(isset($_POST['gender'])){
        $gioitinh = $_POST['gender'];
    }
    $sothich = "";
    if(isset($_POST['hobbies'])){
        $hobbies = $_POST['hobbies'];
        foreach ($hobbies as $key => $value) {
            $sothich= $sothich." ".$value;
        }
    }
    $quoctich = $_POST['nation'];
    $ghichu = $_POST['note'];
    $query = "INSERT INTO userinformation(MSV, HoVaTen, Email, GioiTinh, SoThich, QuocTich, GhiChu) 
    VALUES 
    ('$msv','$hoten','$email','$gioitinh','$sothich','$quoctich','$ghichu')";
    try{
        $db->exec($query);
        echo '<script>alert("Dang ky thanh cong")</script>';
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>