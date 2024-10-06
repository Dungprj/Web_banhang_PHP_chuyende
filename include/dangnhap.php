<?php

	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap_home'])) {
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Làm ơn không để trống")</script>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
				
				echo '<script>
        alert("Đăng nhập thành công");
        window.location.href = "index.php";
    </script>';
			}else{
				echo '<script>alert("Tài khoản mật khẩu sai")</script>';
			}
		}
	}
?> 
<html>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>XIN MỜI ĐĂNG NHẬP!</h2>
						<form action="" method="post">
							<div class="form-group">
								<label class="col-form-label">Email</label>
								<input type="text" class="form-control" placeholder=" " name="email_login" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label">Mật khẩu</label>
								<input type="password" class="form-control" placeholder=" " name="password_login" required="">
							</div>
							<div class="right-w3l">
								<button type="submit" class="form-control" name="dangnhap_home">Đăng nhập</button>
							</div>
							<div class="sign_in">
                            Bạn chưa có tài khoản? <a href="index.php?quanly=dangky">Đăng ký</a>
                        	</div>
						</form>
					</div><!--/login form-->
				</div>
			
				
			</div>
		</div>
	</section><!--/form-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>