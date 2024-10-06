<?php 
		$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	?>
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Danh mục sản phẩm</a></li>
										<li><a href="product-details.html">Chi tiết sản phẩm</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Giỏ hàng</a></li> 
										<li><a href="login.html">Đăng nhập</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown">
                                    <a href="#">Tin tức <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                        // Lấy danh sách danh mục tin tức từ cơ sở dữ liệu
                                        $sql_danhmuctin = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");

                                        // Lặp qua kết quả và hiển thị các danh mục
                                        while ($danhmuc = mysqli_fetch_array($sql_danhmuctin)) {
                                        ?>
                                           <li>
                                               <a class="dropdown-item" href="?quanly=tintuc&id_tin=<?= $danhmuc['danhmuctin_id'] ?>">
                                                   <?= $danhmuc['tendanhmuc'] ?>
                                               </a>
                                           </li>
                                       <?php } ?>
                                   </ul>
                              </li>


								<!-- <li><a href="404.html">404</a></li> -->
								<li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Tìm kiếm"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->