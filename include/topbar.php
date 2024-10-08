<?php
if(isset($_POST["logout"]))
{
	
    session_destroy();
    header("Location:index.php");
    
    
    }

?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 123456789</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> nhom8@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Tiếng Việt
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">English</a></li>
									<!-- <li><a href="#">UK</a></li> -->
								</ul>
							</div>
							
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
								if(isset($_SESSION['dangnhap_home'])){
									?>
								<li><a href="index.php?quanly=taikhoan"><i class="fa fa-user"></i> <?php echo $_SESSION['dangnhap_home'] ?></a></li>
								<?php
								}
								?>
								
								
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="index.php?quanly=giohang"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php if(!isset($_SESSION['dangnhap_home'])){
									?>
									<li><a href="index.php?quanly=dangnhap"><i class="fa fa-lock"></i> Đăng nhập</a></li>
									<li><a href="index.php?quanly=dangky"><i class="fa fa-lock"></i> Đăng ký</a></li>
									<?php
								}
								?>
								<?php
								if(isset($_SESSION['dangnhap_home'])): ?>
								
									<li>
									<a href="">
                    				<form method="post" style="display:inline;">
                        			<button type="submit" name="logout">Đăng xuất</button>
                    				</form>
									</a>
                					</li>
								<?php endif; ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->