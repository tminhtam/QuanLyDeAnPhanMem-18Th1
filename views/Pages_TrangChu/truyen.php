<?php require_once "./libs/functions.php"; 
	$title_truyen = "da-doc-truyen-".$_GET['title'];
	$title_truyen_thuong = $_GET['title'];
?>
<ol class="breadcrumb shadow-sm">
	<li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
	<li class="breadcrumb-item active" aria-current="page"><?php echo $data['truyen']['title']; ?></li>
</ol>

<div class="card">
	<div class="card-title-truyen card-header text-center"><i class="fas fa-book-reader"></i> Truyện <?php echo $data['truyen']['title']; ?></div>
	<div class="card-body card-body-trang-truyen">
			<div class="row">
				<div class="col-md-3">
					<img class="img-fluid myboder-2 mx-auto my-vien" src="./storage/<?php echo $data['truyen']['img']; ?>">
					<h4 class="text-center mt-2"><?php echo $data['truyen']['title']; ?></h4>
					<p><b>Tác giả: </b><a href="tac-gia/<?php echo $data['truyen']['author']; ?>"><?php echo $data['truyen']['author']; ?></a></p>
					<p><b>Thể loại: </b>
						<!-- nội dung thể loại -->
						<?php  
							$soLuongTL = count($data['the_loai']);$temp = 1;
							foreach ($data['the_loai'] as $value) {
						?>
						<a href="the-loai/<?php echo $value['title_theloai']; ?>"><?php echo $value['title_theloai']; ?></a><?php if($temp < $soLuongTL) echo ', '; ?>
						<?php $temp++;} ?>
						<!-- end nội dung thể loại -->
					</p>
					<p class="nguon"><b>Nguồn: </b><?php echo $data['truyen']['source']; ?></p>
				</div>
				<div class="col-md-9">
					<h2 id="title-md" class="text-center mt-2"><?php echo $data['truyen']['title']; ?></h2>
					<div class="info-thong-so text-center mt-3">
						<span class="my-btn my-1 badge badge-primary font-weight-bolder my-gage"><?php echo $data['truyen']['status']; ?></span>
						<span class="my-btn my-1 badge badge-info font-weight-bolder my-gage ml-2"><?php echo $data['truyen']['type']; ?></span>
						<span class="my-btn my-1 badge badge-success font-weight-bolder my-gage ml-2"><?php echo $data['truyen']['num_chaps']; ?> chương</span>
						<span class="my-btn my-1 badge badge-secondary font-weight-bolder my-gage ml-2"><?php echo $data['truyen']['views']; ?> lượt đọc</span>
					</div>
					<div class="share-save text-center mt-3">
						<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like" onclick="FeedBack()"><i class="fas fa-exclamation-triangle fa-lg" title="Báo lỗi truyện!"></i></button>
						<button id="mark-book" class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i id="icon-bookmark" class="<?php if($data['book'] > 0) echo 'fas'; else echo 'fal'; ?> fa-bookmark fa-lg" title="Lưu vào tủ sách!"></i></button>
						<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="fad fa-share-alt fa-lg"></i></button>
						<button class="text-center btn border shadow-sm rounded-circle mx-3 my-button-like"><i class="fas fa-comment-alt-lines fa-lg"></i></button>
					</div>
					<div class="frame-read mt-3">
						<a class="read-story btn btn-primary btn-lg btn-block shadow-sm <?php if($data['truyen']['num_chaps'] == 0) echo 'disabled'; ?>" href="
							<?php 
								if(isset($_COOKIE[$title_truyen])){
									echo 'http://'.$_COOKIE[$title_truyen];
								}
								else{
									echo 'doc-truyen/'.$title_truyen_thuong.'/'.$data['chuong_dau']['title_u'].'-'.$data['chuong_dau']['id'].'.html';
								}
							?>
							">đọc truyện</a>
						<!-- <a class="download-story btn btn-primary btn-lg btn-block shadow-sm" href="#">download ebook prc</a> -->
						<div class="download-story btn btn-primary btn-lg btn-block shadow-sm" onclick="Alert('Tính năng download <b>EBOOK PRC</b> hiện đang được phát triển!')">download ebook prc</div>
					</div>
					<div class="ngay-tao mt-3">
						<p class="py-0 my-0"><i class="fal fa-calendar-alt"></i> Ngày tạo: <?php ConvertDate($data['truyen']['date_create']); ?></p>
						<p class="py-0 my-0"><i class="fal fa-calendar-alt"></i> Cập nhật: <?php ConvertDate($data['truyen']['date_update']); ?></p>
					</div>
					<div class="review-truyen mt-3">
						<div class="pb-2"><h3 class="title-review"><i class="fad fa-book-reader"></i> GIỚI THIỆU TRUYỆN</h3></div>
						<p><?php echo Preview($data['truyen']['review']); ?></p>
					</div>
					<div class="chuong-moi-5 mt-3">
						<div class="pb-2"><h3 class="title-review"><i class="fad fa-galaxy"></i> 5 chương mới nhất</h3></div>
						<ul>
							<!-- nội dung 5 chuong mới -->
							<?php foreach($data['5_chuong_moi'] as $value){ ?>
							<li><a href="doc-truyen/<?php echo $_GET['title']; ?>/<?php echo $value['title_u']; ?>-<?php echo $value['id']; ?>.html">Chương <?php echo $value['num_chap']; ?>: <?php echo stripslashes($value['title']); ?></a> <small>(<?php ConvertDate($value['date_post']); ?>)</small></li>
							<?php } ?>
							<!-- nội dung 5 chuong mới -->
						</ul>
					</div>
					<div class="list-chapter mt-3">
						<div class="pb-2"><h3 class="title-review"><i class="fad fa-fire-alt"></i> danh sách chương</h3></div>
						<ul id="list-chaps">
							<!-- nội dung 25 chuong -->
							<?php foreach($data['25_chuong'] as $value){ ?>
							<li><a href="doc-truyen/<?php echo $_GET['title']; ?>/<?php echo $value['title_u']; ?>-<?php echo $value['id']; ?>.html">Chương <?php echo $value['num_chap']; ?>: <?php echo stripslashes($value['title']); ?> <span class="float-right"><i class="<?php if($value['lock_chap'] == 1) echo 'fad fa-lock-alt'; ?>"></i></span></a></li>
							<?php } ?>
							<!-- end nội dung 25 chuong -->
						</ul>
					</div>

					<div id="hinh-kieu" class="mb-2 mt-2"><img class="mx-auto d-block" src="./public/images/bg_bottom.png"></div>
				</div>
			</div>

	</div>
