<div class="card card-widget widget-user">
    <div class="widget-user-header text-white" style="
        background: url(./public/images/tien-hiep-1.jpeg) no-repeat;
        background-size: 100% 300%;
        height: 245px;
        width: 100%!important;
    "></div>

    <div class="widget-user-image">
        <img class="img-fluid" src="./storage/<?php echo $data['detail']['img']; ?>" style="
            width: 175px;

        ">
    </div>
    <div class="card-footer">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><button class="btn-thong-tin-truyen btn nav-link active">Thông Tin</button></li>
                    <li class="nav-item"><button class="btn-van-de btn nav-link">Vấn Đề</button></li>
                    <li class="nav-item"><button class="btn-ds-chuong btn nav-link">DS Chương</button></li>
                </ul>
            </div>
            <div class="card-body text-left">
                <div class="thong-tin-truyen">
                    thong tin truyen
                </div>
                <div class="van-de" style="display: none;">
                    van de
                </div>
                <div class="ds-chuong" style="display: none;">
                    <!-- start ds chuong -->
                    <div class="container-fluid mt-1">
                        <a href="them-chuong/<?php echo $_GET['title']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fad fa-plus-square"></i> Thêm Chương</a>
                    </div>
                    <div id="GetData">
                        <?php foreach ($data['danhsach'] as $value){ ?>
                        <ul id="chuong-<?php echo $value['id']; ?>" class="list-group mb-4 mt-2 px-1">
                            <li class="list-group-item flex-column align-items-start">
                                <h5 class="mb-1">
                                    <a href="sua-chuong/<?php echo $value['id']; ?>">Chương <?php echo $value['num_chap']; ?>: <?php echo stripslashes($value['title']); ?></a>
                                </h5>

                                <div class="mt-2">
                                    <a href="sua-chuong/<?php echo $value['id']; ?>" class="btn btn-secondary btn-sm"><i class="far fa-edit"></i> Biên Tập</a>
                                    <a href="index.php?url=xu-ly-khoa-chuong&id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm ml-2" onclick="return confirm('Bạn có muốn <?php if($value['lock_chap'] == 0) echo '(khóa)'; else echo '(mở khóa)'; ?> chương [<?php echo $value['num_chap']; ?>] không?')"><i class="fas <?php if($value['lock_chap'] == 0) echo 'fa-unlock-alt'; else echo 'fa-lock-alt'; ?>"></i> Khóa</a>
                                    <button class="btn btn-sm btn-danger ml-2" onclick="Confirm_XoaChuong('Chương <?php echo $value['num_chap']; ?>: <?php echo $value['title']; ?>', '<?php echo $value['id']; ?>', '<?php echo $data['info']['id']; ?>')"><i class="fas fa-trash"></i> Xóa Chương</button>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                    </div>

                    <script type="text/javascript">
                        $("title").text("Trang Quản Trị | Danh Sách Chương"); 
                    </script>

                    <div id="title_u" style="display: none;"><?php echo $_GET['title']; ?></div>
                    <div id="id_truyen" style="display: none;"><?php echo $data['info']['id']; ?></div>
                    <!-- end ds chuong -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('title').text('Tàng Kinh Các | Chi Tiết Truyện');

    $(document).ready(function(){
        $('.btn-thong-tin-truyen').click(function(){
            $('.btn-ds-chuong').removeClass('active');
            $('.btn-van-de').removeClass('active');
            $(this).addClass('active');

            $('.thong-tin-truyen').show();
            $('.ds-chuong').hide();
            $('.van-de').hide();

            $(this).css("color", "blue");
            $('.btn-ds-chuong').css("color", "black");
            $('.btn-van-de').css("color", "black");
        });

        $('.btn-van-de').click(function(){
            $('.btn-thong-tin-truyen').removeClass('active');
            $('.btn-ds-chuong').removeClass('active');
            $(this).addClass('active');

            $('.van-de').show();
            $('.ds-chuong').hide();
            $('.thong-tin-truyen').hide();

            $(this).css("color", "blue");
            $('.btn-thong-tin-truyen').css("color", "black");
            $('.btn-ds-chuong').css("color", "black");
        });

        $('.btn-ds-chuong').click(function(){
            $('.btn-thong-tin-truyen').removeClass('active');
            $('.btn-van-de').removeClass('active');
            $(this).addClass('active');

            $('.ds-chuong').show();
            $('.thong-tin-truyen').hide();
            $('.van-de').hide();

            $(this).css("color", "blue");
            $('.btn-thong-tin-truyen').css("color", "black");
            $('.btn-van-de').css("color", "black");
        });
    });
</script>