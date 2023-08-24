<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng ký</title>
    <link rel="stylesheet" href="./assets/css/dangki.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel= "stylesheet" >
    <script src="./assets/js/javascript.js"></script>
</head>
<body>
    <div class="main">

        <form action="reg.php" method="POST" class="form" id="form-1">
          <h3 class="heading"> Đăng ký</h3>
    
          <div class="spacer"></div>
    
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đăng nhập</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Nhung Tu" class="form-control">
            <span class="form-message"></span>
          </div>
    
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message"></span>
          </div>
    
          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="form-message"></span>
          </div>

          <!-- <div class="form-group">
            <label for="">Giới tính</label>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" checked
                    id="male" value="male">
                    <label for="male" class="form-check-label">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" checked
                    id="female" value="female">
                    <label for="female" class="form-check-label">Nữ</label>
                </div>
            </div>
          </div>
          <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="address">
          </div> -->
            <input type="submit" class="form-submit" name="btn-reg"
            value="Đăng ký">
          <!-- <button onclick="modangnhap()" class="form-submit">Đăng ký</button> -->
        </form>
    
      </div>
</body>
</html>