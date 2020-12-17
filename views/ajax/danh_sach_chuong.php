<?php foreach ($data['danhsach'] as $value){ ?>
	<ul id="chuong-<?php echo $value['id']; ?>" class="list-group mb-4 mt-2 px-1">
		<li class="list-group-item flex-column align-items-start">
			<h5 class="mb-1">
				<a href="#" target="_blank">Chương <?php echo $value['num_chap']; ?>: <?php echo $value['title']; ?></a>
			</h5>

			<div class="mt-2">
				<a href="sua-chuong/<?php echo $value['id']; ?>" class="btn btn-secondary btn-sm"><i class="far fa-edit"></i> Biên Tập</a>
				<button class="btn btn-sm btn-danger" onclick="Confirm_XoaChuong('Chương <?php echo $value['num_chap']; ?>: <?php echo $value['title']; ?>', '<?php echo $value['id']; ?>', '<?php echo $data['info']['id']; ?>')"><i class="fas fa-trash"></i> Xóa Chương</button>
			</div>
		</li>
	</ul>
<?php } ?>