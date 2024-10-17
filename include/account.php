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
	$email=$_POST['email'];
   	$phone = $_POST['phone'];
   	$note = $_POST['note'];
   	// cập nhập bảng tbl_khachhang với các thông tin name, address, phone,note
   	$sql_update = mysqli_query($con, "UPDATE tbl_khachhang SET name ='$name', address = '$address',email='$email', phone = '$phone', note = '$note' WHERE khachhang_id = '$khachhang_id'");
	   if ($sql_update) {
        // Nếu cập nhật thành công, cập nhật lại giá trị của session
        $_SESSION['dangnhap_home'] = $name;

        // Chuyển hướng người dùng đến trang hiện tại để tránh form bị gửi lại khi tải trang
		echo "<script>window.location.href='" . $_SERVER['REQUEST_URI'] . "';</script>";
        exit();
	   }
}
?>




	<?php
			// lấy thông tin hiện tại của khách hàng đang đăng nhập từ bảng tbl_khachhang
			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id = '$khachhang_id'");
			$row_capnhat = mysqli_fetch_array($sql_select_khachhang);// lưu kết quả đã cập nhập
			?>
<style>
	
</style>
<div class="col-sm-9 col-sm-offset-1" id="form">
	<div class="login-form"><!-- form-->
		<h2 style="font-weight:bold">Thông tin tài khoản</h2>
		<form action="" method="POST">
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input type="text" name="name" placeholder="Name" value="<?php echo $row_capnhat['name'] ?>" />
						</div>	
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" name="email" placeholder="Email Address" value="<?php echo $row_capnhat['email'] ?>" />
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại</label>
							<input type="text" name="phone" placeholder="phone" value="<?php echo $row_capnhat['phone'] ?>" />
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ</label>
                            <input type="text " name="address" placeholder="Address" value="<?php echo $row_capnhat['address'] ?>"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" placeholder="Password" value="<?php echo $row_capnhat['password'] ?>"/>
						
                        </div>
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
                            <input type="text" name="note" placeholder="note" value="<?php echo $row_capnhat['note'] ?>"/>
						</div>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="capnhatthongtin" class="btn btn-default">Update</button>
						</form>
	</div><!--/ form-->
</div>

