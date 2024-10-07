<?php


$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
$sql_list = mysqli_query($con, "SELECT * FROM `tbl_sanpham` ORDER BY `sanpham_id` ASC;");

?>

<?php 


// Số sản phẩm mỗi trang
$products_per_page = 6;

// Lấy số trang hiện tại từ URL (mặc định là 1 nếu không có)
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Tính tổng số sản phẩm
$total_products_query = "SELECT COUNT(*) as total FROM tbl_sanpham";
$total_result = $con->query($total_products_query);
$total_row = $total_result->fetch_assoc();
$total_products = $total_row['total'];

// Tính tổng số trang
$total_pages = ceil($total_products / $products_per_page);

// Tính offset cho câu truy vấn
$offset = ($current_page - 1) * $products_per_page;

// Truy vấn để lấy danh sách sản phẩm cho trang hiện tại
$query_products = "SELECT * FROM tbl_sanpham LIMIT $offset, $products_per_page";
$result_products = $con->query($query_products);
?>


<style>




</style>

   
<?php
$title = "Sản phẩm";

include "danhsachsanpham.php";

?>
<!-- Phân trang -->
<div class="pagination active">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
     
        <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
        <?php endfor; ?>
    </div>



<?php
// Đóng kết nối
$con->close();
?>
			</div>
		</div>
	</section>
		
  