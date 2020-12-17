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
		<title>Tàng Kinh Các | Đăng Ký Tài Khoản</title>
		<base href="<?php echo $config_Register; ?>">
		<link rel="shortcut icon" href="./public/icons/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="./public/css/bootstrap.min.css">
		<link rel="stylesheet" href="./public/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="./public/css/style_register.css">
		<link rel="stylesheet" href="./public/css/jquery-confirm.min.css">
		
	</head>
	<body background="./public/images/bg_2.jpg">
		<div class="container">
		<div class="card bg-dark">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="t1 card-title mt-3 text-center">Tạo Tài Khoản</h4>
				<p class="t1 text-center">Bắt đầu tạo tài khoản miễn phí</p>
				<p>
					<a href="#" class="btn btn-block btn-twitter" onclick="Alert('Tính năng này hiện đang phát triển!')"> <i class="fab fa-twitter"></i> Đăng nhập với Twitter</a>
					<a href="#" class="btn btn-block btn-facebook" onclick="Alert('Tính năng này hiện đang phát triển!')"> <i class="fab fa-facebook-f"></i> Đăng nhập với facebook</a>
				</p>
				<p class="divider-text"><span class="bg-light rounded-circle"><b>Hoặc</b></span></p>

				<form action="index.php?url=xu-ly-tao-tai-khoan" method="POST" name="f_register" onsubmit="return check_form()">
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						 </div>
				        <input id="DisplayName" name="DisplayName" class="form-control" placeholder="Tên hiển thị..." type="text" maxlength="50" required>
				    </div>


				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						 </div>
				        <input name="Email" class="form-control" placeholder="Địa chỉ email..." type="email" maxlength="50" required>
				    </div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<select class="custom-select" style="max-width: 70px;">
						    <option selected>+84</option>
						</select>
				    	<input id="Phone" name="Phone" class="form-control" placeholder="Số điện thoại..." type="text" maxlength="11" required>
				    </div>
					<div class="form-group input-group position-relative">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
				        <input id="check_user" name="UserName" class="form-control" placeholder="Tên đăng nhập..." type="text" maxlength="50" onchange="check_KyTuLa()" required>
				    </div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
				        <input id="pass" name="PassWord" class="form-control" placeholder="Mật khẩu..." type="password" maxlength="50" required>
				    </div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
				        <input id="re_pass" name="RepeatPassword" class="form-control" placeholder="Nhập lại mật khẩu..." type="password" maxlength="50" required>
				    </div>                                   
				    <div class="form-group">
				        <button name="CreateAccount" type="submit" class="btn btn-primary btn-block"><i class="fas fa-user-plus"></i> Tạo Tài Khoản</button>
				    </div> 
				    <p class="t1 text-center">Bạn đã có tài khoản? <a href="dang-nhap" style="color: gold;">Đăng nhập</a> </p>                                                                 
				    <p class="t1 text-center"><a class="text-light" href="./"><i class="fas fa-home"></i> Trở về Trang Chủ</a> </p>                                                                 
				</form>
			</article>
		</div>

		</div> 
		<!--container end.//-->
		
		<script src="./public/js/jquery-3.5.1.min.js"></script>
		
		<script src="./public/js/popper.min.js"></script>
		<script src="./public/js/bootstrap.min.js"></script>
		<script src="./public/js/jquery-confirm.min.js"></script>
		<script src="./public/js/register.js"></script>
		<script src="./public/js/main.js"></script>

		<?php
			if(isset($_COOKIE['error_message'])){
				echo '<script type="text/javascript">Error("'.$_COOKIE["error_message"].'")</script>';
			}
		?>
	</body>
</html>