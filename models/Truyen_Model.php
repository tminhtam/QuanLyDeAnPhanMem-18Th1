<?php  require_once "./models/dbCon.php";
	class Truyen_Model{
		private $Truyen;

		function __construct(){
			$this->Truyen = new dbCon();
			$this->Truyen = $this->Truyen->KetNoi();
		}

		public function TruyenCuaToi($req){
			try{
				$qr = "SELECT * FROM truyen WHERE user_post = :user_post ORDER BY date_update DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":user_post", $req['user_post']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTruyenCuaToi($req){
			try{
				$qr = "SELECT id FROM truyen WHERE user_post = :user_post";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":user_post", $req['user_post']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SoLuongTatCaTruyen(){
			try{
				$qr = "SELECT id FROM truyen";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function XoaTruyen($req){
			try{
				$qr = "DELETE FROM truyen WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LayChiTietTruyen($req){
			try{
				$qr = "SELECT * FROM truyen WHERE title_u = :title_u";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title_u", $req['title_u']);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function GetTuaTruyenByTitle_U($title_u){
			try{
				$qr = "SELECT title FROM truyen WHERE title_u = :title_u";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title_u", $title_u);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function GetTitleByID($req){
			try{
				$qr = "SELECT title_u FROM truyen WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":id", $req);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SuaTruyen($req){
			try{
				$qr = "UPDATE truyen 
						SET title = :title, title_u = :title_u, img = :img, thumb = :thumb, author = :author, source = :source, status = :status, type = :type, review = :review, de_cu = :de_cu 
						WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->bindValue(":title_u", $req['title_u']);
				$cmd->bindValue(":img", $req['img']);
				$cmd->bindValue(":thumb", $req['thumb']);
				$cmd->bindValue(":author", $req['author']);
				$cmd->bindValue(":source", $req['source']);
				$cmd->bindValue(":status", $req['status']);
				$cmd->bindValue(":type", $req['type']);
				$cmd->bindValue(":review", $req['review']);
				$cmd->bindValue(":de_cu", $req['de_cu']);
				$cmd->bindValue(":id", $req['id']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return 'error';
			}
		}

		public function ThemTruyen($req){
			try{
				$qr = "INSERT INTO truyen(title, title_u, img, thumb, author, source, status, type, num_chaps, views, review, de_cu, date_create, date_update, user_post) 
						VALUES (:title, :title_u, :img, :thumb, :author, :source, :status, :type, 0, 0, :review, :de_cu, NOW(), NOW(), :user_post)";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title", $req['title']);
				$cmd->bindValue(":title_u", $req['title_u']);
				$cmd->bindValue(":img", $req['img']);
				$cmd->bindValue(":thumb", $req['thumb']);
				$cmd->bindValue(":author", $req['author']);
				$cmd->bindValue(":source", $req['source']);
				$cmd->bindValue(":status", $req['status']);
				$cmd->bindValue(":type", $req['type']);
				$cmd->bindValue(":review", $req['review']);
				$cmd->bindValue(":de_cu", $req['de_cu']);
				$cmd->bindValue(":user_post", $req['user_post']);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function GetInfoTruyenByTitle($title){
			try{
				$qr = "SELECT id, title FROM truyen WHERE title_u = :title_u";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title_u", $title);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function UpdateViews($id){
			try{
				$qr = "UPDATE truyen SET views = views + 1 WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":id", $id);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Update_InsertChuong($req){
			try{
				$qr = "UPDATE truyen SET num_chaps = num_chaps + 1, date_update = NOW() WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":id", $req);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function Update_DeleteChuong($req){
			try{
				$qr = "UPDATE truyen SET num_chaps = num_chaps - 1 WHERE id = :id";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":id", $req);
				$cmd->execute();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TimTruyenCuaToi($req){
			try{
				$qr = "SELECT * FROM truyen WHERE user_post = :user_post AND title REGEXP :key ORDER BY date_update DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":user_post", $req['user_post']);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TatCaTruyen(){
			try{
				$qr = "SELECT * FROM truyen ORDER BY date_update DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TimTruyenAdmin($req){
			try{
				$qr = "SELECT * FROM truyen WHERE title REGEXP :key ORDER BY date_update DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":key", $req['key']);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenMoiTaoHomNay(){
			try{
				$qr = "SELECT id FROM truyen WHERE date_create >= CURDATE()";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->rowCount();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenMoiUpdate_1($user){
			try{
				$qr = "SELECT * FROM truyen WHERE user_post = :user_post ORDER BY date_update DESC LIMIT 0, 1";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":user_post", $user);
				$cmd->execute();
				return $cmd->fetch();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenMoiTaoHomNay(){
			try{
				$qr = "SELECT * FROM truyen WHERE date_create >= CURDATE()";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSach_6_TruyenMoiUpdate(){
			try{
				$qr = "SELECT * FROM truyen ORDER BY date_update DESC LIMIT 0, 6";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenHoanThanh(){
			try{
				$qr = "SELECT * FROM truyen WHERE status = 'Hoàn thành' ORDER BY date_update DESC LIMIT 0, 12";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenHOT(){
			try{
				$qr = "SELECT * FROM truyen ORDER BY views DESC LIMIT 0, 12";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenTienHiep(){
			try{
				$qr = "SELECT tr.title, tr.title_u, tr.id FROM truyen tr, the_loai_truyen tl WHERE (tr.title_u = tl.title_truyen) AND tl.title_theloai = 'Tiên Hiệp' ORDER BY tr.views DESC LIMIT 0, 10";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenHuyenHuyen(){
			try{
				$qr = "SELECT tr.title, tr.title_u, tr.id FROM truyen tr, the_loai_truyen tl WHERE (tr.title_u = tl.title_truyen) AND tl.title_theloai = 'Huyền Huyễn' ORDER BY tr.views DESC LIMIT 0, 10";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenDoThi(){
			try{
				$qr = "SELECT tr.title, tr.title_u, tr.id FROM truyen tr, the_loai_truyen tl WHERE (tr.title_u = tl.title_truyen) AND tl.title_theloai = 'Đô Thị' ORDER BY tr.views DESC LIMIT 0, 10";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DanhSachTruyenNgonTinh(){
			try{
				$qr = "SELECT tr.title, tr.title_u, tr.id FROM truyen tr, the_loai_truyen tl WHERE (tr.title_u = tl.title_truyen) AND tl.title_theloai = 'Ngôn Tình' ORDER BY tr.views DESC LIMIT 0, 10";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function SearchTruyen_TrangChu($key){
			try{
				require_once './libs/functions.php';
				$qr = "SELECT * FROM truyen WHERE (title REGEXP :title) OR (author REGEXP :author) OR (title_u REGEXP :title_u)";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(":title", $key);
				$cmd->bindValue(":author", $key);
				$cmd->bindValue(":title_u", utf8convert($key));
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenDeCu(){
			try{
				$qr = "SELECT * FROM truyen WHERE de_cu LIKE 1";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenHOT(){
			try{
				$qr = "SELECT * FROM truyen ORDER BY views DESC LIMIT 0, 50";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenDich(){
			try{
				$qr = "SELECT * FROM truyen WHERE type = 'Truyện Dịch' ORDER BY date_update DESC LIMIT 0, 50";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenConvert(){
			try{
				$qr = "SELECT * FROM truyen WHERE type = 'Truyện Convert' ORDER BY date_update DESC LIMIT 0, 50";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TruyenUpdate_50(){
			try{
				$qr = "SELECT * FROM truyen ORDER BY date_update DESC LIMIT 0, 50";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function LaySach_TuSach($idTruyen){
			try{
				$qr = "SELECT * FROM truyen WHERE id IN($idTruyen)";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TheLoai($theLoai){
			try{
				$qr = "SELECT tr.title, tr.title_u, tr.id, tr.img, tr.num_chaps FROM truyen tr, the_loai_truyen tl WHERE (tr.title_u = tl.title_truyen) AND tl.title_theloai = :title_theloai ORDER BY tr.views DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(':title_theloai', $theLoai);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function TacGia($author){
			try{
				$qr = "SELECT title, title_u, img, num_chaps FROM truyen WHERE author = :author ORDER BY views DESC";
				$cmd = $this->Truyen->prepare($qr);
				$cmd->bindValue(':author', $author);
				$cmd->execute();
				return $cmd->fetchAll();
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>