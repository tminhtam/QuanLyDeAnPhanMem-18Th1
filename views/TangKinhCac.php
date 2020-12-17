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

<?php require_once "./libs/config_link.php"; ob_start('minify_output'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo $config_Home; ?>">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="./public/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./public/css/style.css">
		<link rel="stylesheet" type="text/css" href="./public/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="./public/css/jquery-confirm.min.css">
		<link rel="shortcut icon" href="./public/icons/logo.ico" type="image/icon">
		
		<title>Tàng Kinh Các</title>
		<meta property="fb:app_id" content="361231344504986" />
		<meta property="fb:admins" content="100035917283116" />
		<meta name="robots" content="index, follow">

		<!-- font chu -->
		<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=David+Libre:wght@400;500;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pridi|Roboto" rel="stylesheet">
		<script src="./public/js/jquery-3.5.1.min.js"></script>
	</head>
	<body>

		<div class="container px-0 py-0">
			<header>
				<img class="gif-header" src="./public/images/tien-hiep-1.jpeg">
				<div class="header-title">
					<a class="header-link-video" href="./">Tàng Kinh Các</a>
					<p class="header-video-title animate__animated animate__bounce">nơi chia sẽ truyện miễn phí</p>
				</div>
			</header>

			<nav class="navbar navbar-expand-lg navbar-dark bg-black my-nav font-roman">
				<a class="navbar-brand font-robo my-1" href="./">
					tàng kinh <span class="ah-tls">các</span>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="truyen-hot"><i class="fab fa-hotjar"></i> Truyện HOT <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="truyen-dich"><i class="fad fa-language"></i> Truyện Dịch</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="truyen-convert"><i class="fad fa-language"></i> Truyện Convert</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="far fa-bars"></i> Thể Loại
							</a>
							<div class="dropdown-menu sub-menu-1 pb-0" aria-labelledby="navbarDropdown">
								<a class="dropdown-item nav-sub-menu" href="the-loai/Tiên+Hiệp"><i class="fab fa-phoenix-squadron fa-fw"></i> Tiên Hiệp</a>
								<a class="dropdown-item nav-sub-menu" href="the-loai/Huyền+Huyễn"><i class="fab fa-phoenix-framework fa-fw"></i> Huyền Huyễn</a>
								<a class="dropdown-item nav-sub-menu" href="the-loai/Trùng+Sinh"><i class="fas fa-history fa-fw"></i> Trùng Sinh</a>
								<a class="dropdown-item nav-sub-menu" href="tat-ca-the-loai"><i class="far fa-ellipsis-h fa-fw"></i> Xem Thêm</a>
							</div>
						</li>

						<?php if(isset($_SESSION['tangkinhcac_user'])){ ?>
						<li class="nav-item">
							<a class="nav-link" href="tu-sach"><i class="fad fa-books"></i> Tủ Sách</a>
						</li>
						<?php } ?>
					</ul>

					<div class="float-right text-light the-chua">
						<form class="search-box" method="GET" action="#">
							<input class="search-txb" type="text" name="search" placeholder="Tìm truyện...">
							<button id="icon-search" class="search-btn"><i class="far fa-search"></i></button>
						</form>

						<?php if(!isset($_SESSION['tangkinhcac_user'])){ ?>
						<a class="btn btn-sm btn-primary rounded-circle" href="dang-nhap"><i class="fas fa-user"></i></a>
						<?php } ?>

						<?php if(isset($_SESSION['tangkinhcac_user'])){ ?>
						<span class="dropdown login-user btn-group dropleft">
							<button class="btn btn-sm btn-primary rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user-alt"></i>
							</button>
							<div class="dropdown-menu dropdow-user" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item px-1" href="bang-dieu-khien"><i class="fas fa-tasks"></i> Trang Quản Trị</a>
								<a class="dropdown-item px-1" href="dang-xuat"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
							</div>
						</span>
						<?php } ?>
					</div>
				</div>
			</nav>

			<div id="content-main" class="container-fluid mt-3 py-1 px-0">
				<?php require_once "./views/Pages_TrangChu/".$data['trang'].".php"; ?>
			</div>

			<!-- nội dung footer -->
			<div class="container bg-toi text-light my-footer">
				<footer class="font-display">
					<div class="row footer-top">
						<div class="col-md-3 mb-2">
							<h3 class="text-center title-footer"> Tàng Kinh Các</h3>
							<p class="text-justify">
								Đọc truyện online, đọc truyện chữ, truyện hay. Website luôn cập nhật những bộ truyện mới thuộc các thể loại đặc sắc như truyện tiên hiệp, truyện kiếm hiệp, hay truyện ngôn tình một cách nhanh nhất.
							</p>
						</div>
						<div class="col-md-3">
							<h3 class="text-center title-footer"><i class="fas fa-link"></i> Liên Kết</h3>
							<ul class="ul">
								<li><a class="footer-contact-mini" href="#"><i class="fas fa-gavel fa-lg"></i> Điều Khoảng Chung</a></li>
								<li><a class="footer-contact-mini" href="#"><i class="fas fa-gavel fa-lg"></i> Bản Quyền & Trách Nhiệm Nội Dung</a></li>
								<li><a class="footer-contact-mini" href="#"><i class="fas fa-gavel fa-lg"></i> Đóng Góp Truyện</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h3 class="text-center title-footer"><i class="fas fa-tags"></i> Tag</h3>
							<ul class="ul">
								<li><a class="footer-contact-mini" href="the-loai/Tiên+Hiệp"><i class="fab fa-d-and-d fa-lg"></i> Tiên Hiệp</a></li>
								<li><a class="footer-contact-mini" href="the-loai/Huyền+Huyễn"><i class="fas fa-dragon fa-lg"></i> Huyền Huyễn</a></li>
								<li><a class="footer-contact-mini" href="the-loai/Kiếm+Hiệp"><i class="far fa-swords fa-lg"></i> Kiếm Hiệp</a></li>
								<li><a class="footer-contact-mini" href="the-loai/Ngôn+Tình"><i class="fas fa-flower-tulip fa-lg"></i> Ngôn Tình</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h3 class="text-center title-footer"><i class="fas fa-id-card"></i> Kết Nối</h3>
							<ul class="ul">
								<li><a class="footer-contact-mini" href="mailto: minhtuan.it99@gmail.com"><i class="fas fa-envelope fa-lg"></i> MinhTuan.IT99@gmail.com</a></li>
								<li><a class="footer-contact-mini" href="tel:01627626850"><i class="fas fa-phone-alt fa-lg"></i> 01627626850</a></li>
								<li><a class="footer-contact-mini" href="#"><i class="fab fa-facebook-square fa-lg"></i> Facebook.com/minhtuan</a></li>
								<li><a class="footer-contact-mini" href="#"><i class="fab fa-google-plus-square fa-lg"></i> Google.com/minhtuan</a></li>
							</ul>
						</div>
					</div>
					<div class="row footer-bottom bg-black">
						<div class="col-md-6 my-footer-bootom-left" style="line-height: 40px;">Copyright &copy; 2019-<?php echo date("Y"); ?> | All Rights Reserved</div>
						<div class="col-md-6 my-footer-bootom-right">
							<ul class="ul-footer-bottom-right">
								<li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UC6GTNdMR15WfS43H2b72Rig?view_as=subscriber"><i class="fab fa-youtube fa-2x"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></li>
							</ul>
						</div>
					</div>
				</footer>
			</div>
			<!-- end nội dung footer -->
		</div>
		
		<script src="./public/js/popper.min.js"></script>
		<script src="./public/js/bootstrap.min.js"></script>
		<script src="./public/js/main.js"></script>
		<script src="./public/js/jquery-confirm.min.js"></script>
	</body>
</html>