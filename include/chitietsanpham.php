<?php
include("db/connect.php");

$product_id = isset($_GET['sanpham_id']) ? intval($_GET['sanpham_id']) : 0;

// Lấy thông tin sản phẩm
$query_productid = "SELECT * FROM tbl_sanpham WHERE sanpham_id = $product_id";
$result_productid = $con->query($query_productid);
$product = $result_productid->fetch_assoc();
if (!$product) {
    die("Không tìm thấy sản phẩm");
}

// Lấy ảnh phụ
$query_images = "SELECT image_url FROM tbl_sanpham_images WHERE sanpham_id = $product_id";
$result_images = $con->query($query_images);
$product_images = [];
while ($row = $result_images->fetch_assoc()) {
    $product_images[] = $row['image_url'];
}

// Thông tin giới thiệu sản phẩm
$query_info = "SELECT * FROM tbl_sanpham_gioithieu WHERE sanpham_id = $product_id";
$result_info = $con->query($query_info);
$introduction = [];
while ($row = $result_info->fetch_assoc()) { 
    $introduction[] = $row;
}  

// Chi tiết cấu hình
$query_config = "SELECT * FROM tbl_sanpham_chitietcauhinh WHERE sanpham_id = $product_id";
$result_config = $con->query($query_config);
$product_config = [];
while ($row = $result_config->fetch_assoc()) {
    $product_config[] = $row;
}

// Bảo hành
$query_warranty = "SELECT * FROM tbl_sanpham_thongtinkhac WHERE sanpham_id = $product_id";
$result_warranty = $con->query($query_warranty);
$product_warranty = [];
while ($row = $result_warranty->fetch_assoc()) {
    $product_warranty[] = $row;
}

?>


<div class="col-sm-9 padding-right">
    <div class="product-details">
        <div class="row">
            <div class="col-sm-5 d-flex">
                <!-- Ảnh nhỏ bên trái -->
                <div class="thumbnail-container">
                    <!-- Hiển thị các ảnh phụ -->
                    <?php
        $first_image = ''; // Biến lưu ảnh đầu tiên
        foreach ($product_images as $index => $image_url): 
            if ($index === 0) {
                // Lưu ảnh đầu tiên vào biến để hiển thị ở ảnh chính
                $first_image = $image_url;
            }
        ?>
                    <a href="javascript:void(0);" onclick="changeImage('uploads/<?php echo $image_url ?>')">
                        <img src="./uploads/<?php echo htmlspecialchars($image_url); ?>" alt="Thumbnail"
                            class="img-thumbnail" />
                    </a>
                    <?php endforeach; ?>
                </div>

                <!-- Ảnh chính bên phải với hiệu ứng zoom -->
                <div class="view-product">
                    <div class="zoom-container">
                        <!-- Đặt ảnh đầu tiên của danh sách ảnh phụ làm ảnh chính -->
                        <img id="main-image" src="./uploads/<?php echo htmlspecialchars($first_image); ?>"
                            alt="<?php echo $product['sanpham_name']; ?>" class="img-fluid main-image" />
                        <div class="zoom-effect"></div>
                    </div>
                </div>
            </div>


            <div class="col-sm-7">
                <div class="product-information">
                    <h2><?php echo htmlspecialchars($product['sanpham_name']); ?></h2>
                    <form action="index.php?quanly=giohang" method="post">

                        <span>
                            <span><?php echo number_format($product['sanpham_gia']); ?><sup>đ</sup></span>
                            <label>Số lượng:</label>
                            <div class="quantity-controls">
                                <button type="button" class="quantity-btn" id="decrease-btn"
                                    onclick="decreaseQuantity()">-</button>
                                <input type="number" id="quantity-input" name="soluong" value="1" min="1" />
                                <button type="button" class="quantity-btn" id="increase-btn"
                                    onclick="increaseQuantity()">+</button>
                            </div>
                            <input type="hidden" name="sanpham_id"
                                value="<?php echo intval($product['sanpham_id']); ?>">
                            <input type="hidden" name="tensanpham"
                                value="<?php echo htmlspecialchars($product['sanpham_name']); ?>">
                            <input type="hidden" name="giasanpham"
                                value="<?php echo intval($product['sanpham_gia']); ?>">
                            <input type="hidden" name="hinhanh" value="<?php echo htmlspecialchars($first_image); ?>">

                            <button type="submit" name="themgiohang" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                            </button>

                        </span>
                    </form>
                    <a href="index.php" class="btn btn-default cart">
                        Tiếp tục mua hàng
                    </a>
                </div>
                <!--/product-information-->
            </div>
        </div>

        <!-- Phần chi tiết của sản phẩm với các tab -->
        <div class="category-tab shop-details-tab">
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#details" data-toggle="tab">Giới thiệu sản phẩm</a>
                    </li>
                    <li>
                        <a href="#companyprofile" data-toggle="tab">Chi tiết cấu hình</a>
                    </li>
                    <li>
                        <a href="#tag" data-toggle="tab">Chế độ bảo hành</a>
                    </li>

                </ul>
            </div>
            <div class="tab-content">
                <!-- Tab Giới thiệu sản phẩm -->
                <div class="tab-pane fade active in" id="details">
                    <div class="col-sm-12">
                        <h3>Giới thiệu sản phẩm</h3>


                        <?php foreach ($introduction as $intro): ?>
                        <div class="introduction-item">
                            <p><?php echo nl2br(htmlspecialchars($intro['gioithieu_noidung'])); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Tab Chi tiết cấu hình -->
                <div class="tab-pane fade" id="companyprofile">
                    <div class="col-sm-12">
                        <h3>Chi tiết cấu hình</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Thông số</th>
                                    <th>Chi tiết</th>
                                </tr>
                                <?php foreach ($product_config as $config): ?>
                                <tr>
                                    <td><?php echo $config['cauhinh_tieude'] ?></td>
                                    <td><?php echo nl2br($config['cauhinh_noidung']); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab Bảo hành -->
                <div class="tab-pane fade" id="tag">
                    <div class="col-sm-12">
                        <h3>Chế độ bảo hành</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Bảo hành</th>
                                    <th>Nội dung</th>
                                </tr>
                                <?php foreach ($product_warranty as $info): ?>
                                <tr>
                                    <td><?php echo $info['bao_hanh']?></td>
                                    <td><?php echo nl2br($info['thong_tin_khac']); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--/product-details-->
</div>

<?php 
$sanpham_mota = $con->real_escape_string($product['sanpham_mota']);
$query = "SELECT * FROM tbl_sanpham WHERE sanpham_mota = '$sanpham_mota' AND sanpham_id != '$product_id' LIMIT 4";
$result = $con->query($query);
$result_products = $result;
?>

<div class="related-products">

    <?php
  
   $title = "Sản phẩm liên quan";
   include "danhsachsanpham.php";
   ?>
</div>

<script src="js/product.js"></script>