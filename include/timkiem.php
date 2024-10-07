<?php



$tukhoa = ''; 
if (isset($_POST['tukhoa'])) {
    // Lấy từ khóa tìm kiếm
    $tukhoa = mysqli_real_escape_string($con, $_POST['tukhoa']);
    
    // Truy vấn SQL tìm kiếm sản phẩm theo tên
    $sql_search = "SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%" . $tukhoa . "%'";
    $result_products = mysqli_query($con, $sql_search);
    
    
    if (!$result_products || mysqli_num_rows($result_products) == 0) {
        $no_results = true;
    }
}

// Kiểm tra phân trang
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$products_per_page = 6; 
$total_products = mysqli_num_rows($result_products); 
$total_pages = ceil($total_products / $products_per_page);


$start_from = ($current_page - 1) * $products_per_page;
$sql_search .= " LIMIT $start_from, $products_per_page";
$result_products = mysqli_query($con, $sql_search);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <?php
    // Lấy danh sách các phân loại sản phẩm từ cột 'sanpham_mota'
    $sql_danhmuc = "SELECT DISTINCT sanpham_mota FROM tbl_sanpham";
    $query_danhmuc = mysqli_query($con, $sql_danhmuc);

    if (mysqli_num_rows($query_danhmuc) > 0):
        while ($row_danhmuc = mysqli_fetch_assoc($query_danhmuc)):
    ?>
                        <li>
                            <a href="danhmucsanpham.php?sanpham_mota=<?php echo urlencode($row_danhmuc['sanpham_mota']); ?>"
                                class="category-link">
                                <?php echo htmlspecialchars($row_danhmuc['sanpham_mota']); ?>
                            </a>
                        </li>
                        <?php
        endwhile;
    else:
    ?>
                        <li>Không có danh mục nào.</li>
                        <?php endif; ?>
                    </ul>




                    <h2>Hãng sản phẩm</h2>
                    <div class="brands_products">
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php 
           

            // Lấy danh sách các hãng sản phẩm từ cột 'sanpham_chitiet'
            $sql_brands = "SELECT DISTINCT sanpham_chitiet FROM tbl_sanpham";
            $query_brands = mysqli_query($con, $sql_brands);

            // Kiểm tra nếu có hãng
            if (mysqli_num_rows($query_brands) === 0): ?>
                                <li>Không có hãng nào.</li>
                                <?php else: 
                while ($row_brands = mysqli_fetch_assoc($query_brands)): ?>
                                <li>
                                    <a href="hangsanpham.php?sanpham_chitiet=<?php echo urlencode($row_brands['sanpham_chitiet']); ?>"
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

                </div>
            </div>

            <div class="col-sm-9">
                <h2>Sản phẩm tìm kiếm</h2>
                <div class="row text-center">
                    <?php if (isset($no_results) && $no_results): ?>
                    <p>Không tìm thấy sản phẩm nào với từ khóa "<?php echo htmlspecialchars($tukhoa); ?>"</p>
                    <?php else: ?>
                    <!-- Hiển thị các sản phẩm tìm thấy -->
                    <?php while ($product = $result_products->fetch_assoc()): ?>
                    <div class="col-sm-4">
                        <div class="product-card" onclick="changeProduct(<?php echo $product['sanpham_id']; ?>)">
                            <div class="productinfo">
                                <img src="images/<?php echo $product['sanpham_image']; ?>"
                                    alt="<?php echo htmlspecialchars($product['sanpham_name']); ?>" />
                                <h2><?php echo number_format($product['sanpham_gia'], 0, ',', '.'); ?> VNĐ</h2>
                                <p><?php echo htmlspecialchars($product['sanpham_name']); ?></p>
                                <a href="add_to_cart.php?sanpham_id=<?php echo $product['sanpham_id']; ?>"
                                    class="btn btn-default add-to-cart" onclick="event.stopPropagation();">
                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                </a>
                            </div>
                            <button class="btn btn-primary"
                                onclick="event.stopPropagation(); changeProduct(<?php echo $product['sanpham_id']; ?>)">Xem
                                chi tiết</button>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <!-- Phân trang -->
                <?php if ($total_pages > 1): ?>
                <div class="pagination active">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php
// Đóng kết nối
$con->close();
?>