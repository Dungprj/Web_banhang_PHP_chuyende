<?php
	include('../db/connect.php');
?>
<?php
	// Thêm hãng sản phẩm
	if(isset($_POST['themhang'])){
		$tenhang = $_POST['hang'];
		$sql_insert = mysqli_query($con,"INSERT INTO tbl_brands(brands_name) VALUES ('$tenhang')");
	}
	// Cập nhật hãng sản phẩm
	elseif(isset($_POST['capnhathang'])){
		$id_post = $_POST['id_hang'];
		$tenhang = $_POST['hang'];
		$sql_update = mysqli_query($con,"UPDATE tbl_brands SET brands_name='$tenhang' WHERE brands_id='$id_post'");
		header('Location:xulyhang.php');
	}
	// Xóa hãng sản phẩm
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_brands WHERE brands_id='$id'");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý hãng</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php include "dashboard.php";?>
    <br><br>
    <div class="container">
        <div class="row">
            <?php
			// Kiểm tra xem có yêu cầu cập nhật hay không
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_brands WHERE brands_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				?>
            <div class="col-md-4">
                <h4>Cập nhật hãng sản phẩm</h4>
                <label>Tên hãng</label>
                <form action="" method="POST">
                    <input type="text" class="form-control" name="hang"
                        value="<?php echo $row_capnhat['brands_name'] ?>"><br>
                    <input type="hidden" class="form-control" name="id_hang"
                        value="<?php echo $row_capnhat['brands_id'] ?>">

                    <input type="submit" name="capnhathang" value="Cập nhật hãng" class="btn btn-default">
                </form>
            </div>
            <?php
			}else{
				?>
            <div class="col-md-4">
                <h4>Thêm hãng sản phẩm</h4>
                <label>Tên hãng</label>
                <form action="" method="POST">
                    <input type="text" class="form-control" name="hang" placeholder="Tên hãng"><br>
                    <input type="submit" name="themhang" value="Thêm hãng" class="btn btn-default">
                </form>
            </div>
            <?php
			} 
			
				?>
            <div class="col-md-8">
                <h4>Liệt kê hãng sản phẩm</h4>
                <?php
				// Lấy danh sách hãng từ bảng tbl_brands
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_brands ORDER BY brands_id DESC"); 
				?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên hãng</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
					$i = 0;
					while($row_brands = mysqli_fetch_array($sql_select)){ 
						$i++;
					?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row_brands['brands_name'] ?></td>
                        <td><a href="?xoa=<?php echo $row_brands['brands_id'] ?>">Xóa</a> || <a
                                href="?quanly=capnhat&id=<?php echo $row_brands['brands_id'] ?>">Cập nhật</a></td>
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