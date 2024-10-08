<?php
include('../db/connect.php');

// Thêm sản phẩm
if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    
    $anhmota_1 = $_FILES['hinhanhmota1']['name'];
    $anhmota_2 = $_FILES['hinhanhmota2']['name'];
    $anhmota_3 = $_FILES['hinhanhmota3']['name'];
    $anhmota_4 = $_FILES['hinhanhmota4']['name'];

    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $hang = $_POST['hang'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';

    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh_mota_1_tmp = $_FILES['hinhanhmota1']['tmp_name'];
    $hinhanh_mota_2_tmp = $_FILES['hinhanhmota2']['tmp_name'];
    $hinhanh_mota_3_tmp = $_FILES['hinhanhmota3']['tmp_name'];
    $hinhanh_mota_4_tmp = $_FILES['hinhanhmota4']['tmp_name'];

		$sql_insert_product = mysqli_query($con, "INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id,brands_id) VALUES ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc','$hang')");

    if ($sql_insert_product) {
        // Lấy ID của sản phẩm vừa thêm vào
        $sanpham_id = mysqli_insert_id($con);
        echo "Sản phẩm đã được thêm thành công với ID: " . $sanpham_id;

        // Thêm hình ảnh mô tả
        if ($anhmota_1) {
            mysqli_query($con, "INSERT INTO tbl_sanpham_images(sanpham_id,image_url,thutu) VALUES ('$sanpham_id','$anhmota_1','1')");
        }
        if ($anhmota_2) {
            mysqli_query($con, "INSERT INTO tbl_sanpham_images(sanpham_id,image_url,thutu) VALUES ('$sanpham_id','$anhmota_2','2')");
        }
        if ($anhmota_3) {
            mysqli_query($con, "INSERT INTO tbl_sanpham_images(sanpham_id,image_url,thutu) VALUES ('$sanpham_id','$anhmota_3','3')");
        }
        if ($anhmota_4) {
            mysqli_query($con, "INSERT INTO tbl_sanpham_images(sanpham_id,image_url,thutu) VALUES ('$sanpham_id','$anhmota_4','4')");
        }

        // Di chuyển hình ảnh vào thư mục uploads
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        move_uploaded_file($hinhanh_mota_1_tmp, $path . $anhmota_1);
        move_uploaded_file($hinhanh_mota_2_tmp, $path . $anhmota_2);
        move_uploaded_file($hinhanh_mota_3_tmp, $path . $anhmota_3);
        move_uploaded_file($hinhanh_mota_4_tmp, $path . $anhmota_4);
    } else {
        echo "Có lỗi khi thêm sản phẩm: " . mysqli_error($con);
    }
}

// Cập nhật sản phẩm
if (isset($_POST['capnhatsanpham'])) {
    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $hang = $_POST['hang'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';

    // Cập nhật ảnh mô tả nếu có
    foreach (range(1, 4) as $index) {
        $input_name = 'hinhanhmota' . $index;
        if (isset($_FILES[$input_name]['name']) && $_FILES[$input_name]['name'] != "") {
            $anhmota = $_FILES[$input_name]['name'];
            $hinhanh_mota_tmp = $_FILES[$input_name]['tmp_name'];
            move_uploaded_file($hinhanh_mota_tmp, $path . $anhmota);
            mysqli_query($con, "UPDATE tbl_sanpham_images SET image_url='$anhmota' WHERE sanpham_id='$id_update' AND thutu='$index'");
        }
    }

    // Cập nhật ảnh chính nếu có upload
    if ($hinhanh != '') {
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $path . $hinhanh);
        $sql_update = "UPDATE tbl_sanpham SET 
            sanpham_name='$tensanpham', 
            sanpham_chitiet='$chitiet',
            sanpham_mota='$mota', 
            sanpham_gia='$gia', 
            sanpham_giakhuyenmai='$giakhuyenmai',
            sanpham_soluong='$soluong',
            sanpham_image='$hinhanh', 
            category_id='$danhmuc', 
            brands_id='$hang' 
            WHERE sanpham_id='$id_update'";
    } else {
        // Không thay đổi ảnh chính
        $sql_update = "UPDATE tbl_sanpham SET 
            sanpham_name='$tensanpham', 
            sanpham_chitiet='$chitiet',
            sanpham_mota='$mota', 
            sanpham_gia='$gia', 
            sanpham_giakhuyenmai='$giakhuyenmai',
            sanpham_soluong='$soluong', 
            category_id='$danhmuc', 
            brands_id='$hang' 
            WHERE sanpham_id='$id_update'";
    }

    // Thực thi truy vấn cập nhật
    if (mysqli_query($con, $sql_update)) {
        echo "Cập nhật sản phẩm thành công!";
    } else {
        echo "Có lỗi khi cập nhật sản phẩm: " . mysqli_error($con);
    }
}

