<div class="card card-primary mx-1 mt-1">
    <div class="card-header">
        <div class="float-left">
            <ol class="thanh-dia-chi">
                <li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li>Cài Đặt Hệ Thống</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-outline card-info">
        <form action="index.php?url=xu-ly-cai-dat" method="POST">
            <div class="card-body">
                <div>
                    <input type="checkbox" name="my-checkbox" id="BaoTri" <?php if($data['baoTri'] == 1) echo "checked"; ?> data-bootstrap-switch>
                    <label for="BaoTri" style="cursor: pointer;">&nbsp;&nbsp; Bảo Trì Hệ Thống</label>
                    (<small class="text-muted"><i class="fas fa-exclamation-triangle"></i> Trang web sẽ <b>dừng hoạt động</b> cho đến khi được mở lại!</small>)
                </div>
                <div class="mt-3">
                    <input type="checkbox" name="my-checkbox" id="CayView" <?php if($data['cayViews'] == 1) echo "checked"; ?> data-bootstrap-switch>
                    <label for="CayView" style="cursor: pointer;">&nbsp;&nbsp; Cày Lượt Xem</label>
                    (<small class="text-muted"><i class="fas fa-exclamation-triangle"></i> Nếu <b>bật</b> tinh năng này thì <b>f5</b> sẽ tăng lượt xem của truyện!</small>)
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
    $("title").text("Trang Quản Trị | Cài Đặt"); 
</script>