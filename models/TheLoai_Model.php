<?php  require_once "./models/dbCon.php";
	class TheLoai_Model{
		private $TheLoai;

		function __construct(){
			$this->TheLoai = new dbCon();
			$this->TheLoai = $this->TheLoai->KetNoi();
		}

		public function DanhSachTheLoai(){
			try{
				$qr = "SELECT * FROM the_loai";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTheLoai(){
			try{
				$qr = "SELECT id FROM the_loai";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaTheLoai($req){
			try{
				$qr = "DELETE FROM the_loai WHERE id = :id";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayChiTietTheLoai($req){
			try{
				$qr = "SELECT * FROM the_loai WHERE id = :id";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ChinhSuaTheLoai($req){
			try{
				$qr = "UPDATE the_loai SET title = :title WHERE id = :id";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ThemTheLoai($req){
			try{
				$qr = "INSERT INTO the_loai(title) VALUES (:title)";
				$cmd = $this->TheLoai->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>