<?php
// Kết nối đến cơ sở dữ liệu (Giả sử bạn đã thiết lập biến $con)

// Kiểm tra nếu 'id' được truyền vào qua GET và xác thực
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Lấy danh sách sản phẩm theo thương hiệu
$sql_products = mysqli_query($con, "
    SELECT tbl_sanpham.*, tbl_brands.brands_name 
    FROM tbl_sanpham 
    JOIN tbl_brands ON tbl_brands.brands_id = tbl_sanpham.brands_id 
    WHERE tbl_sanpham.brands_id = '$id' 
    ORDER BY tbl_sanpham.sanpham_id DESC
");


// Lấy tất cả các thương hiệu
$sql_brands = mysqli_query($con, "SELECT * FROM tbl_brands ORDER BY brands_id DESC");

// Đếm số sản phẩm theo thương hiệu
$sql_brands_count = mysqli_query($con, "
    SELECT COUNT(*) AS sl 
    FROM tbl_sanpham 
    WHERE tbl_sanpham.brands_id = '$id'
");

$result_products = "";
$title = "";

if (mysqli_num_rows($sql_products) > 0) {
    // Số sản phẩm mỗi trang
    $products_per_page = 6;

    // Lấy số trang hiện tại từ URL (mặc định là 1 nếu không có)
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Lấy tổng số sản phẩm
    $brands_count = mysqli_fetch_array($sql_brands_count);
    $total_products = $brands_count["sl"];

    // Tính tổng số trang
    $total_pages = ceil($total_products / $products_per_page);

    // Tính offset cho câu truy vấn
    $offset = ($current_page - 1) * $products_per_page;

    // Truy vấn để lấy danh sách sản phẩm cho trang hiện tại
    $query_products = "
        SELECT tbl_sanpham.*, tbl_brands.brands_name 
        FROM tbl_sanpham 
        JOIN tbl_brands ON tbl_brands.brands_id = tbl_sanpham.brands_id 
        WHERE tbl_sanpham.brands_id = '$id' 
        LIMIT $offset, $products_per_page
    ";

    $get_name_brand = mysqli_query($con, "select brands_name from tbl_brands where brands_id = '$id'");

    $name_brand =  mysqli_fetch_array($get_name_brand);
 
   

 

    $result_products_default = mysqli_query($con, $query_products);

    // Kiểm tra kết quả truy vấn
    if ($result_products_default && mysqli_num_rows($result_products_default) > 0) {
        $result_products = $result_products_default;
        
        $title = "Sản phẩm thuộc hãng : ".$name_brand[0];
        // Hiển thị danh sách sản phẩm
        include "danhsachsanpham.php";

        // Phân trang
        ?>
        <div class="pagination">
            <?php 
            // Lấy tất cả các tham số truy vấn hiện tại
            $query_params = $_GET;

            for ($i = 1; $i <= $total_pages; $i++): 
                // Cập nhật hoặc thêm tham số 'page' trong mảng query
                $query_params['page'] = $i;
                // Tạo URL với tất cả các query hiện có và page mới
                $url = $_SERVER['PHP_SELF'] . '?' . http_build_query($query_params);
            ?>
            <a href="<?php echo $url; ?>" class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
            <?php endfor; ?>
        </div>
        <?php
    } else {
        echo "<h1>Chưa có sản phẩm cho danh mục này</h1>";
    }

} else {
    echo "<h1>Chưa có sản phẩm cho danh mục này</h1>";
}
?>
