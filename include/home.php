<?php
include('include/slider.php');

// Lấy giá trị category_id từ URL nếu có
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
} else {
    $category_id = '';
}

// Lấy giá trị hang_id từ URL nếu có
if (isset($_GET['hang_id'])) {
    $hang_id = $_GET['hang_id'];
} else {
    $hang_id = '';
}

// Query sản phẩm theo category_id và hang_id
if ($category_id != '' && $hang_id != '') {
    // Nếu cả category_id và hang_id đều tồn tại
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE category_id = '$category_id' AND hang_id = '$hang_id' ORDER BY sanpham_id DESC");
} elseif ($category_id != '') {
    // Nếu chỉ có category_id
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE category_id = '$category_id' ORDER BY sanpham_id DESC");
} elseif ($hang_id != '') {
    // Nếu chỉ có hang_id
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE hang_id = '$hang_id' ORDER BY sanpham_id DESC");
} else {
    // Nếu không có category_id hoặc hang_id, lấy tất cả sản phẩm
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ");
}

?>

<section>
    <div class="container">
        <div class="row">
            <!-- Danh mục sản phẩm và hãng -->
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?category_id=5">Tivi</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?category_id=4">Điện thoại</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?category_id=3">Máy giặt</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?category_id=2">Tủ lạnh</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?category_id=1">Laptop</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="left-sidebar">
                    <h2>Hãng</h2>
                    <div class="panel-group category-products" hang_id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=1">Samsung</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=2">Xiaomi</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=3">Apple</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=4">Nexus</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=5">Motorala</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=6">Micromax</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=7">Lenovo</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=8">Oppo</a>
                                </h4>
                            </div>
                        </div>
                                                
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=9">Sony</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=10">LG</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=11">One Plus</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?hang_id=12">Asus</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                                  <!--/brands_products-->
  

                </div>
            </div>

            <!-- Hiển thị sản phẩm -->
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>
                    <div class="row">
                        <?php
                        // Hiển thị các sản phẩm từ kết quả truy vấn
                        while ($row_sanpham = mysqli_fetch_array($sql_product)) {
                        ?>
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        <img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt="">
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a style="color:black;" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
                                                <?php echo $row_sanpham['sanpham_name'] ?>
                                            </a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            <!-- <span class="item_price">
                                            <?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' ?></span> -->
                                            <del><?php echo number_format($row_sanpham['sanpham_gia']) . 'vnđ' ?></del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="?quanly=giohang" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
                                                    <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
                                                    <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
                                                    <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
                                                    <input type="hidden" name="soluong" value="1" />
                                                    <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Phân trang -->
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div>
            </div>
 
    </div>
</section>