// Xóa sản phẩm
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa_list_img_mota = mysqli_query($con, "DELETE FROM tbl_sanpham_images WHERE sanpham_id='$id'");
    $sql_xoa = mysqli_query($con, "DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sản phẩm</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php include "dashboard.php"; ?>
    <br><br>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['quanly']) && $_GET['quanly'] == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
                $id_category_1 = $row_capnhat['category_id'];
                $id_hang_1 = $row_capnhat['brands_id'];

                $sql_get_list_img = mysqli_query($con, "SELECT * FROM tbl_sanpham_images WHERE sanpham_id = $id_capnhat");
                $images_update = [];
                while ($row_img = mysqli_fetch_array($sql_get_list_img)) {
                    $images_update[] = $row_img['image_url'];
                }
                ?>
            <div class="col-md-4">
                <h4>Cập nhật sản phẩm</h4>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham"
                        value="<?php echo $row_capnhat['sanpham_name'] ?>" required><br>
                    <input type="hidden" class="form-control" name="id_update"
                        value="<?php echo $row_capnhat['sanpham_id'] ?>">
                    <label>Hình ảnh</label>
                    <br>
                    <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80">
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="soluong"
                        value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" name="giasanpham"
                        value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai"
                        value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
                    <label>Danh mục</label>
                    <select name="danhmuc" class="form-control">
                        <?php
                            $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category");
                            while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>"
                            <?php if ($row_danhmuc['category_id'] == $id_category_1) echo 'selected'; ?>>
                            <?php echo $row_danhmuc['category_name'] ?>
                        </option>
                        <?php
                            }
                            ?>
                    </select>
                    <label>Hãng</label>
                    <select name="hang" class="form-control">
                        <?php
                            $sql_hang = mysqli_query($con, "SELECT * FROM tbl_brands");
                            while ($row_hang = mysqli_fetch_array($sql_hang)) {
                                ?>
                        <option value="<?php echo $row_hang['brands_id'] ?>"
                            <?php if ($row_hang['brands_id'] == $id_hang_1) echo 'selected'; ?>>
                            <?php echo $row_hang['brands_name'] ?>
                        </option>
                        <?php
                            }
                            ?>
                    </select>
                    <label>Chi tiết sản phẩm</label>
                    <textarea class="form-control" name="chitiet"
                        rows="5"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea><br>
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="mota"
                        rows="5"><?php echo $row_capnhat['sanpham_mota'] ?></textarea><br>
                    <h4>Hình ảnh mô tả</h4>
                    <?php foreach ($images_update as $index => $img): ?>
                    <img src="../uploads/<?php echo $img ?>" height="80" width="80">
                    <input type="file" class="form-control" name="hinhanhmota<?php echo $index + 1 ?>"><br>
                    <?php endforeach; ?>
                    <button type="submit" name="capnhatsanpham" class="btn btn-primary">Cập nhật sản phẩm</button>
                    <button type="submit" name="themsanpham" class="btn btn-primary"><a href="xulysanpham.php"
                            style="color: white;">quay lại
                            thêm sản phẩm</a></button>
                </form>
            </div>
            <?php
            } else {
                ?>
            <div class="col-md-4">
                <h4>Thêm sản phẩm</h4>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham"><br>
                    <label>Hình ảnh chính</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="soluong"><br>
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" name="giasanpham"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai"><br>
                    <label>Danh mục</label>
                    <select name="danhmuc" class="form-control">
                        <?php
                            $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category");
                                ?>
                        <option value="0">----chọn danh mục----</option>
                        <?php
        				// Lấy danh sách danh mục
        				while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
            				echo "<option value='{$row_danhmuc['category_id']}' " . ($row_danhmuc['category_id'] == $row_capnhat['category_id'] ? 'selected' : '') . ">{$row_danhmuc['category_name']}</option>";
        				}
    					?>

                    </select>
                    <label>Hãng</label>
                    <select name="hang" class="form-control">
                        <option value="0">----chọn hãng----</option>
                        <?php
        $sql_hang = mysqli_query($con, "SELECT * FROM tbl_brands");
        
        // Lấy danh sách hãng
        while ($row_hang = mysqli_fetch_array($sql_hang)) {
            // Kiểm tra nếu biến $row_capnhat['brands_id'] có giá trị hợp lệ
            $selected = (isset($row_capnhat['brands_id']) && $row_hang['brands_id'] == $row_capnhat['brands_id']) ? 'selected' : '';
            echo "<option value='{$row_hang['brands_id']}' {$selected}>{$row_hang['brands_name']}</option>";
        }
    ?>
                    </select>
                    <label>Chi tiết sản phẩm</label>
                    <textarea class="form-control" name="chitiet" rows="5"></textarea><br>
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="mota" rows="5"></textarea><br>
                    <h4>Hình ảnh mô tả</h4>
                    <input type="file" class="form-control" name="hinhanhmota1"><br>
                    <input type="file" class="form-control" name="hinhanhmota2"><br>
                    <input type="file" class="form-control" name="hinhanhmota3"><br>
                    <input type="file" class="form-control" name="hinhanhmota4"><br>
                    <button type="submit" name="themsanpham" class="btn btn-primary">Thêm sản phẩm</button>
                </form>
            </div>
            <?php
            }
            ?>
            <div class="col-md-8">
                <h4>Liệt kê sản phẩm</h4>
                <?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id  ORDER BY tbl_sanpham.sanpham_id DESC"); 
				?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Hình ảnh mô tả </th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
						// Lấy ID sản phẩm hiện tại
						$sanpham_id = $row_sp['sanpham_id'];
            
						// Truy vấn để lấy hình ảnh cho sản phẩm hiện tại
						$sql_get_list_img = mysqli_query($con,"SELECT * FROM tbl_sanpham_images WHERE sanpham_id = $sanpham_id");
						
						// Khởi tạo mảng để lưu trữ hình ảnh
						$images = [];
						while ($row_img = mysqli_fetch_array($sql_get_list_img)) {
							$images[] = $row_img['image_url']; // Giả sử cột chứa hình ảnh trong tbl_sanpham_images là 'image'
						}
					?>
                    <tr>
                        <td>
                            <?php echo $i ?>

                            <input type="hidden" name="sanpham_id" value=<?php echo $row_sp['sanpham_id']?>>
                        </td>

                        <td><?php echo $row_sp['sanpham_id']; ?></td>

                        <td><?php echo $row_sp['sanpham_name'] ?></td>
                        <td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
                        <td>
                            <?php if (!empty($images)): ?>
                            <?php foreach ($images as $image): ?>
                            <img src="../uploads/<?php echo $image; ?>" height="100" width="80"
                                style="margin-right: 5px;">
                            <?php endforeach; ?>
                            <?php else: ?>
                            <p>Không có hình ảnh</p>
                            <?php endif; ?>
                        </td>



                        <td><?php echo $row_sp['sanpham_soluong'] ?></td>
                        <td><?php echo $row_sp['category_name'] ?></td>
                        <td><?php echo number_format($row_sp['sanpham_gia']).' vnđ' ?></td>
                        <td><?php echo $row_sp['sanpham_giakhuyenmai'] == null ? "" :$row_sp['sanpham_giakhuyenmai'].' vnđ' ?>
                        </td>
                        <td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a> || <a
                                href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Cập
                                nhật</a></td>
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