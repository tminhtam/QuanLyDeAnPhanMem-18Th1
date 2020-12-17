<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Tài Khoản Mới Tạo</li>
			</ol>
		</div>
		<div class="input-group float-right" style="width: 180px;">
			<input type="text" class="form-control" placeholder="Tìm tài khoản..." aria-label="Recipient's username" aria-describedby="TimTaiKhoan">
			<div class="input-group-append">
				<span class="input-group-text" id="TimTaiKhoan"><i class="far fa-search"></i></span>
			</div>
		</div>
	</div>
	<div class="card-body px-0 py-0">
		<div class="table-responsive-sm">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tên Đăng Nhập</th>
						<th scope="col">Tên Hiển Thị</th>
						<th scope="col">Mật Khẩu</th>
						<th scope="col">SĐT</th>
						<th scope="col">Mail</th>
						<th scope="col">Loại Tài Khoản</th>
						<th scope="col">Khóa</th>
						<th scope="col">Xóa</th>
						<th scope="col">Sửa</th>
					</tr>
				</thead>
				<tbody>
					<?php $num = 1; foreach($data['danhsach'] as $value){ ?>
					<tr class="tr-<?php echo $value['TenDangNhap']; ?>">
						<th scope="row"><?php echo $num; ?></th>
						<td><?php echo $value['TenDangNhap']; ?></td>
						<td><?php echo $value['TenHienThi']; ?></td>
						<td><?php echo $value['MatKhau']; ?></td>
						<td><?php echo $value['SDT']; ?></td>
						<td><?php echo $value['Mail']; ?></td>
						<td>
							<?php
								if($value['LoaiTaiKhoan'] == 0)
									echo '<span class="badge badge-warning">Quản Trị Viên</span>';
								else
									echo '<span class="badge badge-primary">Thành Viên</span>';
							?>
						</td>
						<td class="text-center">
							<?php if($value['Khoa'] == 1 && $value['TenDangNhap'] != "admin"){ ?>
								<button class="btn" onclick="Confirm_Lock('<?php echo $value['TenDangNhap']; ?>')"><i class="fas fa-unlock-alt t-<?php echo $value['TenDangNhap']; ?>" style="color: red;"></i></button>
							<?php } ?>
							<?php if($value['Khoa'] == 0 && $value['TenDangNhap'] != "admin"){ ?>
								<button class="btn" onclick="Confirm_Lock('<?php echo $value['TenDangNhap']; ?>')"><i class="fas fa-lock-alt t-<?php echo $value['TenDangNhap']; ?>" style="color: #007bff;"></i></button>
							<?php } ?>
							<?php if($value['TenDangNhap'] == "admin"){ ?>
							<button class="btn" onclick="Alert('Bạn không thể <b>khóa</b> tài khoản này!')"><i class="fas fa-unlock-alt" style="color: red;"></i></button>
							<?php } ?>
						</td>
						<td class="text-center">
							<?php if($value['Xoa'] == 1 && $value['TenDangNhap'] != "admin"){ ?>
								<button class="btn" onclick="Confirm_Delete('<?php echo $value['TenDangNhap']; ?>')"><i class="fas fa-trash x-<?php echo $value['TenDangNhap']; ?>" style="color: red;"></i></button>
							<?php } ?>
							<?php if($value['Xoa'] == 0 && $value['TenDangNhap'] != "admin"){ ?>
								<button class="btn" onclick="Confirm_Delete('<?php echo $value['TenDangNhap']; ?>')"><i class="fas fa-trash-restore x-<?php echo $value['TenDangNhap']; ?>" style="color: #007bff;"></i></button>
							<?php } ?>
							<?php if($value['TenDangNhap'] == "admin"){ ?>
							<button class="btn" onclick="Alert('Bạn không thể <b>xóa</b> tài khoản này!')"><i class="fas fa-trash" style="color: red;"></i></button>	
							<?php } ?>
						</td>
						<td class="text-center">
							<?php if($value['TenDangNhap'] == "admin"){ ?>
							<button class="btn" onclick="Alert('Bạn không thể <b>chỉnh sửa</b> tài khoản này!')"><i class="far fa-edit" style="color: #007bff;"></i></button>
							<?php } ?>
							<?php if($value['TenDangNhap'] != "admin"){ ?>	
							<a href="chinh-sua-tai-khoan/<?php echo $value['TenDangNhap']; ?>"><i class="far fa-edit"></i></a>
							<?php } ?>
						</td>
					</tr>
					<?php $num++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Danh Sách Tài Khoản"); 
</script>