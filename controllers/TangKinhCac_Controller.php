<?php  
	require_once "./models/Truyen_Model.php";
	require_once "./models/Chuong_Model.php";
	require_once "./models/TheLoaiTruyen_Model.php";
	require_once "./models/BookMark_Model.php";
	require_once "./models/TheLoai_Model.php";
	require_once "./models/HuongDan_Model.php";
	require_once "./models/Setting_Model.php";

	class TangKinhCac_Controller{
		private $Truyen;
		private $Chuong;
		private $TheLoai;
		private $BookMark;
		private $ListTheLoai;
		private $HuongDan;
		private $Setting;

		function __construct(){
			$this->Truyen = new Truyen_Model();	
			$this->Chuong = new Chuong_Model();	
			$this->TheLoai = new TheLoaiTruyen_Model();
			$this->BookMark = new BookMark_Model();
			$this->ListTheLoai = new TheLoai_Model();
			$this->HuongDan = new HuongDan_Model();
			$this->Setting = new Setting_Model();
		}

		public function TrangChu(){
			if($this->Setting->BaoTri() == 0){
				$this->view("TangKinhCac",[
					"trang"=>"home",
					'update'=>$this->Truyen->DanhSach_6_TruyenMoiUpdate(),
					'hoan_thanh'=>$this->Truyen->DanhSachTruyenHoanThanh(),
					'hot'=>$this->Truyen->DanhSachTruyenHOT(),
					'tien_hiep'=>$this->Truyen->DanhSachTruyenTienHiep(),
					'huyen_huyen'=>$this->Truyen->DanhSachTruyenHuyenHuyen(),
					'do_thi'=>$this->Truyen->DanhSachTruyenDoThi(),
					'ngon_tinh'=>$this->Truyen->DanhSachTruyenNgonTinh(),
					'de_cu'=>$this->Truyen->TruyenDeCu()
				]);
			}
			else{
				$this->view('BaoTri');
			}
			
		}

		public function TrangTruyen($req){
			if($this->Setting->BaoTri() == 0){
				$res = $this->Truyen->GetInfoTruyenByTitle($req['title_u']);

				//Rỗng là không tìm thấy truyện
				if(empty($res)){
					$this->view('TangKinhCac',[
						'trang'=>'error'
					]);
				}
				else{
					$idTruyen = $res['id'];

					if(isset($_SESSION['tangkinhcac_user'])){
						$book = $this->BookMark->CheckBookMark(array('id_truyen'=>$idTruyen, 'user_name'=>$_SESSION['tangkinhcac_user']));
					}
					else{
						$book = 0;
					}

					$truyen = $this->Truyen->LayChiTietTruyen($req);

					$chuong1trang = 25; 

					$SoTrang = ceil($truyen['num_chaps']/$chuong1trang);

					$this->view('TangKinhCac',[
						'trang'=>'truyen',
						'truyen'=>$truyen,
						'5_chuong_moi'=>$this->Chuong->Lay5ChuongMoi($idTruyen),
						'25_chuong'=>$this->Chuong->Lay25Chuong($idTruyen),
						'chuong_dau'=>$this->Chuong->LayChuongDauTien($idTruyen),
						'the_loai'=>$this->TheLoai->LayTheLoaiCua1Truyen($req),
						'idTruyen'=>$idTruyen,
						'book'=>$book,
						'soTrang'=>$SoTrang
					]);
				}
			}
			else{
				$this->view('BaoTri');
			}
			
		}

		public function DocTruyen($req){
			if($this->Setting->BaoTri() == 0){
				$res = $this->Truyen->GetInfoTruyenByTitle($req['title_truyen']);

				//Nếu kết quả trả về không bị trống, là có truyện tồn tại
				if(!empty($res)){
					$idTruyen = $res['id'];

					$res2 = $this->Chuong->ReturnSoChuong($req);

					//nếu kết quả trông bị trống
					if(!empty($res2)){
						$idChuongHienTai =  $res2['num_chap'];
						$ChuongTruoc = $res2['num_chap'] - 1;
						$ChuongSau = $res2['num_chap'] + 1;

						if($ChuongTruoc > 0){
							$ChuongTruoc = $this->Chuong->ReturnIDChuong(array('id_truyen'=>$idTruyen, 'num_chap'=>$ChuongTruoc));
						}
						else{
							$ChuongTruoc = array('id'=>'disabled');
						}

						$ChuongSau = $this->Chuong->ReturnIDChuong(array('id_truyen'=>$idTruyen, 'num_chap'=>$ChuongSau));

						if(!isset($ChuongSau['id'])){
							$ChuongSau = array('id'=>'disabled');
						}

						//kiểm tra cho cày lượt xem hay không
						if($this->Setting->CayViews() == 1){
							$this->Truyen->UpdateViews($idTruyen);
						}
						else{
							if(!isset($_COOKIE['DaXemChuong-'.$idChuongHienTai.'-idTruyen'.$idTruyen])){
								$this->Truyen->UpdateViews($idTruyen);
								setcookie('DaXemChuong-'.$idChuongHienTai.'-idTruyen'.$idTruyen, "1", time() + 43200, "/");
							}
						}

						$title_truyen = "da-doc-truyen-".$_GET['title'];
						$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						setcookie($title_truyen, $link, time() + 2592000, "/"); //2592000 1 thang

						$this->view('TangKinhCac',[
							'trang'=>'doc_truyen',
							'tua_truyen'=>$this->Truyen->GetTuaTruyenByTitle_U($req['title_truyen'])['title'],
							'chuong'=>$this->Chuong->DocTruyen($req['id_chuong']),
							'chuong_truoc'=>$ChuongTruoc,
							'chuong_sau'=>$ChuongSau
						]);
					}
					else{
						$this->view('TangKinhCac',[
							'trang'=>'error'
						]);
					}
				}
				else{
					$this->view('TangKinhCac',[
						'trang'=>'error'
					]);
				}
				
				
			}
			else{
				$this->view('BaoTri');
			}	
		}

		public function Error(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'error'
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function Search($key){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'search',
					'result'=>$this->Truyen->SearchTruyen_TrangChu($key)
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TruyenHOTT(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'hot',
					'hot'=>$this->Truyen->TruyenHOT()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TruyenDich(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'dich',
					'dich'=>$this->Truyen->TruyenDich()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TruyenConvert(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'convert',
					'convert'=>$this->Truyen->TruyenConvert()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TruyenUpdate(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'update',
					'update'=>$this->Truyen->TruyenUpdate_50()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TuSach(){
			if($this->Setting->BaoTri() == 0){
				$sach = array();
				$ii = 0;

				foreach ($this->BookMark->TuSachCuaToi($_SESSION['tangkinhcac_user']) as $value) {
					$sach[$ii] = $value['id_truyen'];
					$ii++;
				}

				$list = implode(',', $sach);

				if(strlen($list) == 0){
					$list = 0;
				}

				$this->view('TangKinhCac',[
					'trang'=>'tu_sach',
					'sach'=>$this->Truyen->LaySach_TuSach($list)
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TheLoai($theLoai){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'the_loai',
					'theloai'=>$this->Truyen->TheLoai($theLoai)
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TacGia($author){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'author',
					'author'=>$this->Truyen->TacGia($author)
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function TatCaTheLoai(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'danh_sach_the_loai',
					'tat_ca_the_loai'=>$this->ListTheLoai->DanhSachTheLoai()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function HuongDanDangTruyen(){
			if($this->Setting->BaoTri() == 0){
				$this->view('TangKinhCac',[
					'trang'=>'huong_dan_dang_truyen',
					'huongdan'=>$this->HuongDan->DocHuongDan()
				]);
			}
			else{
				$this->view('BaoTri');
			}
		}

		public function view($view, $data=[]){
			require_once "./views/".$view.".php";
		}
	}
?>