<?php
    function minify_output($buffer) {
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );

        if (preg_match("/\<html/i", $buffer) == 1 && preg_match("/\<\/html\>/i", $buffer) == 1) {
            $buffer = preg_replace($search, $replace, $buffer);
        }

        return $buffer;
    }
?>

<?php require_once "./libs/config_link.php"; ob_start('minify_output'); if(isset($_SESSION['tangkinhcac_user'])) header('location: bang-dieu-khien'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tàng Kinh Các | Quên Mật Khẩu</title>
	<base href="<?php echo $config_Login; ?>">
	<link rel="shortcut icon" href="./public/icons/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./public/css/style_login.css">
	<link rel="stylesheet" href="./public/css/jquery-confirm.min.css">
</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Bạn Quên Mật Khẩu?</h3>
				</div>
				<div class="card-body">
					<form action="index.php?url=xu-ly-quen-mat-khau" method="POST">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input name="username" type="text" class="form-control" placeholder="Tên đăng nhập..." maxlength="50" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input name="email" type="email" class="form-control" placeholder="Email..." maxlength="50" required>
						</div>
					
						<div class="form-group">
							<div class="text-center">
								<button name="login" type="submit" class="btn login_btn"><i class="fas fa-user-shield"></i> Lấy Mật Khẩu</button>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Bạn chưa có tài khoản?<a href="dang-ky" style="color: gold;">Đăng ký</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="dang-nhap" style="color: gold;">Bạn đã có tài khoản?</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="./" style="color:white;"><i class="fas fa-home"></i> Trở về Trang Chủ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="./public/js/jquery-3.5.1.min.js"></script>
	<script src="./public/js/popper.min.js"></script>
	<script src="./public/js/bootstrap.min.js"></script>
	<script src="./public/js/jquery-confirm.min.js"></script>
	<script src="./public/js/main.js"></script>
	
</body>
</html>

<?php  
	if(isset($_COOKIE['message'])){
		echo '<script>LayLaiMatKhau("'.$_COOKIE['message'].'")</script>';
	}

	if(isset($_COOKIE['error_message'])){
		echo '<script>Error("'.$_COOKIE['error_message'].'")</script>';
	}
?>