</div>

<!-- <div class="ribbon-wrapper">
    <div class="ribbon"><i class="fas fa-lock-alt text-danger"></i> Bị Khóa</div>
</div> -->


<?php if($data['truyen']['num_chaps'] > 25){ ?>
<div class="my-pagination mt-4 text-center my-3">
	<span id="btn-fist" class="btn"><i class="fad fa-backward"></i></span>
	<span id="btn-truoc" class="btn btn-outline-secondary btn-trang"><i class="fas fa-caret-left"></i> Prev</span>

	<span id="page-of" class="btn btn-outline-secondary btn-page-of disabled ml-2"><span id="currPage">1</span> of <?php echo $data['soTrang']; ?></span>

	<span id="btn-sau" class="btn btn-outline-secondary btn-trang ml-2">Next <i class="fas fa-caret-right"></i></span>
	<span id="btn-tail" class="btn"><i class="fad fa-forward"></i></span>
</div>
<?php } ?>

<div class="ah-pif-footer mt-1">
    <div class="fb-comments" data-href="http://tangkinhcac.atwebpages.com/id=<?php echo $data['truyen']['title_u']; ?>" data-numposts="5" data-order-by="reverse_time" colorscheme="light" data-colorscheme="light" data-width="100%" width="100%"></div>      
</div>

<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=527870361017285&autoLogAppEvents=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));
</script>

<script type="text/javascript">
	$('title').text('Truyện <?php echo $data['truyen']['title']; ?> - <?php echo $data['truyen']['author']; ?>');
</script>

<div class="idtruyen" style="display: none;"><?php echo $data['idTruyen']; ?></div>



<script type="text/javascript">
    var toancuc = 1;
    var tongtrang = <?php echo $data['soTrang']; ?>;
    var soChuong1Trang = 25;
    var idTruyen = $('.idtruyen').text();

    $(document).ready(function(){
        $("#btn-sau").click(function(){
            toancuc += 1;

            if(toancuc <= tongtrang){
            	var froms = ((toancuc - 1) * soChuong1Trang);
            	
                $.post("index.php?url=ajax-lay-chuong", {id: idTruyen, tu_chuong: froms, title: '<?php echo $_GET['title']; ?>'}, function(data){
                    $("#list-chaps").html(data);
                    $("#currPage").html(toancuc);
                }); 
            }
            else{
                toancuc -= 1;
            }  
        });

        $("#btn-truoc").click(function(){
            toancuc -= 1;
            
            if(toancuc > 0){
            	var froms = ((toancuc - 1) * soChuong1Trang);

                $.post("index.php?url=ajax-lay-chuong", {id: idTruyen, tu_chuong: froms, title: '<?php echo $_GET['title']; ?>'}, function(data){
                    $("#list-chaps").html(data);
                    $("#currPage").html(toancuc);
                });
            }
            else{
                toancuc += 1;
            } 
        });

        $("#btn-fist").click(function(){
            toancuc = 1;
            
            if(toancuc > 0){
                var froms = ((toancuc - 1) * soChuong1Trang);
            	
                $.post("index.php?url=ajax-lay-chuong", {id: idTruyen, tu_chuong: froms, title: '<?php echo $_GET['title']; ?>'}, function(data){
                    $("#list-chaps").html(data);
                    $("#currPage").html(toancuc);
                }); 
            }
            else{
                toancuc += 1;
            } 
        });

        $("#btn-tail").click(function(){
            toancuc = tongtrang;
            
            if(toancuc <= tongtrang){
                var froms = ((toancuc - 1) * soChuong1Trang);
            	
                $.post("index.php?url=ajax-lay-chuong", {id: idTruyen, tu_chuong: froms, title: '<?php echo $_GET['title']; ?>'}, function(data){
                    $("#list-chaps").html(data);
                    $("#currPage").html(toancuc);
                }); 
            }
            else{
                toancuc -= 1;
            }  
        });
    });
</script>