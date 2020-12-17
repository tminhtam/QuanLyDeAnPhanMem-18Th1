<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li><a class="vang" href="danh-sach-the-loai">Thể Loại Truyện</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Chỉnh Sửa</li>
			</ol>
		</div>
	</div>
	<div class="card-body px-3 py-3">
		<div class="d-flex justify-content-center">
			<form action="index.php?url=xu-ly-chinh-sua-the-loai" method="POST">
				<input type="text" name="id" value="<?php echo $data['TheLoai']['id']; ?>" hidden>
				<div class="mr-3" style="width: 420px;">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><i class="fab fa-cuttlefish"></i> Tên Thể Loại</h3>
						</div>
						<div class="card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-heading"></i></span>
								</div>
								<input id="TenTheLoai" name="TenTheLoai" type="text" class="form-control" placeholder="Tên thể loại..." maxlength="100" value="<?php echo $data['TheLoai']['title']; ?>" required>
							</div>
						</div>
						<div class="card-footer">
							<div class="text-center">
								<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Lưu Thay Đổi</button>
							</div>
						</div>
		            </div>
				</div>
			</form>
		</div>

	</div>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Chỉnh Sửa Thể Loại"); 
</script>

<?php  
	if(isset($_COOKIE['error_message'])){
		echo '<script>Error("'.$_COOKIE['error_message'].'")</script>';
	}
	if(isset($_COOKIE['message'])){
		echo '<script>Alert("'.$_COOKIE['message'].'")</script>';
	}
?>