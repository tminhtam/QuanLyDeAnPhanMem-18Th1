<div class="card card-primary mx-1 mt-1">
	<div class="card-header">
		<div class="float-left">
			<ol class="thanh-dia-chi">
				<li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
				<li><span><i class="fal fa-chevron-right"></i></span></li>
				<li>Thông Tin Tài Khoản</li>
			</ol>
		</div>
	</div>
	<div class="card-body px-3 py-3">
		<div class="float-left mr-3" style="width: 320px;">
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-user-shield"></i> Loại Tài Khoản</h3>
				</div>
				<div class="card-body">
					Tài khoản hiện tại của bạn là: <b>
					<?php 
						if($_SESSION['tangkinhcac_loai'] == 0)
							echo "Quản Trị Viên";
						else
							echo "Thành Viên";
					?>
				</b>
				</div>
            </div>
		</div>
		<div class="float-left mr-3" style="width: 320px;">
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-user-shield"></i> Khóa Tài Khoản</h3>
				</div>
				<div class="card-body">
					Tài khoản hiện tại của bạn: <b>không bị khóa</b>
				</div>
            </div>
		</div>
		<div class="float-left mr-3" style="width: 320px;">
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-user-shield"></i> Xóa Tài Khoản</h3>
				</div>
				<div class="card-body">
					Tài khoản hiện tại của bạn: <b>không bị xóa</b>
				</div>
            </div>
		</div>

	</div>
</div>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Thông Tin Tài Khoản"); 
</script>