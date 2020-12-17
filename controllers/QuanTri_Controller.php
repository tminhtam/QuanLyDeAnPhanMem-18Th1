<?php  
	require_once "./models/TaiKhoan_Model.php"; 
	require_once "./models/Record_Model.php"; 
	require_once "./models/TheLoai_Model.php"; 
	require_once "./models/Truyen_Model.php";
	require_once "./models/TheLoaiTruyen_Model.php";
	require_once "./models/Chuong_Model.php";
	require_once "./models/HuongDan_Model.php";
	require_once "./models/Setting_Model.php";
	require_once "./models/FeedBack_Model.php";

	class QuanTri_Controller{
		private $QuanTri;
		private $TaiKhoan;
		private $Record;
		private $TheLoai;
		private $Truyen;
		private $TheLoaiTruyen;
		private $Chuong;
		private $HuongDan;
		private $Setting;
		private $FeedBack;

		function __construct(){
			$this->TaiKhoan = new TaiKhoan_Model();
			$this->Record = new Record_Model();
			$this->TheLoai = new TheLoai_Model();
			$this->Truyen = new Truyen_Model();
			$this->TheLoaiTruyen = new TheLoaiTruyen_Model();
			$this->Chuong = new Chuong_Model();
			$this->HuongDan = new HuongDan_Model();
			$this->Setting = new Setting_Model();
			$this->FeedBack = new FeedBack_Model();
		}

		public function view($view, $data=[]){
			require_once "./views/".$view.".php";
		}

		public function BangDieuKhien(){
			$this->view('admin',[
				'trang'=>'bang_dieu_khien',
				'truyen_moi_tao'=>$this->Truyen->TruyenMoiTaoHomNay(),
				'tat_ca_tai_khoan'=>$this->TaiKhoan->SoLuongTatCaTaiKhoan(),
				'tai_khoan_moi_tao'=>$this->TaiKhoan->SoLuongTaiKhoanMoiTao(),
				'ban_ghi'=>$this->Record->DocRecord($_SESSION['tangkinhcac_user']),
				'truyen_moi_cap_nhat'=>$this->Truyen->TruyenMoiUpdate_1($_SESSION['tangkinhcac_user']),
				'loi_truyen'=>$this->FeedBack->DanhSachFeedBack($_SESSION['tangkinhcac_user'])
			]);
		}

		public function DanhSachTaiKhoanDangMo(){
			$this->view('admin',[
				'trang'=>'tai_khoan_dang_mo',
				'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_DangMo()
			]);
		}

		public function DanhSachTaiKhoanBiKhoa(){
			$this->view('admin',[
				'trang'=>'tai_khoan_bi_khoa',
				'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_BiKhoa()
			]);
		}

		public function DanhSachTaiKhoanBiXoa(){
			$this->view('admin',[
				'trang'=>'tai_khoan_bi_xoa',
				'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_BiXoa()
			]);
		}

		public function FormChinhSuaTaiKhoan($req){
			$this->view('admin',[
				'trang'=>'chinh_sua_tai_khoan',
				'ChiTiet'=>$this->TaiKhoan->LayThongTinTaiKhoanChinhSua_Admin($req)
			]);
		}

		public function XuLyChinhSuaTaiKhoan($req){
			$res = $this->TaiKhoan->ChinhSuaTaiKhoan_Admin($req);

			if($res > 0){
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Chỉnh sửa tài khoản '.$req['user_name']));
				header('location: tai-khoan-dang-mo');
			}
			else{
				setcookie("error_message", "Bạn chưa thay đổi trường nào cả!", time() + 2, "/");
				header('location: chinh-sua-tai-khoan/'.$req['user_name']);
			}
		}

		public function FormThongTinTaiKhoan(){
			$this->view('admin',[
				'trang'=>'thong_tin_tai_khoan'
			]);
		}

		public function FormDoiMatKhau(){
			$this->view('admin',[
				'trang'=>'doi_mat_khau'
			]);
		}

		public function XuLyDoiMatKhau($req){
			$res = $this->TaiKhoan->ThayDoiMatKhau($req);

			if($res > 0){
				$this->Record->ThemRecord(array("user_name"=>$req['user_name'], "action"=>"Đổi mật khẩu"));
				setcookie("message", "Đổi mật khẩu thành công!", time() + 2, "/");
				header('location: doi-mat-khau');
			}
			else{
				setcookie("error_message", "Đổi mật khẩu thất bại [<b>Mật khẩu cũ không đúng</b>]!", time() + 2, "/");
				header('location: doi-mat-khau');
			}
		}

		public function FormDoiTenHienThi(){
			$this->view('admin',[
				'trang'=>'doi_ten_hien_thi'
			]);
		}

		public function XuLyDoiTenHienThi($req){
			$res = $this->TaiKhoan->DoiTenHienThi($req);

			if($res > 0){
				$this->Record->ThemRecord(array("user_name"=>$_SESSION['tangkinhcac_user'], "action"=>"Đổi tên hiển thị"));
				setcookie("message", "Đổi tên hiển thị thành công!", time() + 2, "/");
				$_SESSION['tangkinhcac_ten_hien_thi'] = $req['display_name'];
				header('location: doi-ten-hien-thi');
			}
			else{
				setcookie("error_message", "Đổi tên hiển thị thất bại [<b>Mật khẩu cũ không đúng</b>]!", time() + 2, "/");
				header('location: doi-ten-hien-thi');
			}
		}

		public function DanhSachTheLoai(){
			$this->view('admin',[
				'trang'=>'the_loai',
				'danhsach'=>$this->TheLoai->DanhSachTheLoai()
			]);
		}

		//Ajax xóa thể loại
		public function XoaTheLoai($req){
			echo $this->TheLoai->XoaTheLoai($req);
		}

		public function ChinhSuaTheLoai($req){
			$this->view('admin',[
				'trang'=>'chinh_sua_the_loai',
				'TheLoai'=>$this->TheLoai->LayChiTietTheLoai($req)
			]);
		}

		public function XuLyChinhSuaTheLoai($req){
			$res = $this->TheLoai->ChinhSuaTheLoai($req);

			if($res > 0){
				header('location: danh-sach-the-loai');
			}
			else{
				setcookie("error_message", "Bạn vẫn chưa thay đổi!", time() + 2, "/");
				header('location: chinh-sua-the-loai/'.$req['id']);
			}
		}

		public function FormThemTheLoai(){
			$this->view('admin',[
				'trang'=>'them_the_loai'
			]);
		}

		public function XuLyThemTheLoai($req){
			$res = $this->TheLoai->ThemTheLoai($req);

			if($res > 0){
				$_SESSION['tangkinhcac_the_loai'] = $this->TheLoai->SoLuongTheLoai();
				header('location: danh-sach-the-loai');
			}
			else{
				setcookie("error_message", "Tên thể loại bị trùng!", time() + 2, "/");
				header('location: them-the-loai');
			}
		}

		public function FormDangTruyen(){
			$this->view('admin',[
				'trang'=>'tao_truyen',
				'tag'=>$this->TheLoai->DanhSachTheLoai()
			]);
		}

		public function XuLyDangTruyen($req){
			$res = $this->Truyen->ThemTruyen($req);

			if($res > 0){
				for ($i = 1; $i <= $_SESSION['tangkinhcac_the_loai']; $i++) { 
					if(isset($req['theloai'][$i])){
						$this->TheLoaiTruyen->ThemTheLoaiTruyen(array('title_theloai'=>$req['theloai'][$i], 'title_truyen'=>$req['title_u']));
					}
				}

				$_SESSION['tangkinhcac_tatcatruyen'] = $this->Truyen->SoLuongTatCaTruyen();
				$_SESSION['tangkinhcac_truyencuatoi'] = $this->Truyen->SoLuongTruyenCuaToi(array('user_post'=>$_SESSION['tangkinhcac_user']));
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Tạo truyện '.$req['title']));
				header('location: truyen-cua-toi');
			}
			else{
				setcookie("error_message", "Truyện [<b>".$req['title']."</b>] đã tồn tại!", time() + 2, "/");
				//header('location: '.$_SERVER["HTTP_REFERER"]);
				echo '<script>javascript:history.go(-1)</script>';
			}
		}

		public function TruyenCuaToi($req){
			$this->view('admin',[
				'trang'=>'truyen_cua_toi',
				'danhsach'=>$this->Truyen->TruyenCuaToi($req)
			]);
		}

		public function SuaTruyen($req){
			$this->view('admin',[
				'trang'=>'sua_truyen',
				'truyen'=>$this->Truyen->LayChiTietTruyen($req),
				'tag'=>$this->TheLoai->DanhSachTheLoai(),
				'tag_truyen'=>$this->TheLoaiTruyen->LayTheLoaiCua1Truyen($req)
			]);
		}

		public function XuLySuaTruyen($req){
			$this->TheLoaiTruyen->Xoa($req);
			$res = $this->Truyen->SuaTruyen($req);

			if($res === 'error'){
				if(count($req['theloai']) > 0){
					for ($i = 1; $i <= $_SESSION['tangkinhcac_the_loai']; $i++) { 
						if(isset($req['theloai'][$i])){
							$this->TheLoaiTruyen->ThemTheLoaiTruyen(array('title_theloai'=>$req['theloai'][$i], 'title_truyen'=>$req['title_u_cu']));
						}
					}
				}
				setcookie("error_message", "Truyện [<b>".$req['title']."</b>] đã tồn tại!", time() + 2, "/");
				echo '<script>javascript:history.go(-1)</script>';
			}
			else{
				if(count($req['theloai']) > 0){
					for ($i = 1; $i <= $_SESSION['tangkinhcac_the_loai']; $i++) { 
						if(isset($req['theloai'][$i])){
							$this->TheLoaiTruyen->ThemTheLoaiTruyen(array('title_theloai'=>$req['theloai'][$i], 'title_truyen'=>$req['title_u']));
						}
					}
				}
				
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Sửa truyện '.$req['title']));
				header('location: truyen-cua-toi');
			}
		}

		public function ThemChuong($req){
			$this->view('admin',[
				'trang'=>'them_chuong',
				'truyen'=>$this->Truyen->LayChiTietTruyen($req)
			]);
		}

		public function XuLyThemChuong($req){
			$res = $this->Chuong->ThemChuong($req);

			if($res > 0){
				$this->Truyen->Update_InsertChuong($req['id_truyen']);
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Thêm chương '.$req['title']));
				header('location: danh-sach-chuong/'.$req['title_curr']);
			}
			else{
				setcookie("error_message", $res, time() + 2, "/");
				echo '<script>javascript:history.go(-1)</script>';
			}
		}

		public function DanhSachChuong($req){

			$this->view('admin',[
				'trang'=>'danh_sach_chuong',
				'danhsach'=>$this->Chuong->DanhSachChuong($this->Truyen->GetInfoTruyenByTitle($req['title_u'])['id']),
				'info'=>$this->Truyen->GetInfoTruyenByTitle($req['title_u'])
			]);
		}

		public function SuaChuong($req){
			$this->view('admin',[
				'trang'=>'sua_chuong',
				'chuong'=>$this->Chuong->LayChiTietChuong($req)
			]);
		}

		public function XuLySuaChuong($req){
			$res = $this->Chuong->SuaChuong($req);

			if($res > 0){
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Sửa chương '.$req['title']));
				if($req['luu_va_sua'] == 0)
					header('location: danh-sach-chuong/'.$this->Truyen->GetTitleByID($req['id_truyen'])['title_u']);
				else
					header('location: sua-chuong/'.$req['id']);
			}
			else{
				setcookie("error_message", "Bạn chua thay đổi gì cả!", time() + 2, "/");
				echo '<script>javascript:history.go(-1)</script>';
			}
		}

		public function TatCaTruyen(){
			$this->view('admin',[
				'trang'=>'tat_ca_truyen',
				'danhsach'=>$this->Truyen->TatCaTruyen()
			]);
		}

		public function Error(){
			$this->view('admin',[
				'trang'=>'error'
			]);
		}

		public function TruyenMoiTaoHomNay(){
			$this->view('admin',[
				'trang'=>'truyen_moi_tao_hom_nay',
				'danhsach'=>$this->Truyen->DanhSachTruyenMoiTaoHomNay()
			]);
		}

		public function TaiKhoanMoiTaoHomNay(){
			$this->view('admin',[
				'trang'=>'tai_khoan_moi_tao_hom_nay',
				'danhsach'=>$this->TaiKhoan->TaiKhoanMoiTaoHomNay()
			]);
		}

		public function TrangHuongDan(){
			$this->view('admin',[
				'trang'=>'trang_huong_dan',
				'huongdan'=>$this->HuongDan->DocHuongDan()
			]);
		}

		public function XuLyTrangHuongDan($req){
			$res = $this->HuongDan->SuaHuongDan($req);

			if($res >= 0){
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Sửa trang hướng dẫn'));
				setcookie("message", "Chỉnh sủa trang hướng dẫn thành công!", time() + 2, "/");
				header('location: huong_dan');
			}
			else{
				setcookie("error_message", $res, time() + 2, "/");
				echo '<script>javascript:history.go(-1)</script>';
			}
		}

		public function CaiDat(){
			$Data_setting = $this->Setting->DocSetting();
			$cay_views;
			$bao_tri;

			foreach ($Data_setting as $value) {
				if($value['name_setting'] == 'bao-tri'){
					$bao_tri = $value['action'];
				}
				else if($value['name_setting'] == 'cay-views'){
					$cay_views = $value['action'];
				}
			}

			$this->view('admin',[
				'trang'=>'cai_dat',
				'baoTri'=>$bao_tri,
				'cayViews'=>$cay_views
			]);
		}

		public function VanDePhatSinh(){
			$this->view('admin',[
				'trang'=>'van_de_phat_sinh',
				'loi_truyen'=>$this->FeedBack->DanhSachFeedBack($_SESSION['tangkinhcac_user'])
			]);
		}

		public function ChiTietTruyen($req){
			$this->view('admin',[
				'trang'=>'chi_tiet_truyen',
				'detail'=>$this->Truyen->LayChiTietTruyen($req),
				'danhsach'=>$this->Chuong->DanhSachChuong($this->Truyen->GetInfoTruyenByTitle($req['title_u'])['id']),
				'info'=>$this->Truyen->GetInfoTruyenByTitle($req['title_u'])
			]);
		}

		public function XuLyKhoaChuong($req){
			$res = $this->Chuong->KhoaChuong($req);

			if($res > 0){
				echo '<script>window.history.back();</script>';
			}
			else{
				setcookie("message", $res, time() + 2, "/");
				echo '<script>window.history.back();</script>';
			}
		}		
	}
?>