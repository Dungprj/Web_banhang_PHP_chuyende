
<?php 



?>

<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_cate = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");	
	$sql_category = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");		
	$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	$sql_category_count = mysqli_query($con,"SELECT count(*) as sl FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");		

	$result_products = "";
	$title ="";
	
	if($sql_category ->num_rows > 0) {
		// Số sản phẩm mỗi trang
		$products_per_page = 6;

		// Lấy số trang hiện tại từ URL (mặc định là 1 nếu không có)
		$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;


		

		
		
		
		$category_count = mysqli_fetch_array($sql_category_count);
	
		$total_products = $category_count["sl"]-1;
	
		// Tính tổng số trang
		$total_pages = ceil($total_products / $products_per_page);
		$row_title = mysqli_fetch_array($sql_category);
		
		$result_products = $sql_category;
		$title = $row_title['category_name'];


		// Tính offset cho câu truy vấn
		$offset = ($current_page - 1) * $products_per_page;

		

		// Truy vấn để lấy danh sách sản phẩm cho trang hiện tại
		$query_products = " SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' LIMIT $offset, $products_per_page";		
		$result_products_default = $con->query($query_products);
		$result_products = $result_products_default;
	
		include "danhsachsanpham.php";

		?>
		<!-- Phân trang -->
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
	
		?>

		<h1>Chưa có sản phẩm cho danh mục này</h1>




<?php
		
		
	}





	


	?>


		