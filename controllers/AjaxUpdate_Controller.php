<?php  
	require_once "./models/TaiKhoan_Model.php"; 
	require_once "./models/Record_Model.php"; 
	require_once "./models/TheLoai_Model.php"; 
	require_once "./models/Truyen_Model.php";
	require_once "./models/Chuong_Model.php";
	require_once "./models/TheLoaiTruyen_Model.php";
	require_once "./models/BookMark_Model.php";
	require_once "./models/FeedBack_Model.php";
	require_once "./models/Setting_Model.php";

	class AjaxUpdate_Controller{
		private $TaiKhoan;
		private $Record;
		private $TheLoai;
		private $Truyen;
		private $Chuong;
		private $TheLoaiTruyen;
		private $BookMark;
		private $FeedBack;
		private $Setting;

		function __construct(){
			$this->TaiKhoan = new TaiKhoan_Model();
			$this->Record = new Record_Model();
			$this->TheLoai = new TheLoai_Model();
			$this->Truyen = new Truyen_Model();
			$this->Chuong = new Chuong_Model();
			$this->TheLoaiTruyen = new TheLoaiTruyen_Model();
			$this->BookMark = new BookMark_Model();
			$this->FeedBack = new FeedBack_Model();
			$this->Setting = new Setting_Model();
		}

		public function UpdateThongSoTaiKhoan(){
			$_SESSION['tangkinhcac_taikhoan_mo'] = $this->TaiKhoan->SoLuongTaiKhoan_DangMo();
			$_SESSION['tangkinhcac_taikhoan_khoa'] = $this->TaiKhoan->SoLuongTaiKhoan_BiKhoa();
			$_SESSION['tangkinhcac_taikhoan_xoa'] = $this->TaiKhoan->SoLuongTaiKhoan_BiXoa();
			$_SESSION['tangkinhcac_the_loai'] = $this->TheLoai->SoLuongTheLoai();
			$_SESSION['tangkinhcac_truyencuatoi'] = $this->Truyen->SoLuongTruyenCuaToi(array('user_post'=>$_SESSION['tangkinhcac_user']));
			$_SESSION['tangkinhcac_tatcatruyen'] = $this->Truyen->SoLuongTatCaTruyen();
			$_SESSION['tangkinhcac_loi_truyen'] = $this->FeedBack->SoLuongFeedBack($_SESSION['tangkinhcac_user']);
		}

		public function KhoaTaiKhoan($req){
			echo $this->TaiKhoan->KhoaTaiKhoan($req);
			$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Chỉnh sủa [khóa] tài khoản '.$req['user_name']));
		}

		public function XoaTaiKhoan($req){
			echo $this->TaiKhoan->XoaTaiKhoan($req);
			$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Chỉnh sủa [xóa] tài khoản '.$req['user_name']));
		}

		public function TimTaiKhoanDangMo($req){
			if(strlen($req['key']) == 0){
				$this->view('tai_khoan_dang_mo',[
					'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_DangMo()
				]);
			}
			else{
				$this->view('tai_khoan_dang_mo',[
					'danhsach'=>$this->TaiKhoan->TimTaiKhoanDangMo($req)
				]);
			}
		}

		public function TimTaiKhoanBiKhoa($req){
			if(strlen($req['key']) == 0){
				$this->view('tai_khoan_bi_khoa',[
					'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_BiKhoa()
				]);
			}
			else{
				$this->view('tai_khoan_bi_khoa',[
					'danhsach'=>$this->TaiKhoan->TimTaiKhoanBiKhoa($req)
				]);
			}
		}

		public function TimTaiKhoanBiXoa($req){
			if(strlen($req['key']) == 0){
				$this->view('tai_khoan_bi_xoa',[
					'danhsach'=>$this->TaiKhoan->DanhSachTaiKhoan_BiXoa()
				]);
			}
			else{
				$this->view('tai_khoan_bi_xoa',[
					'danhsach'=>$this->TaiKhoan->TimTaiKhoanBiXoa($req)
				]);
			}
		}

		public function XoaChuong($req){
			echo $res = $this->Chuong->XoaChuong($req);

			if($res > 0){
				$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Xóa chương'));
				$this->Truyen->Update_DeleteChuong($req['id_truyen']);
			}
		}

		public function TimChuong($req){
			if(strlen($req['key']) == 0){
				$this->view('danh_sach_chuong',[
					'danhsach'=>$this->Chuong->DanhSachChuong($req['id_truyen']),
					'info'=>$this->Truyen->GetInfoTruyenByTitle($req['title_u'])
				]);
			}
			else{
				$this->view('danh_sach_chuong',[
					'danhsach'=>$this->Chuong->TimChuong($req),
					'info'=>$this->Truyen->GetInfoTruyenByTitle($req['title_u'])
				]);
			}
		}

		public function TimTruyenCuaToi($req){
			if(strlen($req['key']) == 0){
				$this->view('truyen_cua_toi',[
					'danhsach'=>$this->Truyen->TruyenCuaToi($req)
				]);
			}
			else{
				$this->view('truyen_cua_toi',[
					'danhsach'=>$this->Truyen->TimTruyenCuaToi($req)
				]);
			}
		}

		public function TimTruyenAdmin($req){
			if(strlen($req['key']) == 0){
				$this->view('danh_sach_truyen',[
					'danhsach'=>$this->Truyen->TatCaTruyen()
				]);
			}
			else{
				$this->view('danh_sach_truyen',[
					'danhsach'=>$this->Truyen->TimTruyenAdmin($req)
				]);
			}
		}

		public function XoaTruyen($req){
			$this->Chuong->XoaChuong_Admin($req);
			$this->FeedBack->XoaFeedBack($req['id']);
			$this->BookMark->XoaBookAdmin($req['id']);
			$this->TheLoaiTruyen->Xoa_Admin($this->Truyen->GetTitleByID($req['id'])['title_u']);
			$this->Truyen->XoaTruyen($req);
			echo 'Delete Success';
			$this->Record->ThemRecord(array('user_name'=>$_SESSION['tangkinhcac_user'], 'action'=>'Xóa truyện'));
		}

		public function ThemMarkBook($id){
			$req = array(
				'id_truyen'=>$id,
				'user_name'=>$_SESSION['tangkinhcac_user']
			);
			echo $this->BookMark->ThemBook($req);
		}

		public function XoaMarkBook($id){
			$req = array(
				'id_truyen'=>$id,
				'user_name'=>$_SESSION['tangkinhcac_user']
			);
			echo $this->BookMark->XoaBook($req);
		}

		public function ThemFeedBack($req){
			echo $this->FeedBack->ThemFeedBack($req);	
		}

		public function LayChuong($req){
			$this->view('lay_chuong',[
				'25_chuong'=>$this->Chuong->AjaxLayChuong($req),
				'title'=>$req['title']
			]);
		}

		public function UpdateBaoTri(){
			echo $this->Setting->UpdateBaoTri();
		}

		public function UpdateCayViews(){
			echo $this->Setting->UpdateCayViews();
		}

		public function DaFixLoi($id){
			echo $this->FeedBack->DaFixLoi($id);
		}

		public function view($view, $data=[]){
			require_once "./views/ajax/".$view.".php";
		}
	}
?>