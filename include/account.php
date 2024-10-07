<?php

$khachhang_id =  $_SESSION['khachhang_id'];

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
   	$phone = $_POST['phone'];
   	$note = $_POST['note'];
   	// cập nhập bảng tbl_khachhang với các thông tin name, address, phone,note
   	$sql_update = mysqli_query($con, "UPDATE tbl_khachhang SET name ='$name', address = '$address', phone = '$phone', note = '$note' WHERE khachhang_id = '$khachhang_id'");
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
		<form action="#">
			<input type="text" placeholder="Name" value="<?php echo $row_capnhat['name'] ?>" />
			<input type="email" placeholder="Email Address" value="<?php echo $row_capnhat['email'] ?>" />
			<input type="text " placeholder="Address" value="<?php echo $row_capnhat['address'] ?>"/>
			<input type="password" placeholder="Password" value="<?php echo $row_capnhat['password'] ?>"/>
			<input type="text" placeholder="note" value="<?php echo $row_capnhat['note'] ?>"/>
			<span>
				<input type="checkbox" class="checkbox"> 
				Keep me signed in
			</span>
			<button type="submit" class="btn btn-default">Update</button>
		</form>
	</div><!--/ form-->
</div>

