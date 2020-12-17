<div class="card card-primary mx-1 mt-1 my-0">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li><a class="vang" href="truyen-cua-toi">Truyện Của Tôi</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li><?php echo $data['info']['title']; ?></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Danh Sách Chương</li>
			</ol>
		</div>
		<div class="input-group float-right" style="width: 180px;">
			<input id="TimChuongCuaTruyen" type="text" class="form-control" placeholder="Tìm chương...">
			<div class="input-group-append">
				<span class="input-group-text" id="TimTaiKhoan"><i class="far fa-search"></i></span>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid mt-1">
	<a href="them-chuong/<?php echo $_GET['title']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fad fa-plus-square"></i> Thêm Chương</a>
</div>


<div id="GetData">
	<?php foreach ($data['danhsach'] as $value){ ?>
	<ul id="chuong-<?php echo $value['id']; ?>" class="list-group mb-4 mt-2 px-1">
		<li class="list-group-item flex-column align-items-start">
			<h5 class="mb-1">
				<a href="sua-chuong/<?php echo $value['id']; ?>">Chương <?php echo $value['num_chap']; ?>: <?php echo stripslashes($value['title']); ?></a>
			</h5>

			<div class="mt-2">
				<a href="sua-chuong/<?php echo $value['id']; ?>" class="btn btn-secondary btn-sm"><i class="far fa-edit"></i> Biên Tập</a>
				<a href="index.php?url=xu-ly-khoa-chuong&id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm ml-2" onclick="return confirm('Bạn có muốn <?php if($value['lock_chap'] == 0) echo '(khóa)'; else echo '(mở khóa)'; ?> chương [<?php echo $value['num_chap']; ?>] không?')"><i class="fas <?php if($value['lock_chap'] == 0) echo 'fa-unlock-alt'; else echo 'fa-lock-alt'; ?>"></i> <?php if($value['lock_chap'] == 1) echo 'Mở'; else echo 'Khóa'; ?></a>
				<button class="btn btn-sm btn-danger ml-2" onclick="Confirm_XoaChuong('Chương <?php echo $value['num_chap']; ?>: <?php echo $value['title']; ?>', '<?php echo $value['id']; ?>', '<?php echo $data['info']['id']; ?>')"><i class="fas fa-trash"></i> Xóa Chương</button>
			</div>
		</li>
	</ul>
	<?php } ?>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Danh Sách Chương"); 
</script>

<div id="title_u" style="display: none;"><?php echo $_GET['title']; ?></div>
<div id="id_truyen" style="display: none;"><?php echo $data['info']['id']; ?></div>