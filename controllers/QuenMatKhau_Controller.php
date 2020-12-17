<?php  
	require_once "./models/TaiKhoan_Model.php"; 

	class QuenMatKhau_Controller{
		private $TaiKhoan;

		function __construct(){
			$this->TaiKhoan = new TaiKhoan_Model();
		}

		//gọi giao diện đăng nhập ra
		public function FormQuenMatKhau(){
			$this->view('QuenMatKhau');
		}

		//xủ lý đăng nhập
		public function XuLyQuenMatKhau($req){
			$res = $this->TaiKhoan->QuenMatKhau($req);

			if($res == 0){
				setcookie("error_message", "Bạn không phải chủ nhân tài khoản này!", time() + 2, "/");
				header('location: quen-mat-khau');
			}
			else{
				require_once './libs/functions.php';
				$pass = RandomCode();
				$hasPass = sha1($pass);

				$res2 = $this->TaiKhoan->XuLyQuenMatKhau(array('pass_word'=>$hasPass, 'user_name'=>$req['user_name']));

				if($res2 > 0){
					setcookie("message", $pass, time() + 2, "/");
					header('location: quen-mat-khau');
				}
				else{
					setcookie("error_message", $res2, time() + 2, "/");
					header('location: quen-mat-khau');
				}	
			}
		}


		public function view($view, $data=[]){
			require_once "./views/".$view.".php";
		}
	}
?>