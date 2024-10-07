<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
	
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];

		$anhmota_1 =  $_FILES['hinhanhmota1']['name'];
		$anhmota_2 =  $_FILES['hinhanhmota2']['name'];
		$anhmota_3 =  $_FILES['hinhanhmota3']['name'];
		$anhmota_4 =  $_FILES['hinhanhmota4']['name'];

		
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

		$hinhanh_mota_1_tmp = $_FILES['hinhanhmota1']['tmp_name'];
		$hinhanh_mota_2_tmp = $_FILES['hinhanhmota2']['tmp_name'];
		$hinhanh_mota_3_tmp = $_FILES['hinhanhmota3']['tmp_name'];
		$hinhanh_mota_4_tmp = $_FILES['hinhanhmota4']['tmp_name'];


		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");

		if ($sql_insert_product) {
			// Lấy ID của sản phẩm vừa thêm vào
			$sanpham_id = mysqli_insert_id($con);
			echo "Sản phẩm đã được thêm thành công với ID: " . $sanpham_id;


		$sql_insert_image_mota_1_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$sanpham_id ','$anhmota_1')");
		$sql_insert_image_mota_2_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$sanpham_id ','$anhmota_2')");
		$sql_insert_image_mota_3_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$sanpham_id ','$anhmota_3')");
		$sql_insert_image_mota_4_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$sanpham_id ','$anhmota_4')");
		
		

		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);

		move_uploaded_file($hinhanh_mota_1_tmp,$path.$anhmota_1);
		move_uploaded_file($hinhanh_mota_2_tmp,$path.$anhmota_2);
		move_uploaded_file($hinhanh_mota_3_tmp,$path.$anhmota_3);
		move_uploaded_file($hinhanh_mota_4_tmp,$path.$anhmota_4);
		} else {
			echo "Có lỗi khi thêm sản phẩm: " . mysqli_error($con);
		}

		
		


	}elseif(isset($_POST['capnhatsanpham'])) {

		// $sanpham_id = $_POST['sanpham_id'];
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];

		$anhmota_1 = "";
		$anhmota_2 = "";
		$anhmota_3 = "";
		$anhmota_4 = "";

		$hinhanh_mota_1_tmp = "";
		$hinhanh_mota_2_tmp = "";
		$hinhanh_mota_3_tmp = "";
		$hinhanh_mota_4_tmp = "";



		if( isset($_FILES['hinhanhmota1']))
		{
			$anhmota_1 =  $_FILES['hinhanhmota1']['name'];
			$hinhanh_mota_1_tmp = $_FILES['hinhanhmota1']['tmp_name'];
		}
		if( isset($_FILES['hinhanhmota2']))
		{
			$anhmota_2 =  $_FILES['hinhanhmota2']['name'];
			$hinhanh_mota_2_tmp = $_FILES['hinhanhmota2']['tmp_name'];

		}
		if(isset($_FILES['hinhanhmota3']))
		{
			$anhmota_3 =  $_FILES['hinhanhmota3']['name'];
			$hinhanh_mota_3_tmp = $_FILES['hinhanhmota3']['tmp_name'];

		}
		if(isset($_FILES['hinhanhmota4']))
		{
			$anhmota_4=  $_FILES['hinhanhmota4']['name'];
			$hinhanh_mota_4_tmp = $_FILES['hinhanhmota4']['tmp_name'];

			
		}
		
		

		

		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

		

		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
			

			$sql_xoa_list_img_mota = mysqli_query($con,"DELETE FROM tbl_sanpham_images WHERE sanpham_id='$id_update'");
			move_uploaded_file($hinhanh_mota_1_tmp,$path.$anhmota_1);
			$sql_insert_image_mota_1_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$id_update ','$anhmota_1')");



		}else if($hinhanh != "" ||$anhmota_1 !="" || $anhmota_2 !="" || $anhmota_3 !="" ||$anhmota_4 !=""){
			
			$sql_xoa_list_img_mota = mysqli_query($con,"DELETE FROM tbl_sanpham_images WHERE sanpham_id='$id_update'");
			
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);

		
			
				move_uploaded_file($hinhanh_mota_1_tmp,$path.$anhmota_1);
			$sql_insert_image_mota_1_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$id_update ','$anhmota_1')");


			
			
				move_uploaded_file($hinhanh_mota_2_tmp,$path.$anhmota_2);
				$sql_insert_image_mota_2_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$id_update ','$anhmota_2')");
	
			
			
				move_uploaded_file($hinhanh_mota_3_tmp,$path.$anhmota_3);
				$sql_insert_image_mota_3_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$id_update ','$anhmota_3')");

			
			
				move_uploaded_file($hinhanh_mota_4_tmp,$path.$anhmota_4);
				$sql_insert_image_mota_4_product = mysqli_query($con,"INSERT INTO tbl_sanpham_images(sanpham_id,image_url) values ('$id_update ','$anhmota_4')");

			

		

			
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
			
			


			
			
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa_list_img_mota = mysqli_query($con,"DELETE FROM tbl_sanpham_images WHERE sanpham_id='$id'");
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");

		
		

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
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['category_id'];


				$sql_get_list_img = mysqli_query($con,"SELECT * FROM tbl_sanpham_images WHERE sanpham_id = $id_capnhat");
						
				// Khởi tạo mảng để lưu trữ hình ảnh
				$images_update = [];
						while ($row_img = mysqli_fetch_array($sql_get_list_img)) {
							$images_update[] = $row_img['image_url']; // Giả sử cột chứa hình ảnh trong tbl_sanpham_images là 'image'
						}

				
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
					<label>Hình ảnh</label>
					<br>
					<img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80">
					<input type="file" class="form-control" name="hinhanh"><br>
					<br>
					

					
					<?php if (!empty($images_update)): ?>
						<?php foreach ($images_update as $index => $image): ?>
							<label>Hình ảnh mô tả <?php echo $index+1; ?></label>
							<br>
							<img src="../uploads/<?php echo $image; ?>" height="100" width="80" style="margin-right: 5px;">
							<input type="file" class="form-control" name="hinhanhmota<?php echo $index; ?>"><br>
							<br>
						<?php endforeach; ?>

					<?php else: ?>
						<?php foreach (range(1, 4) as $index): ?>
						<label>Hình ảnh mô tả <?php echo $index; ?></label>
						<br>
						
						<input type="file" class="form-control" name="hinhanhmota<?php echo $index; ?>"><br>
						<br>
					<?php endforeach; ?>
						

					<?php endif; ?>
						

					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
					<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sanpham_mota'] ?></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['category_id']){
						?>
						<option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Hình ảnh mô tả 1</label>
					<input type="file" class="form-control" name="hinhanhmota1"><br>
					<label>Hình ảnh mô tả 2</label>
					<input type="file" class="form-control" name="hinhanhmota2"><br>
					<label>Hình ảnh mô tả 3</label>
					<input type="file" class="form-control" name="hinhanhmota3"><br>
					<label>Hình ảnh mô tả 4</label>
					<input type="file" class="form-control" name="hinhanhmota4"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
					<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
					<label>Mô tả</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
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
							
						<input type="hidden" name="sanpham_id" value=<?php echo $row_sp['sanpham_id']?>  >
						 </td>

						<td><?php echo $row_sp['sanpham_name'] ?></td>
						<td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
						<td>
							<?php if (!empty($images)): ?>
								<?php foreach ($images as $image): ?>
									<img src="../uploads/<?php echo $image; ?>" height="100" width="80" style="margin-right: 5px;">
								<?php endforeach; ?>
							<?php else: ?>
								<p>Không có hình ảnh</p>
							<?php endif; ?>
						</td>
						
						

						<td><?php echo $row_sp['sanpham_soluong'] ?></td>
						<td><?php echo $row_sp['category_name'] ?></td>
						<td><?php echo number_format($row_sp['sanpham_gia']).' vnđ' ?></td>
						<td><?php echo $row_sp['sanpham_giakhuyenmai'] == null ? "" :$row_sp['sanpham_giakhuyenmai'].' vnđ' ?></td>
						<td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Cập nhật</a></td>
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