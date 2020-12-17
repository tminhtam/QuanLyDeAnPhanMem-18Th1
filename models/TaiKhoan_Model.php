<?php  require_once "./models/dbCon.php";
	class TaiKhoan_Model{
		private $TaiKhoan;

		function __construct(){
			$this->TaiKhoan = new dbCon();
			$this->TaiKhoan = $this->TaiKhoan->KetNoi();
		}

		//Ajax kiểm tra xem tên đăng nhập đã tồn tại hay chưa
		public function CheckUser($req){
			try{
				$qr = "SELECT user_name FROM taikhoan WHERE user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ThemTaiKhoan($req){
			try{
				$qr = "INSERT INTO taikhoan(user_name, pass_word, display_name, type_account, lock_account, delete_account, phone, email, date_create) 
						VALUES (:user_name, :pass_word, :display_name, 1, 1, 1, :phone, :email, CURDATE())";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":pass_word", $req['pass_word']);
				$cmd->bindValue(":display_name", $req['display_name']);
				$cmd->bindValue(":phone", $req['phone']);
				$cmd->bindValue(":email", $req['email']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DangNhap($req){
			try{
				$qr = "SELECT * FROM taikhoan WHERE user_name = :user_name AND pass_word = :pass_word";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":pass_word", $req['pass_word']);
				$cmd->execute();
				
				if($cmd->rowCount() > 0){
					return $cmd->fetch();
				}
				else{
					return false;
				}	
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTaiKhoan_DangMo(){
			try{
				$qr = "SELECT user_name FROM taikhoan WHERE lock_account != 0 AND delete_account != 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTaiKhoan_BiKhoa(){
			try{
				$qr = "SELECT user_name FROM taikhoan WHERE lock_account LIKE 0 AND delete_account != 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTaiKhoan_BiXoa(){
			try{
				$qr = "SELECT user_name FROM taikhoan WHERE lock_account != 0 AND delete_account LIKE 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTaiKhoan_DangMo(){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account != 0 AND delete_account != 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTaiKhoan_BiKhoa(){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account LIKE 0 AND delete_account != 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTaiKhoan_BiXoa(){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account != 0 AND delete_account LIKE 0";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayThongTinTaiKhoanChinhSua_Admin($req){
			try{
				$qr = "SELECT type_account, email, phone FROM taikhoan WHERE user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ChinhSuaTaiKhoan_Admin($req){
			try{
				$qr = "UPDATE taikhoan SET type_account = :type_account, phone = :phone, email = :email WHERE user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":type_account", $req['type_account']);
				$cmd->bindValue(":phone", $req['phone']);
				$cmd->bindValue(":email", $req['email']);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		//ajax gọi tới
		public function KhoaTaiKhoan($req){
			try{
				$qr = "UPDATE taikhoan SET lock_account = NOT lock_account WHERE user_name = :user_name";

				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		//ajax gọi tới
		public function XoaTaiKhoan($req){
			try{
				$qr = "UPDATE taikhoan SET delete_account = NOT delete_account WHERE user_name = :user_name";

				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		//ajax gọi tới
		public function TimTaiKhoanDangMo($req){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account != 0 AND delete_account != 0 AND ( user_name REGEXP :key OR display_name REGEXP :key )";

				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		//ajax gọi tới
		public function TimTaiKhoanBiKhoa($req){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account LIKE 0 AND delete_account != 0 AND ( user_name REGEXP :key OR display_name REGEXP :key )";

				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		//ajax gọi tới
		public function TimTaiKhoanBiXoa($req){
			try{
				$qr = "SELECT * FROM taikhoan WHERE lock_account != 0 AND delete_account LIKE 0 AND ( user_name REGEXP :key OR display_name REGEXP :key )";

				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ThayDoiMatKhau($req){
			try{
				$qr = "UPDATE taikhoan SET pass_word = :MatKhauMoi WHERE pass_word = :MatKhauCu AND user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":MatKhauMoi", $req['MatKhauMoi']);
				$cmd->bindValue(":MatKhauCu", $req['MatKhauCu']);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DoiTenHienThi($req){
			try{
				$qr = "UPDATE taikhoan SET display_name = :display_name WHERE user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue(":display_name", $req['display_name']);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTatCaTaiKhoan(){
			try{
				$qr = "SELECT id FROM taikhoan";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTaiKhoanMoiTao(){
			try{
				$qr = "SELECT id FROM taikhoan WHERE date_create >= CURDATE()";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TaiKhoanMoiTaoHomNay(){
			try{
				$qr = "SELECT * FROM taikhoan WHERE date_create >= CURDATE()";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function QuenMatKhau($req){
			try{
				$qr = "SELECT user_name FROM taikhoan WHERE user_name = :user_name AND email = :email";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue('user_name', $req['user_name']);
				$cmd->bindValue('email', $req['email']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XuLyQuenMatKhau($req){
			try{
				$qr = "UPDATE taikhoan SET pass_word = :pass_word WHERE user_name = :user_name";
				$cmd = $this->TaiKhoan->prepare($qr);
				$cmd->bindValue('pass_word', $req['pass_word']);
				$cmd->bindValue('user_name', $req['user_name']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>