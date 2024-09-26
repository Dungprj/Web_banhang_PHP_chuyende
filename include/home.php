<?php
include('include/slider.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = '';
}
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");
?>
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
		
	