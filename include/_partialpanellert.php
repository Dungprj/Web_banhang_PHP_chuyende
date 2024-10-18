<?php


$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");



$sql_price_range = mysqli_query($con, "SELECT MIN(sanpham_giakhuyenmai) AS minPrice, MAX(sanpham_giakhuyenmai) AS maxPrice  FROM tbl_sanpham");
$row_price_range = mysqli_fetch_assoc($sql_price_range);
$minPrice = $row_price_range['minPrice'];
$maxPrice = $row_price_range['maxPrice'];

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
            $sql_brands = "SELECT * FROM tbl_brands ORDER BY brands_id DESC";
            $query_brands = mysqli_query($con, $sql_brands);

            if (mysqli_num_rows($query_brands) === 0): ?>
                                <li>Không có hãng nào.</li>
                                <?php else: 
                while ($row_brands = mysqli_fetch_assoc($query_brands)): ?>
                                <li>
                                <a href="?quanly=hang&id=<?php echo $row_brands['brands_id'] ?>">
                                <?php echo $row_brands['brands_name'] ?></a>
                                </li>
                                <?php endwhile; 
            endif; ?>
                    </ul>
                </div>
              </div>
              <!--/brands_products-->
              <div class="price-range">
              <h2>Khoảng giá</h2>
              <div class="well text-center">
                  <input
                      style="margin-bottom:2%;"
                      type="text"
                      class="span2 loctheogia"
                      value=""
                      data-slider-min="<?php echo 0; ?>"
                      data-slider-max="<?php echo $maxPrice +  5000000; ?>"
                      data-slider-step="100000"
                      data-slider-value="[<?php echo $minPrice ; ?>, <?php echo $maxPrice; ?>]"
                      id="sl2"
                  /><br />
                  <b class="pull-left" style="position: absolute;left: -1%;"><?php echo number_format($minPrice); ?> VND</b>
                  <b class="pull-right" style="position: absolute;right: 5%;"><?php echo number_format($maxPrice); ?> VND</b>
              </div>
              <button type="submit" style="float: right;margin-bottom: 5%;" class="btn btn-danger loctheogia">Lọc</button>
          </div>


              
              <!--/price-range-->

            </div>
          </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


$(document).ready(function() {
  // Sự kiện khi nút "Lọc" được nhấn
  $(".loctheogia").click(function() {
    // Lấy giá trị từ slider
    var sliderValue = $("#sl2").val();
    
    // Tách thành khoảng giá
    var minPrice_slider = sliderValue.split(',')[0] == "" ? <?php echo $minPrice?> :sliderValue.split(',')[0];// Giá trị nhỏ nhất
    var maxPrice_slider = sliderValue.split(',')[1] == undefined ? <?php echo $maxPrice?> :sliderValue.split(',')[1]; // Giá trị lớn nhất

    
    
    // Tạo URL mới với khoảng giá
    var newUrl = window.location.origin + window.location.pathname +"?quanly=locgia" +'&minPrice=' + minPrice_slider + '&maxPrice=' + maxPrice_slider;
    
    // Điều hướng tới URL mới
     window.location.href = newUrl;
  });
});

</script>