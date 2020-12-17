<div class="card card-primary mx-1 mt-1">
    <div class="card-header">
        <div class="float-left">
            <ol class="thanh-dia-chi">
                <li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li><a class="vang" href="truyen-cua-toi">Truyện Của Tôi</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li><?php echo $data['truyen']['title']; ?></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li>Thêm Chương</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-outline card-info">
        <form action="index.php?url=xu-ly-them-chuong" method="POST">
        	<input type="text" name="id" value="<?php echo $data['truyen']['id']; ?>" hidden>
            <input type="text" name="title_curr" value="<?php echo $_GET['title']; ?>" hidden>
            <div class="card-body">
                <div id="div_id_chap_num" class="form-group">
					<label for="id_chap_num" class="col-form-label  requiredField">Chương Số*</label>
					<div>
						<input type="number" name="chap_num" value="<?php echo $data['truyen']['num_chaps'] + 1; ?>" class="weui_input weui-input form-control" placeholder="Chương số..." required/>
					</div>
				</div>

				<div id="div_id_chap_title" class="form-group">
					<label for="id_chap_title" class="col-form-label ">Tiêu Đề Chương*</label>
					<div> 
						<input id="TieuDeChuong" type="text" name="chap_title" class="weui_input weui-input form-control" placeholder="Tiêu đề chương..." required/>
						<small id="hint_id_chap_title" class="form-text text-muted">Không thêm cụm chương xx vào trong này.</small>
					</div>
				</div>

				<div class="form-group">
                    <label for="content"><i class="fas fa-compass"></i> Nội Dung Chương*</label>
                    <textarea class="form-control ckeditor" name="content" id="content" placeholder="Tóm tắt truyện ngắn gọn..." required></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Lưu Chương</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php  
    if(isset($_COOKIE['error_message'])){
        echo '<script>Error("'.$_COOKIE['error_message'].'")</script>';
    }
?>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Thêm Chương"); 
</script>

<script type="text/javascript">
    $('#TieuDeChuong').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
</script>