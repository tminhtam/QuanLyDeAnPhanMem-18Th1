<div class="my-card card shadow-sm mb-3">
	<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="far fa-fire-alt"></i> THỂ LOẠI TRUYỆN <span class="float-right" style="color: gold;"><?php echo count($data['tat_ca_the_loai']); ?> THỂ LOẠI</span></h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<?php foreach($data['tat_ca_the_loai'] as $value){ ?>
			<div class="col-6 col-xl-2 col-lg-3 col-md-4 col-sm-6">
				<a href="the-loai/<?php echo $value['title']; ?>" class="genre">
					<div class="icon float-left"><img src="./public/images/lich-su.png"></div>
					<div class="ml-2 float-left">
						<div class="name_tl"><?php echo $value['title']; ?></div>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('title').text("Tàng Kinh Các | Tất Cả Thể Loại");
</script>