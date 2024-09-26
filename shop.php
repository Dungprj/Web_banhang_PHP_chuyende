<?php
session_start();
include_once('db/connect.php');
?>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = '';
}
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header">
      <!--header-->
      <div class="header_top">
        <!--header_top-->
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="contactinfo">
                <ul class="nav nav-pills">
                  <li>
                    <a href="#"><i class="fa fa-phone"></i> +84 123456789</a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-envelope"></i> nhom8@gmail.com</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="social-icons pull-right">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/header_top-->

      <div class="header-middle">
        <!--header-middle-->
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="logo pull-left">
                <a href="index.php"
                  ><img src="images/home/logo.png" alt=""
                /></a>
              </div>
              <div class="btn-group pull-right">
                <div class="btn-group">
                  <button
                    type="button"
                    class="btn btn-default dropdown-toggle usa"
                    data-toggle="dropdown"
                  >
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
                  <li>
                    <a href="#"><i class="fa fa-user"></i> Tài Khoản</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i> Yêu thích</a>
                  </li>
                  <li>
                    <a href="checkout.php"
                      ><i class="fa fa-crosshairs"></i> Checkout</a
                    >
                  </li>
                  <li>
                    <a href="cart.php"
                      ><i class="fa fa-shopping-cart"></i> Giỏ hàng</a
                    >
                  </li>
                  <li>
                    <a href="login.php"
                      ><i class="fa fa-lock"></i> Đăng nhập</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/header-middle-->

      <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
          <div class="row">
            <div class="col-sm-9">
              <div class="navbar-header">
                <button
                  type="button"
                  class="navbar-toggle"
                  data-toggle="collapse"
                  data-target=".navbar-collapse"
                >
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="mainmenu pull-left">
                <ul class="nav navbar-nav collapse navbar-collapse">
                  <li><a href="index.php" class="active">Trang chủ</a></li>
                  <li class="dropdown">
                    <a href="#"
                      >Shop<i class="fa fa-angle-down"></i
                    ></a>
                    <ul role="menu" class="sub-menu">
                      <li><a href="shop.php">Danh mục sản phẩm</a></li>
                      <li><a href="product-details.php">Chi tiết sản phẩm</a></li>
                      <li><a href="checkout.php">Checkout</a></li>
                      <li><a href="cart.php">Giỏ hàng</a></li>
                      <li><a href="login.php">Đăng nhập</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#">Bài viết<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                      <li><a href="blog.php">Kiến thức Tivi</a></li>
                      <li><a href="blog-single.php">Kiến thức Laptop</a></li>
                      <li><a href="blog-single.php">Kiến thức Máy giặt</a></li>
                      <li><a href="blog-single.php">Kiến thức Tủ lạnh</a></li>
                    </ul>
                  </li>
                  <!-- <li><a href="404.php">404</a></li> -->
                  <li><a href="contact-us.php">Liên hệ</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="search_box pull-right">
                <input type="text" placeholder="Tìm kiếm" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/header-bottom-->
    </header>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/bts-1200x375.jpg" alt="" />
		</div>
	</section>
	
	<section>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="left-sidebar">
              <h2>Danh mục sản phẩm</h2>
              <div class="panel-group category-products" id="accordian">
                <!--category-productsr-->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        data-parent="#accordian"
                        href="#tivi"
                      >
                        <span class="badge pull-right"
                          ><i class="fa fa-plus"></i
                        ></span>
                        Tivi
                      </a>
                    </h4>
                  </div>
                  <div id="tivi" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <li><a href="">Sony</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">LG</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        data-parent="#accordian"
                        href="#dienthoai"
                      >
                        <span class="badge pull-right"
                          ><i class="fa fa-plus"></i
                        ></span>
                        Điện thoại
                      </a>
                    </h4>
                  </div>
                  <div id="dienthoai" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <li><a href="">Iphone (Apple)</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Xiaomi</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        data-parent="#accordian"
                        href="#maygiat"
                      >
                        <span class="badge pull-right"
                          ><i class="fa fa-plus"></i
                        ></span>
                        Máy giặt
                      </a>
                    </h4>
                  </div>
                  <div id="maygiat" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <li><a href="">Toshiba</a></li>
                        <li><a href="">Aqua</a></li>
                        <li><a href="">Panasonic</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        data-parent="#accordian"
                        href="#tulanh"
                      >
                        <span class="badge pull-right"
                          ><i class="fa fa-plus"></i
                        ></span>
                        tủ lạnh
                      </a>
                    </h4>
                  </div>
                  <div id="tulanh" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <li><a href="">Toshiba</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Panasonic</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        data-parent="#accordian"
                        href="#laptop"
                      >
                        <span class="badge pull-right"
                          ><i class="fa fa-plus"></i
                        ></span>
                        Laptop
                      </a>
                    </h4>
                  </div>
                  <div id="laptop" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        <li><a href="">Apple</a></li>
                        <li><a href="">Lenovo</a></li>
                        <li><a href="">Dell</a></li>
                        <li><a href="">Asus</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--/category-products-->

              <div class="brands_products">
                <!--brands_products-->
                <h2>Hãng</h2>
                <div class="brands-name">
                  <ul class="nav nav-pills nav-stacked">
                    <li>
                      <a href="#"> <span class="pull-right"></span>Samsung</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Xiaomi</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Apple</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Nexus</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Motorala</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Micromax</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Lenovo</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Oppo</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Sony</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>LG</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>One Plus</a>
                    </li>
                    <li>
                      <a href="#"> <span class="pull-right"></span>Asus</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!--/brands_products-->
              <div class="price-range">
                <!--price-range-->
                <h2>Khoảng giá</h2>
                <div class="well text-center">
                  <input
                    type="text"
                    class="span2"
                    value=""
                    data-slider-min="0"
                    data-slider-max="600"
                    data-slider-step="5"
                    data-slider-value="[250,450]"
                    id="sl2"
                  /><br />
                  <b class="pull-left">0 VND</b>
                  <b class="pull-right">60.000.000 VND</b>
                </div>
              </div>
              <!--/price-range-->

            </div>
          </div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>
						
						<?php
						while ($row = mysqli_fetch_assoc($sql_list)) {
						?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/shop/<?php echo $row['sanpham_image'] ?>" alt="" />
											<h2><?php echo number_format($row['sanpham_giakhuyenmai']) . 'đ'; ?></h2>
											<p><?php echo $row['sanpham_name']; ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo number_format($row['sanpham_giakhuyenmai']) . 'đ'; ?></h2>
												<p><?php echo $row['sanpham_name']; ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
											</div>
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
						<?php
						}
						?>
	
	
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ với chúng tôi</a></li>
								<li><a href="#">Câu hỏi thường gặp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin cửa hàng</a></li>
								<li><a href="#">Vị trí</a></li>
								<li><a href="#">Chương trình liên kết</a></li>
								<li><a href="#">Bản quyền</a></li>
							</ul>
					</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>