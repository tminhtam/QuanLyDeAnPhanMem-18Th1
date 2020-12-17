<?php  require_once "./models/dbCon.php";
	class Chuong_Model{
		private $Chuong;

		function __construct(){
			$this->Chuong = new dbCon();
			$this->Chuong = $this->Chuong->KetNoi();
		}

		public function DanhSachChuong($req){
			try{
				$qr = "SELECT * FROM chuong WHERE id_truyen = :id_truyen ORDER BY date_post DESC";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $req);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaChuong($req){
			try{
				$qr = "DELETE FROM chuong WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayChiTietChuong($req){
			try{
				$qr = "SELECT * FROM chuong WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DocTruyen($idChuong){
			try{
				$qr = "SELECT * FROM chuong WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id", $idChuong);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ReturnIDChuong($req){
			try{
				$qr = "SELECT id, title_u FROM chuong WHERE id_truyen = :id_truyen AND num_chap = :num_chap";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->bindValue(":num_chap", $req['num_chap']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayChuongDauTien($idTruyen){
			try{
				$qr = "SELECT id, title_u FROM chuong WHERE id_truyen = :id_truyen AND num_chap = 1";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $idTruyen);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ReturnSoChuong($req){
			try{
				$qr = "SELECT num_chap FROM chuong WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id", $req['id_chuong']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SuaChuong($req){
			try{
				$qr = "UPDATE chuong 
						SET title = :title, title_u = :title_u, content = :content, num_chap = :num_chap 
						WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->bindValue(":title_u", $req['title_u']);
				$cmd->bindValue(":content", $req['content']);
				$cmd->bindValue(":num_chap", $req['num_chap']);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function ThemChuong($req){
			try{
				$qr = "INSERT INTO chuong(title, title_u, content, num_chap, date_post, id_truyen, lock_chap) 
					VALUES (:title, :title_u, :content, :num_chap, NOW(), :id_truyen, 0)";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->bindValue(":title_u", $req['title_u']);
				$cmd->bindValue(":content", $req['content']);
				$cmd->bindValue(":num_chap", $req['num_chap']);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TimChuong($req){
			try{
				$qr = "SELECT * FROM chuong WHERE id_truyen = :id_truyen AND title REGEXP :key";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaChuong_Admin($req){
			try{
				$qr = "DELETE FROM chuong WHERE id_truyen = :id_truyen";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Lay5ChuongMoi($idTruyen){
			try{
				$qr = "SELECT id, title, title_u, num_chap, date_post FROM chuong WHERE id_truyen = :id_truyen ORDER BY date_post DESC LIMIT 0, 5";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $idTruyen);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Lay25Chuong($idTruyen){
			try{
				$qr = "SELECT id, title, title_u, num_chap, date_post, lock_chap FROM chuong WHERE id_truyen = :id_truyen ORDER BY date_post ASC LIMIT 0, 25";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $idTruyen);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function AjaxLayChuong($req){
			$tu = $req['tu_chuong'];
			try{
				$qr = "SELECT id, title, title_u, num_chap, date_post, lock_chap FROM chuong WHERE id_truyen = :id_truyen LIMIT $tu, 25";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function KhoaChuong($req){
			try{
				$qr = "UPDATE chuong SET lock_chap = NOT lock_chap WHERE id = :id";
				$cmd = $this->Chuong->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>