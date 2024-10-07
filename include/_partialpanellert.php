<?php


$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");

?>

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

						    </div><!--/category-products-->

              <div class="brands_products">
                <!--brands_products-->
                <h2>Hãng</h2>
                <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                <ul class="nav nav-pills nav-stacked">
                                <?php 

            // Lấy danh sách các hãng sản phẩm từ cột 'sanpham_chitiet'
            $sql_brands = "SELECT DISTINCT sanpham_chitiet FROM tbl_sanpham";
            $query_brands = mysqli_query($con, $sql_brands);

            if (mysqli_num_rows($query_brands) === 0): ?>
                                <li>Không có hãng nào.</li>
                                <?php else: 
                while ($row_brands = mysqli_fetch_assoc($query_brands)): ?>
                                <li>
                                    <a href="?quanly=hang&sanpham_chitiet=<?php echo urlencode($row_brands['sanpham_chitiet']); ?>"
                                        class="brand-link">
                                        <span class="pull-right"></span>
                                        <?php echo htmlspecialchars($row_brands['sanpham_chitiet']); ?>
                                    </a>
                                </li>
                                <?php endwhile; 
            endif; ?>
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