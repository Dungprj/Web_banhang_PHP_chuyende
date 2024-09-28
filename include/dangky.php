<?php
if(isset($_POST['dangky'])){
    $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $note = $_POST['note'];
     $address = $_POST['address'];
     $giaohang = $_POST['giaohang'];
     $sql_check_email = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$email'");
    
     if (mysqli_num_rows($sql_check_email) > 0) {
         echo "Email đã tồn tại. Vui lòng sử dụng email khác.";
     } else {

     $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
     $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
     $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
     if($row_khachhang){
        $_SESSION['dangnhap_home'] = $name;
        $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
        echo '<script>
        alert("Đăng nhập thành công");
        window.location.href = "index.php";
    </script>';

     }
    
    
    } 
}
?>
<html>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
            <div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>XIN MỜI ĐĂNG KÝ!</h2>
						<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
							<input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						
						<div class="right-w3l">
							<button type="submit" class="form-control" name="dangky">Đăng ký</button>
						</div>
                        <div class="sign_in">
                            Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập</a>
                        </div>
						</form>
					</div><!--/sign up form-->
				</div>
            </div>
        </div>
    </section>
</html>
        