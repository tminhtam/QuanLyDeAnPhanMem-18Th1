<?php  require_once "./models/TaiKhoan_Model.php";

	class TaoTaiKhoan_Controller{
		private $TaiKhoan;

		function __construct(){
			$this->TaiKhoan = new TaiKhoan_Model();
		}

		//gọi trang đăng ký tài khoản
		public function FormDangKy(){
			$this->view('dangky');
		}

		//Ajax kiểm tra tài khoản đã tồn tại hay chưa
		public function KiemTraTaiKhoan($req){
			echo $this->TaiKhoan->CheckUser($req);
		}

		public function XuLyTaoTaiKhoan($req){
			$res = $this->TaiKhoan->ThemTaiKhoan($req);

			if($result < 0){
				setcookie("error_message", $result, time() + 2, "/");
				header('location: dang-ky');
			}
			else{
				setcookie("message", "Tạo tài khoản [<b>".$req['user_name']."</b>] thành công! <br>Bây giờ bạn đã có thể đăng nhập!", time() + 2, "/");
				header('location: dang-nhap');
			}
		}

		//gọi giao diện ra ngoài
		public function view($view, $data=[]){
			require_once "./views/".$view.".php";
		}
	}
?>