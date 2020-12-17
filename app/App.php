<?php  
	class App{
		function __construct(){
			$this->Routes();
		}

		public function Controller($controller){
			require_once "./controllers/".$controller.".php";
			return new $controller;
		}

		public function Routes(){
			if(isset($_GET['url']))
				$url = $_GET['url'];
			else
				$url = "home";
			
			if(isset($_GET['search']))
				$search = $_GET['search'];

			if(isset($search)){
				$this->Controller("TangKinhCac_Controller")->Search($search);
			}

			if(isset($url)){
				switch ($url) {
					/* 
					*	NHỮNG THỨ LIÊN QUAN TỚI ĐĂNG NHẬP
					*/

					//gọi giao diện đăng nhập ra
					case 'dang-nhap':{
						$this->Controller("DangNhap_Controller")->FormDangNhap();
						break;
					}

					// xử lý đang nhập
					case 'xu-ly-dang-nhap':{
						$req = array(
							'user_name' => addslashes($_POST['username']),
							'pass_word' => sha1($_POST['password'])
						);
						$this->Controller("DangNhap_Controller")->XuLyDangNhap($req);
						break;
					}

					case 'quen-mat-khau':{
						$this->Controller("QuenMatKhau_Controller")->FormQuenMatKhau();
						break;
					}

					case 'xu-ly-quen-mat-khau':{
						$req = array(
							'user_name'=>addslashes($_POST['username']),
							'email'=>addslashes($_POST['email'])
						);
						$this->Controller("QuenMatKhau_Controller")->XuLyQuenMatKhau($req);
						break;
					}

					case 'dang-xuat':{
						unset($_SESSION['tangkinhcac_user']);
						unset($_SESSION['tangkinhcac_ten_hien_thi']);
						unset($_SESSION['tangkinhcac_loai']);
						unset($_SESSION['tangkinhcac_sdt']);
						unset($_SESSION['tangkinhcac_mail']);
						unset($_SESSION['tangkinhcac_date_create']);
						// setcookie("tangkinhcac_user", "", time() - 7776000, "/");
						// setcookie("tangkinhcac_ten_hien_thi", "", time() - 7776000, "/");
						header('location: dang-nhap');
						break;
					}

					/* 
					*	NHỮNG THỨ LIÊN QUAN TỚI TẠO TÀI KHOẢN 
					*/

					//gọi giao diện tạo tài khoản ra
					case 'tao-tai-khoan':{
						$this->Controller("TaoTaiKhoan_Controller")->FormDangKy();

						break;
					}

					case 'ajax-kiem-tra-tai-khoan':{
						$req = array(
							'user_name'=>addslashes($_POST['TenDangNhap'])
						);
						$this->Controller("TaoTaiKhoan_Controller")->KiemTraTaiKhoan($req);

						break;
					}

					case 'xu-ly-tao-tai-khoan':{
						$req = array(
							'display_name' => addslashes($_POST['DisplayName']),
							'email' => addslashes($_POST['Email']),
							'phone' => $_POST['Phone'],
							'user_name' => addslashes($_POST['UserName']),
							'pass_word' => sha1($_POST['PassWord'])
						);
						$this->Controller("TaoTaiKhoan_Controller")->XuLyTaoTaiKhoan($req);

						break;
					}

					/* 
					*	NHỮNG THỨ LIÊN QUAN TỚI TRÌNH QUẢN TRỊ
					*/

					case 'bang-dieu-khien':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->BangDieuKhien();
						}

						break;
					}

					case 'tai-khoan-dang-mo':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->DanhSachTaiKhoanDangMo();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}

						break;
					}

					case 'tai-khoan-bi-khoa':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->DanhSachTaiKhoanBiKhoa();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}

						break;
					}

					case 'tai-khoan-bi-xoa':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->DanhSachTaiKhoanBiXoa();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'chinh-sua-tai-khoan':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->FormChinhSuaTaiKhoan(array('user_name'=>$_GET['user']));
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'xu-ly-chinh-sua-tai-khoan':{
						if($_SESSION['tangkinhcac_loai'] == 0){
							$req = array(
								'user_name'=>$_POST['user_name'],
								'email'=>$_POST['email'],
								'phone'=>$_POST['phone'],
								'type_account'=>$_POST['type_account']
							);
							$this->Controller("QuanTri_Controller")->XuLyChinhSuaTaiKhoan($req);
						}
						else{
							$this->Controller("QuanTri_Controller")->Error();
						}
						
						break;
					}

					case 'thong-tin-tai-khoan':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->FormThongTinTaiKhoan();
						}
						
						break;
					}

					case 'doi-mat-khau':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->FormDoiMatKhau();
						}
						
						break;
					}

					case 'xu-ly-doi-mat-khau':{
						$req = array(
							"user_name"=>$_SESSION['tangkinhcac_user'],
							"MatKhauCu"=>sha1($_POST['MatKhauCu']),
							"MatKhauMoi"=>sha1($_POST['MatKhauMoi'])
						);

						$this->Controller("QuanTri_Controller")->XuLyDoiMatKhau($req);
						break;
					}

					case 'doi-ten-hien-thi':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->FormDoiTenHienThi();
						}
						
						break;
					}

					case 'xu-ly-doi-ten-hien-thi':{
						$req = array(
							"user_name"=>$_SESSION['tangkinhcac_user'],
							"display_name"=>$_POST['TenHienThi']
						);

						$this->Controller("QuanTri_Controller")->XuLyDoiTenHienThi($req);
						break;
					}

					case 'danh-sach-the-loai':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->DanhSachTheLoai();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'chinh-sua-the-loai':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->ChinhSuaTheLoai(array('id'=>$_GET['id']));
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'xu-ly-chinh-sua-the-loai':{
						if($_SESSION['tangkinhcac_loai'] == 0){
							$req = array(
								'title'=>addslashes($_POST['TenTheLoai']),
								'id'=>$_POST['id']
							);
							$this->Controller("QuanTri_Controller")->XuLyChinhSuaTheLoai($req);
						}
						else{
							$this->Controller("QuanTri_Controller")->Error();
						}
						
						break;
					}

					case 'them-the-loai':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->FormThemTheLoai();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'xu-ly-them-the-loai':{
						if($_SESSION['tangkinhcac_loai'] == 0){
							$req = array(
								'title'=>addslashes(ucwords($_POST['TenTheLoai']))
							);
							$this->Controller("QuanTri_Controller")->XuLyThemTheLoai($req);
						}
						else{
							$this->Controller("QuanTri_Controller")->Error();
						}
						
						break;
					}

					case 'dang-truyen':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->FormDangTruyen();
						}
						
						break;
					}

					case 'xu-ly-dang-truyen':{
						require_once "./libs/functions.php";
						if(isset($_POST['DeCu']))
							$decu = 1;
						else
							$decu = 0;

						$the_loai = array();

						for($i = 1; $i <= $_SESSION['tangkinhcac_the_loai']; $i++){ 
							if(isset($_POST[$i])){
								$the_loai[$i] = $_POST[$i];
							}
						}

						$req = array(
							'title'=>addslashes(FormatText(ucwords($_POST['title']))),
							'title_u'=>utf8convert(FormatText2($_POST['title'])),
							'img'=>addslashes($_POST['img']),
							'thumb'=>addslashes($_POST['thumb']),
							'author'=>addslashes($_POST['author']),
							'type'=>$_POST['loai-truyen'],
							'status'=>$_POST['status'],
							'review'=>addslashes($_POST['review']),
							'source'=>addslashes($_POST['source']),
							'de_cu'=>$decu,
							'user_post'=>$_SESSION['tangkinhcac_user'],
							'theloai'=>$the_loai
						);
						

						$this->Controller("QuanTri_Controller")->XuLyDangTruyen($req);
						break;
					}

					case 'sua-truyen':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$req = array(
								'title_u'=>$_GET['title']
							);
							$this->Controller("QuanTri_Controller")->SuaTruyen($req);
						}
						
						break;
					}

					case 'xu-ly-sua-truyen':{
						require_once "./libs/functions.php";
						if(isset($_POST['DeCu']))
							$decu = 1;
						else
							$decu = 0;

						$the_loai = array();

						for($i = 1; $i <= $_SESSION['tangkinhcac_the_loai']; $i++){ 
							if(isset($_POST[$i])){
								$the_loai[$i] = $_POST[$i];
							}
						}

						$req = array(
							'id'=>$_POST['id'],
							'title_u_cu'=>$_POST['title_u_cu'],
							'title'=>addslashes(ucwords($_POST['title'])),
							'title_u'=>utf8convert(FormatText2(addslashes($_POST['title']))),
							'img'=>addslashes($_POST['img']),
							'thumb'=>addslashes($_POST['thumb']),
							'author'=>addslashes($_POST['author']),
							'type'=>$_POST['loai-truyen'],
							'status'=>$_POST['status'],
							'review'=>addslashes($_POST['review']),
							'source'=>addslashes($_POST['source']),
							'de_cu'=>$decu,
							'theloai'=>$the_loai
						);

						$this->Controller("QuanTri_Controller")->XuLySuaTruyen($req);
						break;
					}

					case 'truyen-cua-toi':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$req = array(
								'user_post'=>$_SESSION['tangkinhcac_user']
							);
							$this->Controller("QuanTri_Controller")->TruyenCuaToi($req);
						}
						
						break;
					}

					case 'them-chuong':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$req = array(
								'title_u'=>$_GET['title']
							);
							$this->Controller("QuanTri_Controller")->ThemChuong($req);
						}
						
						break;
					}

					case 'xu-ly-them-chuong':{
						require_once "./libs/functions.php";
						$req = array(
							'title'=>addslashes(FormatText(ucwords($_POST['chap_title']))),
							'title_u'=>utf8convert(FormatText2(ucwords($_POST['chap_title']))),
							'num_chap'=>$_POST['chap_num'],
							'content'=>$_POST['content'],
							'id_truyen'=>$_POST['id'],
							'title_curr'=>$_POST['title_curr']
						);
						$this->Controller("QuanTri_Controller")->XuLyThemChuong($req);
						break;
					}

					case 'danh-sach-chuong':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$req = array(
								'title_u'=>$_GET['title']
							);
							$this->Controller("QuanTri_Controller")->DanhSachChuong($req);
						}
						
						break;
					}

					case 'sua-chuong':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$req = array(
								'id'=>$_GET['id']
							);
							$this->Controller("QuanTri_Controller")->SuaChuong($req);
						}
						
						break;
					}

					case 'xu-ly-sua-chuong':{
						require_once "./libs/functions.php";

						$luu_va_sua = 0;

						if(isset($_POST['luu-va-chinh-sua']))
							$luu_va_sua = 1;

						$req = array(
							'title'=>addslashes(FormatText(ucwords($_POST['chap_title']))),
							'title_u'=>utf8convert(FormatText2(ucwords($_POST['chap_title']))),
							'num_chap'=>$_POST['chap_num'],
							'content'=>$_POST['content'],
							'id'=>$_POST['id'],
							'id_truyen'=>$_POST['id_truyen'],
							'luu_va_sua'=>$luu_va_sua
						);
						$this->Controller("QuanTri_Controller")->XuLySuaChuong($req);
						break;
					}

					case 'tat-ca-truyen':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
								if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->TatCaTruyen();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'truyen-moi-tao':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->TruyenMoiTaoHomNay();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'tai-khoan-moi-tao':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->TaiKhoanMoiTaoHomNay();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'huong_dan':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->TrangHuongDan();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}
						
						break;
					}

					case 'xu-ly-huong_dan':{
						$req = array(
							'content'=>$_POST['content']
						);
						$this->Controller("QuanTri_Controller")->XuLyTrangHuongDan($req);
						break;
					}

					case 'cai-dat':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							if($_SESSION['tangkinhcac_loai'] == 0){
								$this->Controller("QuanTri_Controller")->CaiDat();
							}
							else{
								$this->Controller("QuanTri_Controller")->Error();
							}
						}

						break;
					}

					case 'xu-ly-cai-dat':{
						$this->Controller("QuanTri_Controller")->XuLyCaiDat();
						break;
					}

					case 'van-de-phat-sinh':{
						if(!isset($_SESSION['tangkinhcac_user'])){
							header('location: dang-nhap');
						}
						else{
							$this->Controller("QuanTri_Controller")->VanDePhatSinh();
						}
						
						break;
					}

					case 'chi-tiet-truyen':{
						$req = array(
							'title_u'=>addslashes($_GET['title'])
						);
						$this->Controller("QuanTri_Controller")->ChiTietTruyen($req);
						break;
					}

					case 'xu-ly-khoa-chuong':{
						$req = array(
							'id'=>$_GET['id']
						);
						$this->Controller("QuanTri_Controller")->XuLyKhoaChuong($req);
						break;
					}


					/* 
					*	NHỮNG THỨ LIÊN QUAN TỚI AJAX
					*/

					//Ajax update thông số tài khoản
					case 'ajax-update':{
						$this->Controller("AjaxUpdate_Controller")->UpdateThongSoTaiKhoan();
						break;
					}

					//Ajax khóa tài khoản
					case 'ajax-khoa-tai-khoan':{
						$this->Controller("AjaxUpdate_Controller")->KhoaTaiKhoan(array('user_name'=>$_POST['TenDangNhap']));
						break;
					}

					//Ajax xóa tài khoản
					case 'ajax-xoa-tai-khoan':{
						$this->Controller("AjaxUpdate_Controller")->XoaTaiKhoan(array('user_name'=>$_POST['TenDangNhap']));
						break;
					}

					//Ajax tìm kiếm tài khoản đang mở
					case 'ajax-tim-tai-khoan-dang-mo':{
						$req = array(
							'key'=>addslashes($_POST['key'])
						);
						$this->Controller("AjaxUpdate_Controller")->TimTaiKhoanDangMo($req);
						break;
					}

					//Ajax tìm kiếm tài khoản bị khóa
					case 'ajax-tim-tai-khoan-bi-khoa':{
						$req = array(
							'key'=>addslashes($_POST['key'])
						);
						$this->Controller("AjaxUpdate_Controller")->TimTaiKhoanBiKhoa($req);
						break;
					}

					//Ajax tìm kiếm tài khoản bị xóa
					case 'ajax-tim-tai-khoan-bi-xoa':{
						$req = array(
							'key'=>addslashes($_POST['key'])
						);
						$this->Controller("AjaxUpdate_Controller")->TimTaiKhoanBiXoa($req);
						break;
					}

					//Ajax xóa thể loại truyện
					case 'ajax-xoa-the-loai':{
						$req = array(
							'id'=>$_POST['id']
						);
						$this->Controller("QuanTri_Controller")->XoaTheLoai($req);
						break;
					}

					//Ajax xóa chương
					case 'ajax-xoa-chuong':{
						$req = array(
							'id'=>$_POST['id'],
							'id_truyen'=>$_POST['id_truyen']
						);
						$this->Controller("AjaxUpdate_Controller")->XoaChuong($req);
						break;
					}

					//Ajax tìm chương
					case 'ajax-tim-chuong-quan-tri':{
						$req = array(
							'key'=>addslashes($_POST['key']),
							'id_truyen'=>$_POST['id_truyen'],
							'title_u'=>$_POST['title_u']
						);
						$this->Controller("AjaxUpdate_Controller")->TimChuong($req);
						break;
					}

					//Ajax tìm truyện
					case 'ajax-tim-truyen-cua-toi':{
						$req = array(
							'key'=>addslashes($_POST['key']),
							'user_post'=>$_SESSION['tangkinhcac_user']
						);
						$this->Controller("AjaxUpdate_Controller")->TimTruyenCuaToi($req);
						break;
					}

					//Ajax tìm truyện
					case 'ajax-tim-truyen-admin':{
						$req = array(
							'key'=>addslashes($_POST['key'])
						);
						$this->Controller("AjaxUpdate_Controller")->TimTruyenAdmin($req);
						break;
					}

					//Ajax xóa truyện
					case 'ajax-xoa-truyen':{
						$req = array(
							'id'=>addslashes($_POST['id'])
						);
						$this->Controller("AjaxUpdate_Controller")->XoaTruyen($req);
						break;
					}

					//Ajax thêm vào tủ sách
					case 'ajax-them-bookmark':{
						$this->Controller("AjaxUpdate_Controller")->ThemMarkBook($_POST['id']);
						break;
					}

					//Ajax xóa khỏi tủ sách
					case 'ajax-xoa-bookmark':{
						$this->Controller("AjaxUpdate_Controller")->XoaMarkBook($_POST['id']);
						break;
					}

					//Ajax thêm feedback
					case 'ajax-them-feedback':{
						$req = array(
							'content'=>$_POST['content'],
							'id_truyen'=>$_POST['id']
						);
						$this->Controller("AjaxUpdate_Controller")->ThemFeedBack($req);
						break;
					}

					//Ajax lấy chương
					case 'ajax-lay-chuong':{
						$req = array(
							'tu_chuong'=>$_POST['tu_chuong'],
							'id_truyen'=>$_POST['id'],
							'title'=>$_POST['title']
						);
						$this->Controller("AjaxUpdate_Controller")->LayChuong($req);
						break;
					}

					//Ajax
					case 'ajax-update-bao-tri':{
						if($_SESSION['tangkinhcac_user'] == 0){
							$this->Controller("AjaxUpdate_Controller")->UpdateBaoTri();
						}
						else{
							$this->Controller("QuanTri_Controller")->Error();
						}
						
						break;
					}

					//Ajax
					case 'ajax-update-cay-views':{
						if($_SESSION['tangkinhcac_user'] == 0){
							$this->Controller("AjaxUpdate_Controller")->UpdateCayViews();
						}
						else{
							$this->Controller("QuanTri_Controller")->Error();
						}
						
						break;
					}

					//Ajax đã fix lỗi
					case 'ajax-da-fix-loi':{
						$this->Controller("AjaxUpdate_Controller")->DaFixLoi($_POST['id']);
						
						break;
					}

					/* 
					*	NHỮNG THỨ LIÊN QUAN TỚI TRANG TRUYỆN NHƯ ĐỌC TRUYỆN, DANH SÁCH CHƯƠNG
					*/

					case 'truyen':{
						if(isset($_GET['title'])){
							$req = array(
								'title_u'=>addslashes($_GET['title'])
							);
							$this->Controller("TangKinhCac_Controller")->TrangTruyen($req);
						}
						else{
							$this->Controller("TangKinhCac_Controller")->Error();
						}
						
						break;
					}

					case 'doc-truyen':{
						$req = array(
							'title_truyen'=>addslashes($_GET['title']),
							'title_chuong'=>addslashes($_GET['title_chuong']),
							'id_chuong'=>$_GET['id_chuong']
						);
						$this->Controller("TangKinhCac_Controller")->DocTruyen($req);
						break;
					}

					case 'truyen-hot':{
						$this->Controller("TangKinhCac_Controller")->TruyenHOTT();
						break;
					}

					case 'truyen-dich':{
						$this->Controller("TangKinhCac_Controller")->TruyenDich();
						break;
					}

					case 'truyen-convert':{
						$this->Controller("TangKinhCac_Controller")->TruyenConvert();
						break;
					}

					case 'truyen-update':{
						$this->Controller("TangKinhCac_Controller")->TruyenUpdate();
						break;
					}

					case 'tu-sach':{
						if(isset($_SESSION['tangkinhcac_user'])){
							$this->Controller("TangKinhCac_Controller")->TuSach();
						}
						else{
							$this->Controller("TangKinhCac_Controller")->Error();
						}
						break;
					}

					case 'the-loai':{
						$this->Controller("TangKinhCac_Controller")->TheLoai($_GET['title']);
						break;
					}

					case 'tac-gia':{
						$this->Controller("TangKinhCac_Controller")->TacGia($_GET['title']);
						break;
					}

					case 'tat-ca-the-loai':{
						$this->Controller("TangKinhCac_Controller")->TatCaTheLoai();
						break;
					}

					case 'huong-dan-dang-truyen':{
						$this->Controller("TangKinhCac_Controller")->HuongDanDangTruyen();
						break;
					}
					
					default:
						$this->Controller("TangKinhCac_Controller")->TrangChu();
						break;
				}
			}
			
		}
	}
?>