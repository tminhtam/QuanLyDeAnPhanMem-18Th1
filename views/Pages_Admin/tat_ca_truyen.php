<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Tất Cả Truyện</li>
			</ol>
		</div>
		<div class="input-group float-right" style="width: 180px;">
			<input id="TimTatCaTruyen" type="text" class="form-control" placeholder="Tìm truyện...">
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
						<th scope="col">Tên Truyện</th>
						<th scope="col">Tác Giả</th>
						<th scope="col">Trạng Thái</th>
						<th scope="col">Loại Truyện</th>
						<th scope="col">Lượt Xem</th>
						<th scope="col">Số Chương</th>
						<th scope="col">Người Đăng</th>
						<th scope="col">Sửa</th>
						<th scope="col">Xóa</th>
					</tr>
				</thead>
				<tbody id="GetData">
					<?php $num = 1; foreach($data['danhsach'] as $value){ ?>
					<tr class="tr-<?php echo $value['id']; ?>">
						<th scope="row"><?php echo $num; ?></th>
						<td><i class="fas fa-feather-alt"></i> <?php echo $value['title']; ?></td>
						<td><?php echo $value['author']; ?></td>
						<td><button type="button" class="btn btn-sm btn-primary"><?php echo $value['status']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-secondary"><?php echo $value['type']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-success"><?php echo $value['views']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-warning"><?php echo $value['num_chaps']; ?></button></td>
						<td><?php echo $value['user_post']; ?></td>
						<td><a class="btn text-primary" href="sua-truyen/<?php echo $value['title_u']; ?>"><i class="far fa-edit"></i></a></td>
						<td class="text-center"><button class="btn text-danger" onclick="Confirm_XoaTruyen('<?php echo $value['title']; ?>', '<?php echo $value['id']; ?>')"><i class="fas fa-trash"></i></button></td>
					</tr>
					<?php $num++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Tất Cả Truyện"); 
</script>