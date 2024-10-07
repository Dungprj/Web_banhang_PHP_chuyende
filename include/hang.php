<?php



if (isset($_GET['sanpham_chitiet'])) {
    $sanpham_chitiet = $_GET['sanpham_chitiet'];

    // Truy vấn lấy sản phẩm theo hãng
    $sql_products = "SELECT * FROM tbl_sanpham WHERE sanpham_chitiet = ?";
    $stmt = $con->prepare($sql_products);
    $stmt->bind_param("s", $sanpham_chitiet);
    $stmt->execute();
    $result_products = $stmt->get_result();
	$sql_brand_count = mysqli_query($con,"SELECT count(*) as sl FROM tbl_sanpham where sanpham_chitiet = '$sanpham_chitiet'");		

	//phan trang bat dau

	// Số sản phẩm mỗi trang
	$products_per_page = 6;

	// Lấy số trang hiện tại từ URL (mặc định là 1 nếu không có)
	$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;


	

	
	
	
	$brand_count = mysqli_fetch_array($sql_brand_count);

	$total_products = $brand_count["sl"]-1;

	// Tính tổng số trang
	$total_pages = ceil($total_products / $products_per_page);


	// Tính offset cho câu truy vấn
	$offset = ($current_page - 1) * $products_per_page;

	

	// Truy vấn để lấy danh sách sản phẩm cho trang hiện tại
	$query_products = " SELECT *  FROM tbl_sanpham where sanpham_chitiet = '$sanpham_chitiet'  LIMIT $offset, $products_per_page";		
	$result_products_default = $con->query($query_products);
	$result_products = $result_products_default;

	//phan trang ket thuc

    if ($result_products->num_rows === 0) {
        echo "<p>Không có sản phẩm nào thuộc hãng này.</p>";
    }
} else {
    echo "<p>Hãng không hợp lệ.</p>";
    exit;
}


$title = "Sản phẩm thuộc hãng: " . htmlspecialchars(strtoupper($sanpham_chitiet));

include "danhsachsanpham.php";

?>