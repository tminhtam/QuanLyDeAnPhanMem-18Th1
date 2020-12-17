<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<h3 class="card-title mt-2"><i class="far fa-edit"></i> Tài khoản [<?php echo $_GET['user']; ?>]</h3>
		<div class="float-right">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li><a class="vang" href="tai-khoan-dang-mo">Tài Khoản Đang Mở</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Chỉnh Sửa</li>
			</ol>
		</div>
	</div>
	<form action="index.php?url=xu-ly-chinh-sua-tai-khoan" method="POST">
		<div class="card-body">
			<input hidden type="text" name="user_name" value="<?php echo $_GET['user']; ?>">
			<div class="form-group">
				<label for="type_account">Loại Tài Khoản</label>
				<select class="custom-select form-control-border" id="type_account" name="type_account">
                    <option value="1" <?php if($data['ChiTiet']['type_account'] == 1) echo "selected"; ?>>Thành Viên</option>
                    <option value="0" <?php if($data['ChiTiet']['type_account'] == 0) echo "selected"; ?>>Quản Trị Viên</option>
                </select>
			</div>
			<div class="form-group">
				<label for="Email">Email</label>
				<input name="email" type="email" class="form-control" id="Email" placeholder="Vui lòng nhập email" maxlength="60" value="<?php echo $data['ChiTiet']['email']; ?>" required>
			</div>
			<div class="form-group">
				<label for="Phone">Số Điện Thoại</label>
				<input name="phone" type="text" class="form-control" id="Phone" placeholder="Vui lòng nhập số điện thoại" maxlength="11" value="<?php echo $data['ChiTiet']['phone']; ?>" required>
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
		  <div class="text-center"><button type="submit" class="btn btn-primary" name="save"><i class="fal fa-save"></i> Luu Thay Đổi</button></div>
		</div>
	</form>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Chỉnh Sửa Tài Khoản"); 
</script>

<?php  
	if(isset($_COOKIE['error_message'])){
		echo '<script>Alert("'.$_COOKIE['error_message'].'")</script>';
	}
?>