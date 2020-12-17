<div class="card card-primary mx-1 mt-1">
    <div class="card-header">
        <div class="float-left">
            <ol class="thanh-dia-chi">
                <li><a class="vang" href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
                <li><span><i class="fal fa-chevron-right"></i></span></li>
                <li>Vấn Đề Phát Sinh</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card-body table-responsive p-0">
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

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Vấn Đề Phát Sinh"); 
</script>