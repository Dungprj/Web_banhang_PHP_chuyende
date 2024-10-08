<?php
include('../db/connect.php');

// Thêm giới thiệu sản phẩm
if (isset($_POST['add'])) {
    $sanpham_id = $_POST['sanpham_id'];
    $gioithieu_noidung = $_POST['gioithieu_noidung'];

    // Escape special characters
    $sanpham_id = $con->real_escape_string($sanpham_id);
    $gioithieu_noidung = $con->real_escape_string($gioithieu_noidung);

    $sql = "INSERT INTO tbl_sanpham_gioithieu (sanpham_id, gioithieu_noidung) VALUES ('$sanpham_id', '$gioithieu_noidung')";
    if ($con->query($sql) === TRUE) {
        echo "Giới thiệu sản phẩm đã được thêm thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Sửa giới thiệu sản phẩm
if (isset($_POST['edit'])) {
    $gioithieu_id = $_POST['gioithieu_id'];
    $sanpham_id = $_POST['sanpham_id'];
    $gioithieu_noidung = $_POST['gioithieu_noidung'];

    // Escape special characters
    $gioithieu_id = $con->real_escape_string($gioithieu_id);
    $sanpham_id = $con->real_escape_string($sanpham_id);
    $gioithieu_noidung = $con->real_escape_string($gioithieu_noidung);

    $sql = "UPDATE tbl_sanpham_gioithieu SET sanpham_id='$sanpham_id', gioithieu_noidung='$gioithieu_noidung' WHERE gioithieu_id='$gioithieu_id'";
    if ($con->query($sql) === TRUE) {
        echo "Giới thiệu sản phẩm đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Xóa giới thiệu sản phẩm
if (isset($_GET['delete'])) {
    $gioithieu_id = $_GET['delete'];
    // Escape special characters
    $gioithieu_id = $con->real_escape_string($gioithieu_id);
    
    $sql = "DELETE FROM tbl_sanpham_gioithieu WHERE gioithieu_id='$gioithieu_id'";
    if ($con->query($sql) === TRUE) {
        echo "Giới thiệu sản phẩm đã được xóa thành công.";
    } else {
        echo "Lỗi: " . $con->error;
    }
}

// Hiển thị danh sách giới thiệu sản phẩm
$sql = "SELECT * FROM tbl_sanpham_gioithieu";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Giới thiệu Sản phẩm</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php include "dashboard.php"; ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4><?php echo isset($_GET['edit']) ? "Cập nhật Giới thiệu Sản phẩm" : "Thêm Giới thiệu Sản phẩm"; ?>
                </h4>
                <form action="" method="POST">
                    <?php if (isset($_GET['edit'])): 
                        $gioithieu_id = $_GET['edit'];
                        $sql_edit = "SELECT * FROM tbl_sanpham_gioithieu WHERE gioithieu_id='$gioithieu_id'";
                        $result_edit = $con->query($sql_edit);
                        $row_edit = $result_edit->fetch_assoc();
                    ?>
                    <input type="hidden" name="gioithieu_id" value="<?php echo $row_edit['gioithieu_id']; ?>">
                    <?php endif; ?>
                    <label>ID Sản phẩm</label>
                    <input type="number" class="form-control" name="sanpham_id"
                        value="<?php echo isset($row_edit) ? $row_edit['sanpham_id'] : ''; ?>" placeholder="ID Sản phẩm"
                        required><br>
                    <label>Nội dung giới thiệu</label>
                    <textarea class="form-control" name="gioithieu_noidung" placeholder="Nội dung giới thiệu" rows="10"
                        cols="50"
                        required><?php echo isset($row_edit) ? $row_edit['gioithieu_noidung'] : ''; ?></textarea><br>

                    <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add'; ?>"
                        value="<?php echo isset($_GET['edit']) ? 'Cập nhật Giới thiệu' : 'Thêm Giới thiệu'; ?>"
                        class="btn btn-default">

                    <?php if (isset($_GET['edit'])): ?>
                    <a href="xulythemgioithieusp.php" class="btn btn-default">Quay lại Thêm Giới thiệu Sản phẩm</a>
                    <?php endif; ?>

                </form>
            </div>

            <div class="col-md-8">
                <h4>Danh sách Giới thiệu Sản phẩm</h4>
                <table class="table table-bordered ">
                    <tr>
                        <th>ID</th>
                        <th>ID Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['gioithieu_id']; ?></td>
                        <td><?php echo $row['sanpham_id']; ?></td>
                        <td><?php echo $row['gioithieu_noidung']; ?></td>
                        <td>
                            <a href="?delete=<?php echo $row['gioithieu_id']; ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> ||
                            <a href="?edit=<?php echo $row['gioithieu_id']; ?>">Cập nhật</a>
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