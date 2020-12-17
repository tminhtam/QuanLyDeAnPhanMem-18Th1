<div class="card card-primary mx-1 mt-1">
    <div class="card-header">
        <div class="float-left">
            <ol class="thanh-dia-chi">
                <li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li><a class="vang" href="truyen-cua-toi">Truyện Của Tôi</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li><?php echo stripslashes($data['chuong']['title']); ?></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li>Sửa Chương</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-outline card-info">
        <form action="index.php?url=xu-ly-sua-chuong" method="POST">
            <input type="text" name="id" value="<?php echo $data['chuong']['id']; ?>" hidden>
            <input type="text" name="id_truyen" value="<?php echo $data['chuong']['id_truyen']; ?>" hidden>

            <div class="card-body">
                <div id="div_id_chap_num" class="form-group">
                    <label for="id_chap_num" class="col-form-label  requiredField">Chương Số</label>
                    <div>
                        <input type="number" name="chap_num" value="<?php echo $data['chuong']['num_chap']; ?>" class="weui_input weui-input form-control" placeholder="Chương số..." required/>
                    </div>
                </div>

                <div id="div_id_chap_title" class="form-group">
                    <label for="id_chap_title" class="col-form-label ">Tiêu Đề Chương</label>
                    <div> 
                        <input id="TieuDeChuong" type="text" name="chap_title" class="weui_input weui-input form-control" placeholder="Tiêu đề chương..." value="<?php echo stripslashes($data['chuong']['title']); ?>" required/>
                        <small id="hint_id_chap_title" class="form-text text-muted">Không thêm cụm chương xx vào trong này.</small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content"><i class="fas fa-compass"></i> Nội Dung Chương</label>
                    <textarea class="form-control ckeditor" name="content" id="content" placeholder="Tóm tắt truyện ngắn gọn..." required><?php echo $data['chuong']['content']; ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button name="luu-va-thoat" type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Lưu Và Thoát</button>
                    <button name="luu-va-chinh-sua" type="submit" class="btn btn-warning"><i class="fal fa-save"></i> Lưu Và Chỉnh Sửa</button>
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
    $("title").text("Trang Quản Trị | Sửa Chương"); 
</script>

<script type="text/javascript">
    $('#TieuDeChuong').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
</script>