<?php require_once "./libs/functions.php"; ?>
<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Truyện Của Tôi</li>
			</ol>
		</div>
		<div class="input-group float-right" style="width: 180px;">
			<input id="TimTruyenCuaToi" type="text" class="form-control" placeholder="Tìm truyện...">
			<div class="input-group-append">
				<span class="input-group-text" id="TimTaiKhoan"><i class="far fa-search"></i></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div id="GetData">
		<!-- nội dung truyện -->
		<?php foreach($data['danhsach'] as $value){ ?>
		<ul id="del-11" class="list-group mb-3">
			<li class="list-group-item flex-column align-items-start">
				<div class="float-left">
					<img src="./storage/<?php echo $value['img']; ?>" style="width: 80px; height: 113px;">
				</div>
				<div class="float-left ml-3">
					<h5 class="mb-1 font-weight-bold">
							<a href="chi-tiet-truyen/<?php echo $value['title_u']; ?>"><i class="fas fa-feather-alt"></i> <?php echo $value['title']; ?></a>
					</h5>
					<small title="Tác giả"><i class="fas fa-user"></i> <?php echo $value['author']; ?></small> | <small><i class="fal fa-clock"></i> <?php echo DateToTime($value['date_update']); ?></small>
					<div class="mt-2">
						<a href="them-chuong/<?php echo $value['title_u']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fad fa-plus-square"></i> Thêm Chương</a>
						<a href="danh-sach-chuong/<?php echo $value['title_u']; ?>" class="btn btn-success btn-sm mt-1 ml-2"><i class="far fa-list"></i> Danh Sách Chương</a>
						<a href="sua-truyen/<?php echo $value['title_u']; ?>" class="btn btn-secondary btn-sm mt-1 ml-2"><i class="far fa-edit"></i> Sửa Truyện</a>
					</div>
				</div>
				<div class="float-right ml-3">
					<span class="btn" title="lượt xem" style="cursor: pointer;"><i class="far fa-eye"></i> <?php echo $value['views']; ?></span> <br>
					<span class="btn" title="Số chương" style="cursor: pointer;"><i class="fas fa-lg fa-sort-numeric-up-alt"></i> <?php echo $value['num_chaps']; ?></span>
				</div>
			</li> 
		</ul>
		<?php } ?>
		<!-- end nội dung truyện -->
	</div>
	

	<!-- phân trang -->
	
	<!-- <div class="my-navigation pb-4">
		<div class="text-center">
			<span class="btn btn-sm"><i class="fas fa-backward"></i></span>
			<span class="btn btn-sm btn-secondary"><i class="far fa-arrow-left"></i> Prev</span>
			<span class="btn btn-sm btn-info">Page 1 of 100</span>
			<span class="btn btn-sm btn-secondary">Next <i class="far fa-arrow-right"></i></span>
			<span class="btn btn-sm"><i class="fas fa-forward"></i></span>
		</div>
	</div> -->
	
	<!-- end phân trang -->
</div>
<script type="text/javascript">
    $("title").text("Trang Quản Trị | Truyện Của Tôi"); 
</script>