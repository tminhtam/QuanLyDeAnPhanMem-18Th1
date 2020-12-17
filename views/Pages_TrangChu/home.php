<?php require_once "./libs/functions.php"; ?>
<div class="my-carsoul mb-3">
	<div class="row">
		<div class="col-md-9 truyen-de-cu">
			<!-- start-carousel -->
	        <div id="carouselExampleCaptions" class="carousel slide shadow" data-ride="carousel">
	            <ol class="carousel-indicators">
	                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
	                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
	                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	            </ol>
	            <div class="carousel-inner">
	            	<!-- nội dung carasoul -->
	            	<?php $ac = true; foreach ($data['de_cu'] as $value) { ?>
	                <div class="carousel-item <?php if($ac) echo 'active'; ?>">
	                    <a href="truyen/<?php echo $value['title_u']; ?>.html">
	                        <img src="./storage/<?php echo $value['thumb']; ?>" class="d-block w-100">
	                        <div class="carousel-caption d-none d-md-block">
	                            <h5><?php echo $value['title']; ?></h5>
	                            <p><i class="fal fa-user"></i> <?php echo $value['author']; ?> | <i class="fal fa-clock"></i> <?php echo DateToTime($value['date_update']); ?></p>
	                        </div>
	                    </a>
	                </div>
	           		 <?php $ac = false;} ?>
	                <!-- end nội dung carasoul -->
	            </div>
	            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	                <span class="sr-only">Previous</span>
	            </a>
	            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	                <span class="carousel-control-next-icon" aria-hidden="true"></span>
	                <span class="sr-only">Next</span>
	            </a>
	        </div>
	        <!-- end-carousel -->
		</div>
		<div class="col-md-3 goi-y-tao-tai-khoan">
			<div class="content-car bg-white shadow px-3 py-3" style="background-color: #f4f4f4;height: 340px;border-radius: 3px;">
	            <h5 class="text-center text-sd">BẠN ĐÃ CÓ TÀI KHOẢN?</h5>
	            <hr>
	            <p>
	                <small>
	                    Chúng tôi sẵn sàng hỗ trợ bạn bất cứ lúc nào. Hãy nhấn vào lựa chọn bên dưới.
	                </small>
	            </p>

	            <a class="btn btn-success" href="dang-ky" style="width: 100%;"><i class="fas fa-user-plus"></i> Tạo Tài Khoản</a>

	            <a class="btn btn-primary mt-3" href="huong-dan" style="width: 100%;">Hướng Dẫn Đăng Truyện</a>
	            <a class="btn btn-primary mt-3" href="bang-dieu-khien" style="width: 100%;">Trung Tâm Đăng Truyện</a>
	           <p class="text-center mt-3"><small><i>(Cần đăng nhập để xem thông tin)</i></small></p>
	        </div> 
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 py-1">
		<div class="my-card card shadow-sm">
			<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="far fa-stopwatch"></i> TRUYỆN MỚI UPDATE <a class="float-right bgg-trang" href="truyen-update"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
			<div class="card-body py-0 pb-3 my-pad">
				<div class="row">
					<!-- nội dung truyện mới update -->
					<?php foreach($data['update'] as $value){ ?>
					<div class="col-md-4 col-6 my-2 test">
						<div class="my-card card bg-dark">
							<a href="truyen/<?php echo $value['title_u']; ?>.html">
								<div class="card-body py-0 px-0 position-relative">
									<img src="./storage/<?php echo $value['img']; ?>" class="img-fluid my-thumb">
									<span class="the-chuong position-absolute"><?php echo $value['num_chaps']; ?> chương</span>
								</div>
								<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $value['title']; ?></div>
							</a>
						</div>
					</div>
					<?php } ?>
					<!-- end nội dung truyện mới update -->
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4 py-1 mr-truyenhoanthanh">
		<div class="my-card card shadow-sm">
			<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fab fa-stack-overflow"></i> TRUYỆN HOÀN THÀNH <a class="float-right bgg-trang" href="full"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
			<div class="card-body py-0 pb-2">
				<ul class="ul-hoan-thanh">
					<!-- nội dung truyện hoàn thành -->
					<?php foreach($data['hoan_thanh'] as $value){ ?>
					<li class="py-2">
						<a class="d-block font-roman chu-nau an-chu hover truyen-hoan-thanh" href="truyen/<?php echo $value['title_u']; ?>.html"><i class="fad fa-bookmark fa-fw"></i> <?php echo $value['title']; ?></a>
						<a class="d-block font-roman chu-nau an-chu hover truyen-tac-gia" href="#"><small><i class="fal fa-user fa-fw"></i> <?php echo $value['author']; ?></small></a>
					</li>
					<?php } ?>
					<!-- end nội dung truyện hoàn thành -->
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 mt-2"><a href="#"><img class="img-fluid" src="./public/images/banner1.jpg"></a></div>

