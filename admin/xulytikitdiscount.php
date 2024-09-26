<?php
	
    include('C:\xampp\htdocs\bandienmay\bandienmay\include\models\VeGiamGia.php');
   
    
?>
<?php
	if(isset($_POST['themve'])){
		$tenve = $_POST['tenve'] ??null;
		$phanTramCanGiam = (float)$_POST['phantramgiam'];
        $ngaybatdau = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['ngaybatdau']);
        $ngayketthuc = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['ngayketthuc']);
        $soluong = $_POST['soluong'] ?? null; // Lấy giá trị số lượng, nếu không có thì null
        
        if (!$ngaybatdau || !$ngayketthuc) {
            die('Ngày tháng không hợp lệ.');
        }
        if ($ngaybatdau > $ngayketthuc) {
            die('Ngày bắt đầu không thể lớn hơn ngày kết thúc.');
        }
        if ($ngayketthuc < $ngaybatdau ) {
            die('Ngày kết thúc không thể nhỏ hơn ngày bắt đầu.');
        }
        $giamgia = new Giamgia(
            $phanTramCanGiam,
            $ngaybatdau->format('Y-m-d H:i:s'),
            $ngayketthuc->format('Y-m-d H:i:s'),
            $soluong
        );
    

        $tiketdiscount = new Tiketdiscount($tenve , $giamgia);

        // Thực hiện thêm vé vào cơ sở dữ liệu
        $tiketdiscount->add();
		
		
	}elseif(isset($_POST['capnhatve'])) {
		$id_update = $_POST['id_update'];
		$name = $_POST['name']??null;
        $phanTramCanGiam = (float)$_POST['phantramgiam'];
		$ngayBatDau = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['ngayBatDau']);
		$ngayKetThuc = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['ngayKetThuc']);
		$soLuong = $_POST['soLuong'] ?? null; 
        $ngayBatDaufomated =  $ngayBatDau->format('Y-m-d H:i:s');
        $ngayketthucfomated =  $ngayKetThuc->format('Y-m-d H:i:s');

        $update = Tiketdiscount::update($id_update, $name,$phanTramCanGiam, $ngayBatDaufomated,$ngayketthucfomated,$soLuong);	
		
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
        $delete = Tiketdiscount::delete($id);

		
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
<?php include "dashboard.php";?>
	<br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_tiketdiscount WHERE id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên vé</label>
					<input type="text" class="form-control" name="name" value="<?php echo $row_capnhat['name'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['id'] ?>">
					<label>Phần trăm giảm</label>
					<input type="text" class="form-control" name="phantramgiam" value="<?php echo $row_capnhat['phanTramGiam'] ?>"><br>
					<label>Ngày bắt đầu</label>
					<input  type="datetime-local" class="form-control" name="ngayBatDau" value="<?php echo $row_capnhat['ngayBatDau'] ?>"><br>
					<label>Ngày kết thúc</label>
					<input  type="datetime-local" class="form-control" name="ngayKetThuc" value="<?php echo $row_capnhat['ngayKetThuc'] ?>"><br>
					<label>Số lượng vé</label>
					<input type="text" class="form-control" name="soLuong" value="<?php echo $row_capnhat['soLuong'] ?>"><br>
					<input type="submit" name="capnhatve" value="Cập nhật vé" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm vé</h4>
				
				<form action="" method="POST" >
					<label>Tên vé</label>
					<input type="text" class="form-control" name="tenve" placeholder="Tên sản phẩm"><br>
					<label>Phần trăm giảm</label>
					<input type="text" class="form-control" name="phantramgiam" placeholder="Phần trăm giảm"><br>
					<label>Ngày bắt đầu</label>
					<input type="datetime-local" class="form-control" name="ngaybatdau" placeholder="Ngày bắt đầu"><br>
					<label>Ngày kết thúc</label>
					<input type="datetime-local" class="form-control" name="ngayketthuc" placeholder="Ngày kết thúc"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
					?>
					<br>
					<input type="submit" name="themve" value="Thêm vé" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê vé giám giá</h4>
				<?php
				$sql_select_ve = mysqli_query($con,"SELECT * FROM tbl_tiketdiscount"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên vé</th>
						<th>Phần trăm giảm</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Số lượng vé</th>
						
					</tr>
					<?php
					$i = 0;
					while($row_ve = mysqli_fetch_array($sql_select_ve)){ 
						$i++;
                         // Chuyển đổi ngày giờ từ cơ sở dữ liệu (giả sử định dạng là 'Y-m-d H:i:s')
                        $ngayBatDau = DateTime::createFromFormat('Y-m-d H:i:s', $row_ve['ngayBatDau']);
                        $ngayKetThuc = DateTime::createFromFormat('Y-m-d H:i:s', $row_ve['ngayKetThuc']);

                        // Định dạng ngày giờ theo 'd/m/Y'
                        $ngayBatDauFormatted = $ngayBatDau ? $ngayBatDau->format('d/m/Y') : 'N/A';
                        $ngayKetThucFormatted = $ngayKetThuc ? $ngayKetThuc->format('d/m/Y') : 'N/A';
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_ve['name'] ?></td>
						<td><?php echo $row_ve['phanTramGiam'] ?></td>
						<td><?php echo $ngayBatDauFormatted ?></td>
						<td><?php echo $ngayKetThucFormatted ?></td>
						<td><?php echo $row_ve['soLuong'] ?></td>
						<td><a href="?xoa=<?php echo $row_ve['id'] ?>">Xóa</a> || <a href="xulytikitdiscount.php?quanly=capnhat&capnhat_id=<?php echo $row_ve['id'] ?>">Cập nhật</a></td>
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