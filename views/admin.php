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
        <meta charset="utf-8">
        <base href="<?php echo $config_Admin; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tàng Kinh Các | Bảng Điều Khiển</title>
        <link rel="shortcut icon" href="./public/icons/favicon.ico" type="image/x-icon">

        <!-- Google Font: Source Sans Pro -->
        <script type="text/javascript" src="./public/js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./public/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="./public/css/admin/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="./public/css/admin/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="./public/css/admin/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./public/css/admin/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="./public/css/admin/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="./public/css/admin/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="./public/summernote/summernote-bs4.min.css">
        <!-- moi them -->
        <link rel="stylesheet" href="./public/css/admin/bootstrap-switch.min.css">

        <!-- my css -->
        <link rel="stylesheet" type="text/css" href="./public/css/admin/admin.css">
        
        <link rel="stylesheet" href="./public/css/jquery-confirm.min.css">
        <script src="./public/js/jquery-confirm.min.js"></script>
        <script src="./public/js/main.js"></script>
        
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="bang-dieu-khien" class="nav-link"><i class="fas fa-home"></i> Trang Quản Trị</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./" target="_blank" class="nav-link"><i class="fas fa-university"></i> Trang Truyện</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-alt"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <i class="fal fa-user"></i> <?php echo $_SESSION['tangkinhcac_ten_hien_thi']; ?>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./" class="dropdown-item">
                                <i class="fas fa-university"></i> Trang Truyện
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="dang-xuat" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Đăng Xuất
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="bang-dieu-khien" class="brand-link">
                    <img src="./public/icons/favicon.ico" alt="Tàng Kinh Các" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Tàng Kinh Các</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar mt-1">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="bang-dieu-khien" class="nav-link <?php if($_GET['url'] == 'bang-dieu-khien') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Bảng Điều Khiển</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="truyen-cua-toi" class="nav-link <?php if($_GET['url'] == 'truyen-cua-toi' || $_GET['url'] == 'them-chuong' || $_GET['url'] == 'danh-sach-chuong' || $_GET['url'] == 'sua-truyen') echo 'active'; ?>">
                                    <i class="nav-icon fab fa-stack-overflow"></i>
                                    <p>
                                        Truyện Của Tôi
                                        <span class="right badge badge-info"><?php echo $_SESSION['tangkinhcac_truyencuatoi']; ?></span>
                                    </p>
                                </a>
                            </li>

                            <?php if($_SESSION['tangkinhcac_loai'] == 0){ ?>
                            <li class="nav-item">
                                <a href="tat-ca-truyen" class="nav-link <?php if($_GET['url'] == 'tat-ca-truyen') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Tất Cả Truyện
                                        <span class="right badge badge-info"><?php echo $_SESSION['tangkinhcac_tatcatruyen']; ?></span>
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-item <?php if($_GET['url'] == 'thong-tin-tai-khoan' || $_GET['url'] == 'doi-mat-khau' || $_GET['url'] == 'doi-ten-hien-thi') echo 'menu-open'; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-shield"></i>
                                    <p>
                                        Tài Khoản
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="thong-tin-tai-khoan" class="nav-link <?php if($_GET['url'] == 'thong-tin-tai-khoan') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-user-tie"></i>
                                            <p>Thông Tin Tài Khoản</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="doi-mat-khau" class="nav-link <?php if($_GET['url'] == 'doi-mat-khau') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-user-lock"></i>
                                            <p>Đổi Mật Khẩu</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="doi-ten-hien-thi" class="nav-link <?php if($_GET['url'] == 'doi-ten-hien-thi') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-user-clock"></i>
                                            <p>Đổi Tên Hiển Thị</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="dang-xuat" class="nav-link">
                                            <i class="nav-icon fas fa-sign-out-alt"></i>
                                            <p>Đăng Xuất</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header">CHUNG</li>
                            <li class="nav-item">
                                <a href="dang-truyen" class="nav-link <?php if($_GET['url'] == 'dang-truyen') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Đăng Truyện
                                        <span class="badge badge-warning right">new</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="van-de-phat-sinh" class="nav-link <?php if($_GET['url'] == 'van-de-phat-sinh') echo 'active'; ?>">
                                    <i class="fas fa-bug nav-icon"></i>
                                    <p>
                                        Vấn Đề Phát Sinh
                                        <span class="badge badge-warning right"><?php echo $_SESSION['tangkinhcac_loi_truyen']; ?></span>
                                    </p>
                                </a>
                            </li>

                            <?php if($_SESSION['tangkinhcac_loai'] == 0){ ?>
                            <li class="nav-item">
                                <a href="danh-sach-the-loai" class="nav-link <?php if($_GET['url'] == 'danh-sach-the-loai') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Thể Loại Truyện
                                        <span class="badge badge-info right"><?php echo $_SESSION['tangkinhcac_the_loai']; ?></span>
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if($_SESSION['tangkinhcac_loai'] == 0){ ?>
                            <li class="nav-item <?php if($_GET['url'] == 'tai-khoan-dang-mo' || $_GET['url'] == 'tai-khoan-bi-khoa' || $_GET['url'] == 'tai-khoan-bi-xoa') echo 'menu-open'; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-toolbox"></i>
                                    <p>
                                        Nâng Cao
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="tai-khoan-dang-mo" class="nav-link <?php if($_GET['url'] == 'tai-khoan-dang-mo') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>Tài Khoản Đang Mở</p>
                                            <span class="right badge badge-info"><?php echo $_SESSION['tangkinhcac_taikhoan_mo']; ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="tai-khoan-bi-khoa" class="nav-link <?php if($_GET['url'] == 'tai-khoan-bi-khoa') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-users-slash"></i>
                                            <p>Tài Khoản Bị Khóa</p>
                                            <span class="right badge badge-info"><?php echo $_SESSION['tangkinhcac_taikhoan_khoa']; ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="tai-khoan-bi-xoa" class="nav-link <?php if($_GET['url'] == 'tai-khoan-bi-xoa') echo 'active'; ?>">
                                            <i class="nav-icon fas fa-user-times"></i>
                                            <p>Tài Khoản Bị Xóa</p>
                                            <span class="right badge badge-info"><?php echo $_SESSION['tangkinhcac_taikhoan_xoa']; ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $config_DataBase; ?>" target="_blank" class="nav-link">
                                            <i class="nav-icon fas fa-database"></i>
                                            <p>Backup DataBase</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            <?php if($_SESSION['tangkinhcac_loai'] == 0){ ?>
                            <li class="nav-header">THIẾT LẬP</li>
                            <li class="nav-item">
                                <a href="cai-dat" class="nav-link <?php if($_GET['url'] == 'cai-dat') echo 'active'; ?>">
                                    <i class="fas fa-cogs nav-icon"></i>
                                    <p>
                                        Cài Đặt
                                        <span class="badge badge-danger right">new</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="huong_dan" class="nav-link <?php if($_GET['url'] == 'huong_dan') echo 'active'; ?>">
                                    <i class="fas fa-handshake nav-icon"></i>
                                    <p>
                                        Trang Hướng Dẫn
                                        <span class="badge badge-danger right">new</span>
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-header">NHÃN</li>
                            <li class="nav-item">
                                <div class="nav-link" style="cursor: pointer; color: #c2c7d0;" onclick="QuanTrong()">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p class="text">Quan Trọng</p>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" style="cursor: pointer; color: #c2c7d0;" onclick="CanhBao()">
                                    <i class="nav-icon far fa-circle text-warning"></i>
                                    <p>Cảnh Báo</p>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" style="cursor: pointer; color: #c2c7d0;" onclick="ThongTin()">
                                    <i class="nav-icon far fa-circle text-info"></i>
                                    <p>Thông Tin</p>
                                </div>
                            </li>
                            <li class="nav-header">THÔNG TIN</li>
                            <li class="nav-item">
                                <a href="huong-dan" class="nav-link">
                                    <i class="fal fa-info-circle nav-icon"></i>
                                    <p>Quy Định Và Hướng Dẫn</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-gavel nav-icon"></i>
                                    <p>Liên Hệ Quản Trị Viên</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                  <!-- /.sidebar-menu -->
                </div>
            <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php require_once "./views/Pages_Admin/".$data['trang'].".php"; ?>
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <strong>Copyright &copy; 2019- <?php echo date("Y"); ?> <a href="bang-dieu-khien">Tàng Kinh Các</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 10.3.1
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery UI 1.11.4 -->
        <script src="./public/js/admin/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script> $.widget.bridge('uibutton', $.ui.button)</script>
        <!-- Bootstrap 4 -->
        <script src="./public/js/admin/bootstrap.bundle.min.js"></script>
        <!-- Sparkline -->
        <script src="./public/js/admin/sparkline.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="./public/js/admin/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="./public/js/admin/moment.min.js"></script>
        <script src="./public/js/admin/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="./public/js/admin/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="./public/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="./public/js/admin/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./public/js/admin/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="./public/js/admin/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="./public/js/admin/dashboard.js"></script>
        <script src="./public/js/ckfinder/ckfinder.js"></script>
        <script type="text/javascript">
            function BrowseServer(){
                var finder = new CKFinder();
                finder.basePath = '../';
                finder.selectActionFunction = function(fileUrl) {
                    document.getElementById('AnhTruyen').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
                };
                finder.popup();
            }
            function BrowseThumb(){
                var finder = new CKFinder();
                finder.basePath = '../';
                finder.selectActionFunction = function(fileUrl) {
                    document.getElementById('AnhBia').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
                };
                finder.popup();
            }
        </script>
        <script src="./public/js/ckeditor/ckeditor.js"></script>
        <!-- moi them -->
        <script src="./public/js/admin/bootstrap-switch.min.js"></script>
        <script type="text/javascript">
            $("input[data-bootstrap-switch]").each(function(){
              $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        </script>
    </body>
</html>