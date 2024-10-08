<?php
include('../db/connect.php');

// Thêm cấu hình sản phẩm
if (isset($_POST['add'])) {
    $sanpham_id = $_POST['sanpham_id'];
    $cauhinh_tieude = $_POST['cauhinh_tieude'];
    $cauhinh_noidung = $_POST['cauhinh_noidung'];

    // Escape special characters
    $sanpham_id = $con->real_escape_string($sanpham_id);
    $cauhinh_tieude = $con->real_escape_string($cauhinh_tieude);
    $cauhinh_noidung = $con->real_escape_string($cauhinh_noidung);

    $sql = "INSERT INTO tbl_sanpham_chitietcauhinh (sanpham_id, cauhinh_tieude, cauhinh_noidung) 
            VALUES ('$sanpham_id', '$cauhinh_tieude', '$cauhinh_noidung')";
    if ($con->query($sql) === TRUE) {
        echo "Cấu hình sản phẩm đã được thêm thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Sửa cấu hình sản phẩm
if (isset($_POST['edit'])) {
    $cauhinh_id = $_POST['cauhinh_id'];
    $sanpham_id = $_POST['sanpham_id'];
    $cauhinh_tieude = $_POST['cauhinh_tieude'];
    $cauhinh_noidung = $_POST['cauhinh_noidung'];

    // Escape special characters
    $cauhinh_id = $con->real_escape_string($cauhinh_id);
    $sanpham_id = $con->real_escape_string($sanpham_id);
    $cauhinh_tieude = $con->real_escape_string($cauhinh_tieude);
    $cauhinh_noidung = $con->real_escape_string($cauhinh_noidung);

    $sql = "UPDATE tbl_sanpham_chitietcauhinh 
            SET sanpham_id='$sanpham_id', cauhinh_tieude='$cauhinh_tieude', cauhinh_noidung='$cauhinh_noidung' 
            WHERE cauhinh_id='$cauhinh_id'";
    if ($con->query($sql) === TRUE) {
        echo "Cấu hình sản phẩm đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Xóa cấu hình sản phẩm
if (isset($_GET['delete'])) {
    $cauhinh_id = $_GET['delete'];
    // Escape special characters
    $cauhinh_id = $con->real_escape_string($cauhinh_id);
    
    $sql = "DELETE FROM tbl_sanpham_chitietcauhinh WHERE cauhinh_id='$cauhinh_id'";
    if ($con->query($sql) === TRUE) {
        echo "Cấu hình sản phẩm đã được xóa thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Hiển thị danh sách cấu hình sản phẩm
$sql = "SELECT * FROM tbl_sanpham_chitietcauhinh";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Cấu hình Sản phẩm</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php include "dashboard.php"; ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4><?php echo isset($_GET['edit']) ? "Cập nhật Cấu hình Sản phẩm" : "Thêm Cấu hình Sản phẩm"; ?></h4>
                <form action="" method="POST">
                    <?php if (isset($_GET['edit'])): 
                        $cauhinh_id = $_GET['edit'];
                        $sql_edit = "SELECT * FROM tbl_sanpham_chitietcauhinh WHERE cauhinh_id='$cauhinh_id'";
                        $result_edit = $con->query($sql_edit);
                        $row_edit = $result_edit->fetch_assoc();
                    ?>
                    <input type="hidden" name="cauhinh_id" value="<?php echo $row_edit['cauhinh_id']; ?>">
                    <?php endif; ?>
                    <label>ID Sản phẩm</label>
                    <input type="number" class="form-control" name="sanpham_id"
                        value="<?php echo isset($row_edit) ? $row_edit['sanpham_id'] : ''; ?>" placeholder="ID Sản phẩm"
                        required><br>
                    <label>Tiêu đề Cấu hình</label>
                    <input type="text" class="form-control" name="cauhinh_tieude"
                        value="<?php echo isset($row_edit) ? $row_edit['cauhinh_tieude'] : ''; ?>"
                        placeholder="Tiêu đề Cấu hình" required><br>
                    <label>Nội dung Cấu hình</label>
                    <textarea class="form-control" name="cauhinh_noidung" placeholder="Nội dung Cấu hình" rows="10"
                        cols="50"
                        required><?php echo isset($row_edit) ? $row_edit['cauhinh_noidung'] : ''; ?></textarea><br>

                    <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add'; ?>"
                        value="<?php echo isset($_GET['edit']) ? 'Cập nhật Cấu hình' : 'Thêm Cấu hình'; ?>"
                        class="btn btn-default">

                    <?php if (isset($_GET['edit'])): ?>
                    <a href="xulythemcauhinhsp.php" class="btn btn-default">Quay lại Thêm Cấu hình Sản phẩm</a>
                    <?php endif; ?>

                </form>
            </div>

            <div class="col-md-8">
                <h4>Danh sách Cấu hình Sản phẩm</h4>
                <table class="table table-bordered ">
                    <tr>
                        <th>ID</th>
                        <th>ID Sản phẩm</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['cauhinh_id']; ?></td>
                        <td><?php echo $row['sanpham_id']; ?></td>
                        <td><?php echo $row['cauhinh_tieude']; ?></td>
                        <td><?php echo $row['cauhinh_noidung']; ?></td>
                        <td>
                            <a href="?delete=<?php echo $row['cauhinh_id']; ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> ||
                            <a href="?edit=<?php echo $row['cauhinh_id']; ?>">Cập nhật</a>
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