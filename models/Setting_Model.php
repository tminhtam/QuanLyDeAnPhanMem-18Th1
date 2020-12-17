<?php  require_once "./models/dbCon.php";
	class Setting_Model{
		private $Setting;

		function __construct(){
			$this->Setting = new dbCon();
			$this->Setting = $this->Setting->KetNoi();
		}

		public function SuaSetting($req){
			try{
				$qr = "UPDATE cat_dat SET action = :action WHERE name_setting = :name_setting";
				$cmd = $this->Setting->prepare($qr);
				$cmd->bindValue(':action', $req['action']);
				$cmd->bindValue(':name_setting', $req['name_setting']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function UpdateBaoTri(){
			try{
				$qr = "UPDATE cat_dat SET action = NOT action WHERE name_setting = 'bao-tri'";
				$cmd = $this->Setting->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function UpdateCayViews(){
			try{
				$qr = "UPDATE cat_dat SET action = NOT action WHERE name_setting = 'cay-views'";
				$cmd = $this->Setting->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DocSetting(){
			try{
				$qr = "SELECT * FROM cat_dat";
				$cmd = $this->Setting->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function BaoTri(){
			try{
				$qr = "SELECT * FROM cat_dat WHERE name_setting = 'bao-tri'";
				$cmd = $this->Setting->prepare($qr);
				$cmd->execute();
				return $cmd->fetch()['action'];
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function CayViews(){
			try{
				$qr = "SELECT * FROM cat_dat WHERE name_setting = 'cay-views'";
				$cmd = $this->Setting->prepare($qr);
				$cmd->execute();
				return $cmd->fetch()['action'];
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>