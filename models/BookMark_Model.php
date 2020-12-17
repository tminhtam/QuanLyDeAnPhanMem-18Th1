<?php  require_once "./models/dbCon.php";
	class BookMark_Model{
		private $BookMark;

		function __construct(){
			$this->BookMark = new dbCon();
			$this->BookMark = $this->BookMark->KetNoi();
		}

		public function ThemBook($req){
			try{
				$qr = "INSERT INTO bookmarks(user_name, id_truyen) VALUES (:user_name, :id_truyen)";
				$cmd = $this->BookMark->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaBook($req){
			try{
				$qr = "DELETE FROM bookmarks WHERE user_name = :user_name AND id_truyen = :id_truyen";
				$cmd = $this->BookMark->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaBookAdmin($id){
			try{
				$qr = "DELETE FROM bookmarks WHERE id_truyen = :id_truyen";
				$cmd = $this->BookMark->prepare($qr);
				$cmd->bindValue(":id_truyen", $id);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function CheckBookMark($req){
			try{
				$qr = "SELECT id FROM bookmarks WHERE user_name = :user_name AND id_truyen = :id_truyen";
				$cmd = $this->BookMark->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TuSachCuaToi($user){
			try{
				$qr = "SELECT id_truyen FROM bookmarks WHERE user_name = :user_name";
				$cmd = $this->BookMark->prepare($qr);
				$cmd->bindValue(":user_name", $user);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>