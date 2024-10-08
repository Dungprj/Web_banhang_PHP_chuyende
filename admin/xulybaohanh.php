<?php
include('../db/connect.php');

// Khởi tạo biến thông báo
$message = '';

// Thêm thông tin bảo hành
if (isset($_POST['thembh'])) {
    $sanpham_id = $_POST['sanpham_id'];
    $bao_hanh = $_POST['bao_hanh'];
    $thong_tin_khac = $_POST['thong_tin_khac'];

    // Kiểm tra xem thông tin có đầy đủ không
    if (empty($sanpham_id) || empty($bao_hanh)) {
        $message = "Vui lòng điền đầy đủ thông tin sản phẩm và bảo hành.";
    } else {
        // Chạy truy vấn thêm thông tin bảo hành
        $sql_insert = mysqli_query($con, "INSERT INTO tbl_sanpham_thongtinkhac(sanpham_id, bao_hanh, thong_tin_khac) VALUES ('$sanpham_id', '$bao_hanh', '$thong_tin_khac')");
        
        if ($sql_insert) {
            $message = "Thông tin bảo hành đã được thêm thành công.";
        } else {
            $message = "Lỗi: " . mysqli_error($con);
        }
    }
    header('Location:xulybaohanh.php?message=' . urlencode($message));
    exit; // Dừng script sau khi redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý bảo hành</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php include "dashboard.php"; ?>
    <br><br>
    <div class="container">
        <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <h4>Thêm thông tin bảo hành</h4>
                <form action="" method="POST">
                    <label>Sản phẩm ID</label>
                    <input type="text" class="form-control" name="sanpham_id" placeholder="Sản phẩm ID" required><br>
                    <label>Bảo hành</label>
                    <input type="text" class="form-control" name="bao_hanh" placeholder="Bảo hành" required><br>
                    <label>Thông tin khác</label>
                    <textarea class="form-control" name="thong_tin_khac" placeholder="Thông tin khác"></textarea><br>
                    <input type="submit" name="thembh" value="Thêm bảo hành" class="btn btn-default">
                </form>
            </div>
            <div class="col-md-8">
                <h4>Liệt kê thông tin bảo hành</h4>
                <?php
                // Lấy danh sách thông tin bảo hành từ bảng tbl_sanpham_thongtinkhac
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham_thongtinkhac ORDER BY thongtin_id DESC");
                ?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Sản phẩm ID</th>
                        <th>Bảo hành</th>
                        <th>Thông tin khác</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row_bh = mysqli_fetch_array($sql_select)) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo htmlspecialchars($row_bh['sanpham_id']); ?></td>
                        <td><?php echo htmlspecialchars($row_bh['bao_hanh']); ?></td>
                        <td><?php echo htmlspecialchars($row_bh['thong_tin_khac']); ?></td>
                        <td>
                            <a href="?xoa=<?php echo $row_bh['thongtin_id']; ?>">Xóa</a> ||
                            <a href="?quanly=capnhat&id=<?php echo $row_bh['thongtin_id']; ?>">Cập nhật</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$con->close();
?>