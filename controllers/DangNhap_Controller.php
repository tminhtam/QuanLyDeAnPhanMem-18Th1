<?php  
	require_once "./models/TaiKhoan_Model.php"; 
	require_once "./models/Record_Model.php"; 
	require_once "./models/TheLoai_Model.php"; 
	require_once "./models/Truyen_Model.php";
	require_once "./models/FeedBack_Model.php";

	class DangNhap_Controller{
		private $TaiKhoan;
		private $Record;
		private $TheLoai;
		private $Truyen;
		private $FeedBack;

		function __construct(){
			$this->TaiKhoan = new TaiKhoan_Model();
			$this->Record = new Record_Model();
			$this->TheLoai = new TheLoai_Model();
			$this->Truyen = new Truyen_Model();
			$this->FeedBack = new FeedBack_Model();
		}

		//gọi giao diện đăng nhập ra
		public function FormDangNhap(){
			$this->view('dangnhap');
		}

		//xủ lý đăng nhập
		public function XuLyDangNhap($req){
			$res = $this->TaiKhoan->DangNhap($req);

			if($res == false){
				setcookie("error_message", "Tên đăng nhập hoặc mật khẩu không đúng", time() + 2, "/");
				header('location: dang-nhap');
			}
			else{
				if($res['lock_account'] == 0){
					setcookie("error_message", "Tài khoản [<b>".$req['user_name']."</b>] đã bị khóa!", time() + 2, "/");
					header('location: dang-nhap');
				}
				else if($res['delete_account'] == 0){
					setcookie("error_message", "Tài khoản [<b>".$req['user_name']."</b>] đã bị xóa!", time() + 2, "/");
					header('location: dang-nhap');
				}
				else{
					$this->Record->ThemRecord(array('user_name'=>$req['user_name'], 'action'=>'Đăng nhập'));

					$_SESSION['tangkinhcac_user'] = $req['user_name'];
					$_SESSION['tangkinhcac_ten_hien_thi'] = $res['display_name'];
					$_SESSION['tangkinhcac_loai'] = $res['type_account'];
					$_SESSION['tangkinhcac_sdt'] = $res['phone'];
					$_SESSION['tangkinhcac_mail'] = $res['email'];
					$_SESSION['tangkinhcac_date_create'] = $res['date_create'];
					// setcookie("tangkinhcac_user", $req['user_name'], time() + 7776000, "/");
					// setcookie("tangkinhcac_ten_hien_thi", $res['display_name'], time() + 7776000, "/");


					//QuanTri
					$_SESSION['tangkinhcac_taikhoan_mo'] = $this->TaiKhoan->SoLuongTaiKhoan_DangMo();
					$_SESSION['tangkinhcac_taikhoan_khoa'] = $this->TaiKhoan->SoLuongTaiKhoan_BiKhoa();
					$_SESSION['tangkinhcac_taikhoan_xoa'] = $this->TaiKhoan->SoLuongTaiKhoan_BiXoa();
					$_SESSION['tangkinhcac_the_loai'] = $this->TheLoai->SoLuongTheLoai();
					$_SESSION['tangkinhcac_truyencuatoi'] = $this->Truyen->SoLuongTruyenCuaToi(array('user_post'=>$_SESSION['tangkinhcac_user']));
					$_SESSION['tangkinhcac_tatcatruyen'] = $this->Truyen->SoLuongTatCaTruyen();
					$_SESSION['tangkinhcac_loi_truyen'] = $this->FeedBack->SoLuongFeedBack($_SESSION['tangkinhcac_user']);

					header('location: bang-dieu-khien');
				}
			}
		}


		public function view($view, $data=[]){
			require_once "./views/".$view.".php";
		}
	}
?>