<div class="my-card card shadow-sm mt-3">
	<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="far fa-fire-alt"></i> TRUYỆN HOT <a class="float-right bgg-trang" href="truyen-hot"><i class="fad fa-arrow-alt-circle-right"></i></a></h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<!-- nội dung truyện hot -->
			<?php foreach($data['hot'] as $value){ ?>
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $value['title_u']; ?>.html">
						<div class="card-body py-0 px-0 position-relative">
							<img src="./storage/<?php echo $value['img']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $value['num_chaps']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $value['title']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
			<!-- end nội dung truyện hot -->
		</div>
	</div>
</div>

<div class="container-fluid px-0 mt-3 banner-benduoi"><a href="#"><img class="img-fluid" src="./public/images/banner3.jpg" style="height: 61px; width: 100%;"></a></div>

<div class="row mt-3">
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fab fa-phoenix-squadron fa-fw"></i> Tiên Hiệp <a class="float-right bgg-trang" href="the-loai/Tiên+Hiệp"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<!-- nội dung tiên hiệp -->
					<?php $num = 1; foreach($data['tien_hiep'] as $value){ ?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $value['title_u']; ?>.html"><span class="badge badge-primary rounded-circle"><?php echo $num; ?></span> <?php echo $value['title']; ?></a></li>
					<?php $num++; } ?>
					<!-- end nội dung tiên hiệp -->
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fab fa-phoenix-framework fa-fw"></i> Huyền Huyễn <a class="float-right bgg-trang" href="the-loai/Huyền+Huyễn"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<!-- nội dung huyền huyễn -->
					<?php $num = 1; foreach($data['huyen_huyen'] as $value){ ?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $value['title_u']; ?>.html"><span class="badge badge-primary rounded-circle"><?php echo $num; ?></span> <?php echo $value['title']; ?></a></li>
					<?php $num++; } ?>
					<!-- end nội dung huyền huyễn -->
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fas fa-city"></i> Đô Thị <a class="float-right bgg-trang" href="the-loai/Đô+Thị"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<!-- nội dung truyện đô thị -->
					<?php $num = 1; foreach($data['do_thi'] as $value){ ?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $value['title_u']; ?>.html"><span class="badge badge-primary rounded-circle"><?php echo $num; ?></span> <?php echo $value['title']; ?></a></li>
					<?php $num++; } ?>
					<!-- nội dung truyện đô thị -->
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-light mb-3 my-carddd" style="max-width: 18rem;">
			<div class="card-header bg-xanh font-weight-bolder py-2"><i class="fas fa-heart"></i> Ngôn Tình <a class="float-right bgg-trang" href="the-loai/Ngôn+Tình"><i class="fad fa-arrow-alt-circle-right"></i></a></div>
			<div class="card-body py-2">
				<ul class="p-0 m-0" style="list-style: none;">
					<!-- nội dung ngôn tình -->
					<?php $num = 1; foreach($data['ngon_tinh'] as $value){ ?>
					<li class="an-chu py-1"><a class="link-nhieu" href="truyen/<?php echo $value['title_u']; ?>.html"><span class="badge badge-primary rounded-circle"><?php echo $num; ?></span> <?php echo $value['title']; ?></a></li>
					<?php $num++; } ?>
					<!-- end nội dung ngôn tình -->
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Tàng Kinh Các | Trang Chủ"); 
</script>