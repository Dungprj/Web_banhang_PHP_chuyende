<?php
$tukhoa = ''; 
if(isset($_SESSION['search']))
{
    $tukhoa = $_SESSION['search'];
}




if (isset($_POST['tukhoa']) ||isset($_SESSION['search']) ) {
    // Lấy từ khóa tìm kiếm
    $tukhoa = mysqli_real_escape_string($con, isset($_POST['tukhoa']) == false ?$_SESSION['search'] :$_POST['tukhoa'] );
    $_SESSION['search'] =  $tukhoa;
    // Truy vấn SQL tìm kiếm sản phẩm theo tên
    $sql_search = "SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%" . $tukhoa . "%'";
    $result_products = mysqli_query($con, $sql_search);

    // Kiểm tra phân trang
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $products_per_page = 6; 

    $start_from = ($current_page - 1) * $products_per_page;
    $sql_search .= " LIMIT $start_from, $products_per_page";


    $result_products = mysqli_query($con, $sql_search);
    $total_products = mysqli_num_rows($result_products); 
    $total_pages = ceil($total_products / $products_per_page);

    
    
    if (!$result_products || mysqli_num_rows($result_products) == 0) {
        $no_results = true;
    }
}




?>





   

    <?php
     $title = "Kết quả tìm kiếm cho : ".$tukhoa;

     $sql_search_count = mysqli_query($con,"SELECT count(*) as sl FROM tbl_sanpham WHERE sanpham_name LIKE '%" . $tukhoa . "%'");	

	//phan trang bat dau

	// Số sản phẩm mỗi trang
	$products_per_page = 3;

	// Lấy số trang hiện tại từ URL (mặc định là 1 nếu không có)
	$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;


	

	
	
	
	$search_count = mysqli_fetch_array($sql_search_count);

	$total_products = $search_count["sl"]-1;

	// Tính tổng số trang
	$total_pages = ceil($total_products / $products_per_page);


	// Tính offset cho câu truy vấn
	$offset = ($current_page - 1) * $products_per_page;

	

	// Truy vấn để lấy danh sách sản phẩm cho trang hiện tại
	$query_products = "SELECT *  FROM tbl_sanpham WHERE sanpham_name LIKE '%" . $tukhoa . "%' LIMIT $offset, $products_per_page";		
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
// Đóng kết nối
$con->close();
?>