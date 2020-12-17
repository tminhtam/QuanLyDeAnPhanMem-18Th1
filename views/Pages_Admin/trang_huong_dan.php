<div class="card card-primary mx-1 mt-1">
    <div class="card-header">
        <div class="float-left">
            <ol class="thanh-dia-chi">
                <li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li>Đăng Truyện</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-outline card-info">
        <form action="index.php?url=xu-ly-huong_dan" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="review"><i class="fas fa-compass"></i> Nội Dung Trang Hướng Dẫn</label>
                    <textarea class="form-control ckeditor" name="content" placeholder="Nội dung..."><?php echo $data['huongdan']['content']; ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Lưu Trang</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php  
    if(isset($_COOKIE['error_message'])){
        echo '<script>Error("'.$_COOKIE['error_message'].'")</script>';
    }

    if(isset($_COOKIE['message'])){
        echo '<script>Alert("'.$_COOKIE['message'].'")</script>';
    }
?>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Chỉnh Sửa Trang Hướng Dẫn"); 
</script>