<?php 
 //tiếp nhận user, pass từ form
 $u = $_POST['u'];
 $p = $_POST['p']; 
 //validate dữ liệu tiếp nhận
 $u = trim(strip_tags($u));
 $p = trim(strip_tags($p));
 //truy xuất db
 require_once ("connectdb.php");
 //asd
 $sql="SELECT idUser, username FROM users WHERE username='{$u}' AND pass ='{$p}'";
 $kq = $conn->query($sql);
 $numrows_user = $kq->rowCount();
 if ($numrows_user == 1) {// login thành công			
     session_start();
     $row_user = $kq->fetch();
     $_SESSION['login_id'] = $row_user['idUser'];//tạo biến ghi nhận user đã login
     $_SESSION['login_user'] = $row_user['username'];//tạo biến ghi nhận user đã login
     header("location: thanhcong.php");//chuyển đến trang nào tùy ý
 }
 else header("location: login.php");//login thất bại, login lại
