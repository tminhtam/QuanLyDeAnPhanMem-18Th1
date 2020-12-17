<?php  require_once "./models/dbCon.php";
	class FeedBack_Model{
		private $FeedBack;

		function __construct(){
			$this->FeedBack = new dbCon();
			$this->FeedBack = $this->FeedBack->KetNoi();
		}

		public function ThemFeedBack($req){
			try{
				$qr = "INSERT INTO feedback(content, id_truyen, date_feedback, seen) VALUES (:content, :id_truyen, NOW(), 0)";
				$cmd = $this->FeedBack->prepare($qr);
				$cmd->bindValue(":content", $req['content']);
				$cmd->bindValue(":id_truyen", $req['id_truyen']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachFeedBack($user_post){
			try{
				$qr = "SELECT feedback.id, feedback.content, feedback.id_truyen, feedback.date_feedback, truyen.title 
						FROM truyen, taikhoan, feedback 
							WHERE (taikhoan.user_name = truyen.user_post AND taikhoan.user_name = :user_name) 
								AND (feedback.id_truyen = truyen.id AND feedback.seen LIKE 0)";
				$cmd = $this->FeedBack->prepare($qr);
				$cmd->bindValue(":user_name", $user_post);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongFeedBack($user_post){
			try{
				$qr = "SELECT feedback.id 
						FROM truyen, taikhoan, feedback 
							WHERE (taikhoan.user_name = truyen.user_post AND taikhoan.user_name = :user_name) 
								AND (feedback.id_truyen = truyen.id AND feedback.seen LIKE 0)";
				$cmd = $this->FeedBack->prepare($qr);
				$cmd->bindValue(":user_name", $user_post);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DaFixLoi($id){
			try{
				$qr = "UPDATE feedback SET seen = 1 WHERE id = :id";
				$cmd = $this->FeedBack->prepare($qr);
				$cmd->bindValue(":id", $id);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaFeedBack($id){
			try{
				$qr = "DELETE FROM feedback WHERE id_truyen = :id_truyen";
				$cmd = $this->FeedBack->prepare($qr);
				$cmd->bindValue(":id_truyen", $id);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>