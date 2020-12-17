<!-- nội dung truyện -->
		<?php require_once "./libs/functions.php";
		foreach($data['danhsach'] as $value){ ?>
		<ul id="del-11" class="list-group mb-3">
			<li class="list-group-item flex-column align-items-start">
				<div class="float-left">
					<img src="./storage/<?php echo $value['img']; ?>" style="width: 80px; height: 113px;">
				</div>
				<div class="float-left ml-3">
					<h5 class="mb-1 font-weight-bold">
							<a href="#" target="_blank"><i class="fas fa-feather-alt"></i> <?php echo $value['title']; ?></a>
					</h5>
					<small title="Tác giả"><i class="fas fa-user"></i> <?php echo $value['author']; ?></small> | <small><i class="fal fa-clock"></i> <?php echo DateToTime($value['date_update']); ?></small>
					<div class="mt-2">
						<a href="them-chuong/<?php echo $value['title_u']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fad fa-plus-square"></i> Thêm Chương</a>
						<a href="danh-sach-chuong/<?php echo $value['title_u']; ?>" class="btn btn-success btn-sm mt-1"><i class="far fa-list"></i> Danh Sách Chương</a>
						<a href="sua-truyen/<?php echo $value['title_u']; ?>" class="btn btn-secondary btn-sm mt-1"><i class="far fa-edit"></i> Sửa Truyện</a>
					</div>
				</div>
				<div class="float-right ml-3">
					<span class="btn" title="lượt xem" style="cursor: pointer;"><i class="far fa-eye"></i> <?php echo $value['views']; ?></span> <br>
					<span class="btn" title="Số chương" style="cursor: pointer;"><i class="fas fa-lg fa-sort-numeric-up-alt"></i> <?php echo $value['num_chaps']; ?></span>
				</div>
			</li> 
		</ul>
		<?php } ?>