<?php require_once "./libs/functions.php"; ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Bảng Điều Khiển</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Bảng Điều Khiển</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $_SESSION['tangkinhcac_tatcatruyen']; ?></h3>
                        <p>Tất Cả Truyện</p>
                    </div>
                    <div class="icon">
                        <i class="fab fa-usps"></i>
                    </div>
                    <a href="tat-ca-truyen" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $data['truyen_moi_tao']; ?></h3>
                        <p>Truyện Mới Tạo Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <a href="truyen-moi-tao" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
  
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $data['tai_khoan_moi_tao']; ?></h3>
                        <p>Tài Khoản Mới Tạo</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="tai-khoan-moi-tao" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $data['tat_ca_tai_khoan']; ?></h3>
                        <p>Tất Cả Tài Khoản</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="tai-khoan-dang-mo" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Nhật Ký Log
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hành Động</th>
                                <th scope="col">Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $hang=1; foreach($data['ban_ghi'] as $value){ ?>
                            <tr>
                                <th scope="row"><?php echo $hang; ?></th>
                                <td><?php echo $value['action']; ?></td>
                                <td><?php ConvertDate($value['curr_time']); ?></td>
                            </tr>
                            <?php $hang++;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card direct-chat direct-chat-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-hourglass-start"></i> Truyện Bạn Mới Cập Nhật</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <?php if(isset($data['truyen_moi_cap_nhat']['img'])){ ?>
                <div class="container pt-2 px-3">
                    <div class="float-left">
                        <img src="./storage/<?php echo $data['truyen_moi_cap_nhat']['img']; ?>" style="width: 80px; height: 113px;">
                    </div>
                    <div class="float-left ml-3">
                        <h5 class="mb-1 font-weight-bold">
                                <a href="#" target="_blank"><i class="fas fa-feather-alt"></i> <?php echo $data['truyen_moi_cap_nhat']['title']; ?></a>
                        </h5>
                        <small title="Tác giả"><i class="fas fa-user"></i> <?php echo $data['truyen_moi_cap_nhat']['author']; ?></small> | <small><i class="fal fa-clock"></i> <?php echo DateToTime($data['truyen_moi_cap_nhat']['date_update']); ?></small>
                        <div class="mt-2">
                            <a href="them-chuong/<?php echo $data['truyen_moi_cap_nhat']['title_u']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fad fa-plus-square"></i> Thêm Chương</a>
                            <a href="danh-sach-chuong/<?php echo $data['truyen_moi_cap_nhat']['title_u']; ?>" class="btn btn-success btn-sm mt-1"><i class="far fa-list"></i> Danh Sách Chương</a>
                            <a href="sua-truyen/<?php echo $data['truyen_moi_cap_nhat']['title_u']; ?>" class="btn btn-secondary btn-sm mt-1"><i class="far fa-edit"></i> Sửa Truyện</a>
                        </div>
                    </div>
                    <div class="pb-2" style="clear: both;"></div>
                </div>
                <?php } ?>
            </div>
        </div>

    </section>

    <section class="col-lg-5 connectedSortable">
        <div class="card card-widget widget-user">
            <div class="widget-user-header text-white" style="background: url('./public/images/tien-hiep-1.jpeg') center center;"></div>
            <div class="widget-user-image">
                <img class="img-circle" src="./public/images/default-avatar.jpeg" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><img src="./public/images/book.png" class="img-circle elevation-2" width="50"></h5>
                            <span class="description-text">Số Truyện</span><br>
                            <span class="description-text"><b class="text-danger" style="font-size: 18px;"><?php echo $_SESSION['tangkinhcac_truyencuatoi']; ?></b></span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><img src="./public/images/chuong.png" class="img-circle elevation-2" width="50"></h5>
                            <span class="description-text">Số Chương</span><br>
                            <span class="description-text">N/A</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"><img src="./public/images/thanh-tich.png" class="img-circle elevation-2" width="50"></h5>
                            <span class="description-text">Thành Tích</span><br>
                            <span class="description-text">N/A</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bug mr-1"></i>
                    Truyện Phát Sinh Lỗi
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Tên Truyện</th>
                        <th>Nội Dung</th>
                        <th>Thời Gian</th>
                        <th>Đã Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $hang=1; foreach($data['loi_truyen'] as $value){ ?>
                        <tr class="tr-truyen-loi-<?php echo $value['id']; ?>">
                            <td><?php echo $hang; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo $value['content']; ?></td>
                            <td><span class="tag tag-success"><?php echo $value['date_feedback']; ?></span></td>
                            <td><button class="btn btn-sm btn-warning" onclick="DeFixTruyenLoi('<?php echo $value['id']; ?>')"><i class="far fa-check"></i> Đã Fix</button></td>
                        </tr>
                        <?php $hang++;} ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

</div>
</section>


<script type="text/javascript">
    $("title").text("Trang Quản Trị | Bảng Điều Khiển"); 
</script>