<?php  require_once "./models/dbCon.php";
	class HuongDan_Model{
		private $HuongDan;

		function __construct(){
			$this->HuongDan = new dbCon();
			$this->HuongDan = $this->HuongDan->KetNoi();
		}

		public function SuaHuongDan($req){
			try{
				$qr = "UPDATE huong_dan SET content = :content";
				$cmd = $this->HuongDan->prepare($qr);
				$cmd->bindValue(":content", $req['content']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DocHuongDan(){
			try{
				$qr = "SELECT * FROM huong_dan";
				$cmd = $this->HuongDan->prepare($qr);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>