<?php
include('include/slider.php');

$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");

?>
<section>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="left-sidebar">
              <h2>Danh Mục</h2>
                <div class="panel-group category-products" id="accordian">
                  <!--category-productsr-->
                  <?php
                  while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
                  ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>" role="button"  aria-haspopup="true" aria-expanded="false">
                        <?php echo $row_category_danhmuc['category_name'] ?></a></h4>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <!-- <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><a href="#">Điện thoại</a></h4>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><a href="#">Máy giặt</a></h4>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><a href="#">Tủ lạnh</a></h4>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><a href="#">Laptop</a></h4>
                    </div>
                  </div> -->
							
						    </div><!--/category-products-->

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
						
						<div class="row">
								<?php
								$sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC");
								while($row_sanpham = mysqli_fetch_array($sql_product)){ 
									if($row_sanpham['category_id']??$id_category){
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a style="color:black;" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<!-- <span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' ?></span> -->
												<del><?php echo number_format($row_sanpham['sanpham_gia']).'vnđ' ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />			
                          
													<input  type="submit" name="themgiohang" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" />
                          

                          
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								} 
								?>
							</div>
	
	
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
		
	