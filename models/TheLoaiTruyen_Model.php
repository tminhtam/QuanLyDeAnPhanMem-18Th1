<?php  require_once "./models/dbCon.php";
	class TheLoaiTruyen_Model{
		private $TheLoaiTruyen;

		function __construct(){
			$this->TheLoaiTruyen = new dbCon();
			$this->TheLoaiTruyen = $this->TheLoaiTruyen->KetNoi();
		}

		public function Xoa($req){
			try{
				$qr = "DELETE FROM the_loai_truyen WHERE title_truyen = :title_truyen";
				$cmd = $this->TheLoaiTruyen->prepare($qr);
				$cmd->bindValue(":title_truyen", $req['title_u_cu']);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayTheLoaiCua1Truyen($req){
			try{
				$qr = "SELECT * FROM the_loai_truyen WHERE title_truyen = :title_truyen";
				$cmd = $this->TheLoaiTruyen->prepare($qr);
				$cmd->bindValue(":title_truyen", $req['title_u']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Sua($req){
			try{
				$qr = "INSERT INTO the_loai_truyen(title_theloai, title_truyen) 
					VALUES (:title_theloai, :title_truyen)";
				$cmd = $this->TheLoaiTruyen->prepare($qr);
				$cmd->bindValue(":title_theloai", $req['title_theloai']);
				$cmd->bindValue(":title_truyen", $req['title_truyen']);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ThemTheLoaiTruyen($req){
			try{
				$qr = "INSERT INTO the_loai_truyen(title_theloai, title_truyen) 
					VALUES (:title_theloai, :title_truyen)";
				$cmd = $this->TheLoaiTruyen->prepare($qr);
				$cmd->bindValue(":title_theloai", $req['title_theloai']);
				$cmd->bindValue(":title_truyen", $req['title_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Xoa_Admin($req){
			try{
				$qr = "DELETE FROM the_loai_truyen WHERE title_truyen = :title_truyen";
				$cmd = $this->TheLoaiTruyen->prepare($qr);
				$cmd->bindValue(":title_truyen", $req);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>