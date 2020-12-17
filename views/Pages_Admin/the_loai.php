<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Thể Loại Truyện</li>
			</ol>
		</div>
		<a class="btn btn-warning float-right" href="them-the-loai"><i class="far fa-plus"></i> Thêm Thể Loại</a>
	</div>
	<div class="card-body px-0 py-0">
		<div class="table-responsive-sm">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" width="30">#</th>
						<th scope="col">Tên Thể Loại</th>
						<th scope="col" width="60">Xóa</th>
						<th scope="col" width="60">Sửa</th>
					</tr>
				</thead>
				<tbody>
					<?php $num = 1; foreach($data['danhsach'] as $value){ ?>
					<tr class="theLoai-<?php echo $value['id']; ?>">
						<th scope="row"><?php echo $num; ?></th>
						<td><?php echo $value['title']; ?></td>
						<td><span class="btn" onclick="Confirm_Delete_TheLoai('<?php echo $value['title']; ?>', '<?php echo $value['id']; ?>')"><i class="fas fa-trash" style="color: red;"></i></span></td>
						<td><a class="btn text-primary" href="chinh-sua-the-loai/<?php echo $value['id']; ?>"><i class="far fa-edit"></i></a></td>
					</tr>
					<?php $num++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Thể Loại Truyện"); 
</script>