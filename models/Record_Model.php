<?php  require_once "./models/dbCon.php";
	class Record_Model{
		private $Record;

		function __construct(){
			$this->Record = new dbCon();
			$this->Record = $this->Record->KetNoi();
		}

		public function ThemRecord($req){
			try{
				$qr = "INSERT INTO record(user_name, action, curr_time) 
					VALUES (:user_name, :action, NOW())";
				$cmd = $this->Record->prepare($qr);
				$cmd->bindValue(":user_name", $req['user_name']);
				$cmd->bindValue(":action", $req['action']);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DocRecord($user){
			try{
				$qr = "SELECT * FROM record WHERE user_name = :user_name ORDER BY curr_time DESC LIMIT 0, 5";
				$cmd = $this->Record->prepare($qr);
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