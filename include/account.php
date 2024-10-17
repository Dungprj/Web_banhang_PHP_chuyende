<?php

$khachhang_id =  $_SESSION['khachhang_id'];
// Khởi tạo biến $sql_update
$sql_update = false;


// kiểm tra xem 'khachhang_id' có tồn tại trong session
// if(isset($_SESSION['khachhang_id']))
// {
	// $khachhang_id = $_SESSION['khachhang_id']; //gán giá trị(nếu có tồn tại)
// }

// if(!isset($_SESSION['khachhang_id']))
// {
	// echo "<script>alert('chưa đăng nhập !')</script>";// đưa ra cảnh báo : chưa đăng nhập
	// die(); //dừng thực thi}
// Kiểm tra xem có dữ liệu nào được gửi đến server thông qua phương thức POST với tên là 'capnhatthongtin' hay không
// tạo hàm cập nhật thông tin
 if(isset($_POST['capnhatthongtin'])){
	// lấy dữ liệu từ form
	$name= $_POST['name']; // dữ liệu của nhập trên màn hình gán cho biến $name
   	$address = $_POST['address'];
	$phone= $_POST['phone'];
   	$password = $_POST['password'];
   	$note = $_POST['note'];

	
   	// cập nhập bảng tbl_khachhang với các thông tin name, address, phone,note
   	$sql_update = mysqli_query($con, "UPDATE tbl_khachhang SET name ='$name', address = '$address', password = '$password',phone = '$phone', note = '$note' WHERE khachhang_id = '$khachhang_id'");


	if ($sql_update) {
        // Nếu cập nhật thành công, cập nhật lại session với tên mới
        $_SESSION['dangnhap_home'] = $name;

        echo "<script>alert('Cập nhật thông tin thành công!');</script>";
        echo "<script>window.location.href='index.php?quanly=taikhoan';</script>";
		exit;
     } else {
        echo "<script>alert('Cập nhật thất bại: " . mysqli_error($con) . "');</script>";
		exit;
    } 
}
?>




	<?php
			// lấy thông tin hiện tại của khách hàng đang đăng nhập từ bảng tbl_khachhang
			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id = '$khachhang_id'");
			$row_capnhat = mysqli_fetch_array($sql_select_khachhang);// lưu kết quả đã cập nhập
			?>
<div class="col-sm-9 col-sm-offset-1" id="form">
	<div class="login-form"><!-- form-->
		<h2>thông tin tài khoản</h2>
		<form action="" method="post">
			<input type="text" placeholder="Name" name="name" value="<?php echo $row_capnhat['name'] ?>" />
			<input type="text" placeholder="phone" name="phone" value="<?php echo $row_capnhat['phone'] ?>" />
			<input type="email" placeholder="Email Address" name="Email Address" value="<?php echo $row_capnhat['email'] ?>" />
			<input type="text " placeholder="Address" name="address" value="<?php echo $row_capnhat['address'] ?>"/>
			<input type="password" placeholder="Password" name="password" value="<?php echo $row_capnhat['password'] ?>"/>
			<input type="text" placeholder="note" name="note" value="<?php echo $row_capnhat['note'] ?>"/>
			<span>
				<input type="checkbox" class="checkbox"> 
				Keep me signed in
			</span>
			<button type="submit" name="capnhatthongtin" class="btn btn-default" value="Update">Update</button>
		</form>
	</div><!--/ form-->
</div>

