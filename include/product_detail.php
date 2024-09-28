<?php


//chung
// include("db/chung.php");

// Gán ID sản phẩm
$product_id = isset($_GET['sanpham_id']) ? intval($_GET['sanpham_id']) : 17; // Lấy từ URL nếu có, nếu không thì gán mặc định là 17

// Hàm lấy dữ liệu từ cơ sở dữ liệu
function fetchData($con, $query, $product_id) {
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    return $stmt->get_result();
}

// Lấy thông tin sản phẩm
$result = fetchData($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id = ?", $product_id);
$product = $result->fetch_assoc();
if (!$product) {
    echo "Không tìm thấy sản phẩm.";
    exit();
}

// Lấy danh sách ảnh phụ của sản phẩm
$result_images = fetchData($con, "SELECT image_url FROM tbl_sanpham_images WHERE sanpham_id = ?", $product_id);
$product_images = [];
while ($row = $result_images->fetch_assoc()) {
    $product_images[] = $row['image_url'];
}

// Lấy thông tin giới thiệu sản phẩm
$result_intro = fetchData($con, "SELECT * FROM tbl_sanpham_gioithieu WHERE sanpham_id = ?", $product_id);
$introduction = $result_intro->fetch_all(MYSQLI_ASSOC) ?: [];

// Lấy thông tin chi tiết cấu hình sản phẩm
$result_config = fetchData($con, "SELECT * FROM tbl_sanpham_chitietcauhinh WHERE sanpham_id = ?", $product_id);
$config_details = $result_config->fetch_all(MYSQLI_ASSOC) ?: [];

// Lấy thông tin khác
$result_other_info = fetchData($con, "SELECT * FROM tbl_sanpham_thongtinkhac WHERE sanpham_id = ?", $product_id);
$other_info = $result_other_info->fetch_all(MYSQLI_ASSOC) ?: [];

// Lấy gợi ý sản phẩm dựa trên mô tả sản phẩm
$product_description = $product['sanpham_mota'];
$stmt_suggestions = $con->prepare("SELECT * FROM tbl_sanpham WHERE sanpham_id != ? AND sanpham_mota LIKE ? LIMIT 6");
$like_description = "%" . $product_description . "%";
$stmt_suggestions->bind_param("is", $product_id, $like_description);
$stmt_suggestions->execute();
$suggested_products = $stmt_suggestions->get_result()->fetch_all(MYSQLI_ASSOC);

// Lấy ảnh cho các sản phẩm gợi ý
$suggested_images = [];
foreach ($suggested_products as $suggested) {
    $stmt_image = $con->prepare("SELECT image_url FROM tbl_sanpham_images WHERE sanpham_id = ?");
    $stmt_image->bind_param("i", $suggested['sanpham_id']);
    $stmt_image->execute();
    $result_image = $stmt_image->get_result();
    $images = [];
    while ($row_image = $result_image->fetch_assoc()) {
        $images[] = $row_image['image_url'];
    }
    $suggested_images[$suggested['sanpham_id']] = $images;
}




// Lấy danh sách đánh giá cho sản phẩm
$query = "SELECT * FROM tbl_sanpham_danhgia WHERE sanpham_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// Kiểm tra xem form có được gửi không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $review_name = htmlspecialchars(trim($_POST['review_name']));
    $review_rating = intval($_POST['review_rating']);
    $review_content = htmlspecialchars(trim($_POST['review_content']));

    // Truy vấn để lưu đánh giá
    $query = "INSERT INTO tbl_sanpham_danhgia (sanpham_id, danhgia_noidung, danhgia_diem, danhgia_ten) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("isis", $product_id, $review_content, $review_rating, $review_name);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
        // Đóng kết nối
        $stmt->close();
        
        // Cập nhật lại danh sách đánh giá mà không cần tải lại trang
        echo json_encode(['success' => true, 'name' => $review_name, 'rating' => $review_rating, 'content' => $review_content]);
        exit();
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
        exit();
    }
}

// Đóng kết nối
$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['sanpham_name']); ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="css/product_same.css" rel="stylesheet">
    <style>
    .star-rating {
        direction: rtl;
        /* Để xếp ngôi sao từ phải sang trái */
    }

    .star {
        font-size: 24px;
        color: lightgray;
        /* Màu mặc định của ngôi sao */
        cursor: pointer;
    }

    .star:hover,
    .star:hover~.star {
        color: gold;
        /* Màu vàng khi hover */
    }

    .star-rating input[type="radio"] {
        display: none;
        /* Ẩn radio button */
    }

    input[type="radio"]:checked~.star {
        color: gold;
        /* Màu vàng cho ngôi sao đã chọn */
    }

    /* Đổi màu cho ngôi sao bên trái của ngôi sao được chọn */
    .star-rating input[type="radio"]:checked+.star,
    .star-rating input[type="radio"]:checked+.star~.star {
        color: gold;
        /* Màu vàng cho ngôi sao đã chọn */
    }
    </style>
</head>

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="#"><i class="fa fa-phone"></i> +84 123456789</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-envelope"></i> nhom8@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#"><i class="fa fa-user"></i> Tài Khoản</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-star"></i> Yêu thích</a>
                                </li>
                                <li>
                                    <a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a>
                                </li>
                                <li>
                                    <a href="cart.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                                </li>
                                <li>
                                    <a href="login.php"><i class="fa fa-lock"></i> Đăng nhập</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Trang chủ</a></li>
                                <li class="dropdown">
                                    <a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Danh mục sản phẩm</a></li>
                                        <li><a href="product-details.php">Chi tiết sản phẩm</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="cart.php">Giỏ hàng</a></li>
                                        <li><a href="login.php">Đăng nhập</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Bài viết<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.php">Kiến thức Tivi</a></li>
                                        <li><a href="blog-single.php">Kiến thức Laptop</a></li>
                                        <li><a href="blog-single.php">Kiến thức Máy giặt</a></li>
                                        <li><a href="blog-single.php">Kiến thức Tủ lạnh</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a href="404.php">404</a></li> -->
                                <li><a href="contact-us.php">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Tìm kiếm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <section>
        <!-- <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <div class="left-sidebar">
                            <h2>Danh mục sản phẩm</h2>
                            <div class="panel-group category-products" id="accordian">
                                <?php foreach ($categories as $category => $brandsInCategory): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian"
                                                href="#<?php echo htmlspecialchars($category); ?>">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <?php echo htmlspecialchars($category); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo htmlspecialchars($category); ?>"
                                        class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <?php foreach ($brandsInCategory as $brand): ?>
                                                <li><a href="#"><?php echo htmlspecialchars($brand); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Phần hiển thị danh sách các hãng -->
                            <div class="brands_products">
                                <h2>Hãng</h2>
                                <div class="brands-name">
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php if (empty($brands)): ?>
                                        <li>Không có hãng nào.</li>
                                        <?php else: ?>
                                        <?php foreach ($brands as $brand): ?>
                                        <li>
                                            <a href="#">
                                                <span class="pull-right"></span>
                                                <?php echo htmlspecialchars($brand); ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-sm-5 d-flex">
                                <!-- Ảnh nhỏ bên trái -->
                                <div class="thumbnail-container">
                                    <!-- Hiển thị các ảnh phụ -->
                                    <?php foreach ($product_images as $image_url): ?>
                                    <a href="javascript:void(0);"
                                        onclick="changeImage('<?php echo htmlspecialchars($image_url); ?>')">
                                        <img src=".//images/<?php echo htmlspecialchars($image_url); ?>" alt="Thumbnail"
                                            class="img-thumbnail" />
                                    </a>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Ảnh chính bên phải với hiệu ứng zoom -->
                                <div class="view-product">
                                    <div class="zoom-container">
                                        <img id="main-image"
                                            src="<?php echo htmlspecialchars($product['sanpham_image']); ?>"
                                            alt="<?php echo htmlspecialchars($product['sanpham_name']); ?>"
                                            class="img-fluid main-image" />
                                        <div class="zoom-effect"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="product-information">
                                    <h2><?php echo htmlspecialchars($product['sanpham_name']); ?></h2>
                                    <span>
                                        <span><?php echo number_format($product['sanpham_gia']); ?><sup>đ</sup></span>
                                        <label>Số lượng:</label>
                                        <div class="quantity-controls">
                                            <button type="button" class="quantity-btn" id="decrease-btn">-</button>
                                            <input type="text" id="quantity-input" value="1" />
                                            <button type="button" class="quantity-btn" id="increase-btn">+</button>
                                        </div>
                                        <button type="button" class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                        <button type="button" class="btn btn-default cart">
                                            Tiếp tục mua hàng
                                        </button>
                                    </span>

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
                                        <a href="#tag" data-toggle="tab">Thông tin khác</a>
                                    </li>
                                    <li>
                                        <a href="#reviews" data-toggle="tab">đánh giá sản phẩm</a>
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
                                                <?php foreach ($config_details as $config): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($config['cauhinh_tieude']); ?></td>
                                                    <td><?php echo nl2br(htmlspecialchars($config['cauhinh_noidung'])); ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tab Thông tin khác -->
                                <div class="tab-pane fade" id="tag">
                                    <div class="col-sm-12">
                                        <h3>Thông tin khác</h3>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Bảo hành</th>
                                                    <th>Nội dung</th>
                                                </tr>
                                                <?php foreach ($other_info as $info): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($info['bao_hanh']); ?></td>
                                                    <td><?php echo nl2br(htmlspecialchars($info['thong_tin_khac'])); ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tab Đánh giá sản phẩm -->
                                <div class="tab-pane fade" id="reviews">
                                    <div class="col-sm-12">
                                        <h2>Thêm đánh giá của bạn:</h2>
                                        <form id="review-form">
                                            <input type="hidden" name="sanpham_id"
                                                value="<?php echo htmlspecialchars($product_id); ?>" />
                                            <label for="review-name">Tên của bạn:</label>
                                            <input type="text" name="review_name" id="review-name" required />

                                            <div id="review-rating" class="star-rating">
                                                <input type="radio" name="review_rating" value="1" id="star-1"
                                                    required />
                                                <label for="star-1" class="star">&#9733;</label>
                                                <input type="radio" name="review_rating" value="2" id="star-2"
                                                    required />
                                                <label for="star-2" class="star">&#9733;</label>
                                                <input type="radio" name="review_rating" value="3" id="star-3"
                                                    required />
                                                <label for="star-3" class="star">&#9733;</label>
                                                <input type="radio" name="review_rating" value="4" id="star-4"
                                                    required />
                                                <label for="star-4" class="star">&#9733;</label>
                                                <input type="radio" name="review_rating" value="5" id="star-5"
                                                    required />
                                                <label for="star-5" class="star">&#9733;</label>
                                            </div>
                                            <label for="review-content">Nội dung đánh giá:</label>
                                            <textarea name="review_content" id="review-content" required></textarea>
                                            <button type="submit" class="btn btn-default">Gửi đánh giá</button>
                                        </form>

                                        <h2>Đánh giá sản phẩm</h2>
                                        <div class="filter-rating">
                                            <input type="radio" name="filter_rating" value="0" id="filter-all"
                                                checked />
                                            <label for="filter-all">Tất cả</label>
                                            <input type="radio" name="filter_rating" value="1" id="filter-1" />
                                            <label for="filter-1">1 sao</label>
                                            <input type="radio" name="filter_rating" value="2" id="filter-2" />
                                            <label for="filter-2">2 sao</label>
                                            <input type="radio" name="filter_rating" value="3" id="filter-3" />
                                            <label for="filter-3">3 sao</label>
                                            <input type="radio" name="filter_rating" value="4" id="filter-4" />
                                            <label for="filter-4">4 sao</label>
                                            <input type="radio" name="filter_rating" value="5" id="filter-5" />
                                            <label for="filter-5">5 sao</label>
                                        </div>
                                        <br>
                                        <div id="reviews-list">
                                            <?php if (!empty($reviews)): ?>
                                            <?php foreach ($reviews as $review): ?>
                                            <div class="review-item"
                                                data-rating="<?php echo $review['danhgia_diem']; ?>">
                                                <strong><?php echo htmlspecialchars($review['danhgia_ten']); ?></strong>

                                                <p>Đánh giá: <?php echo str_repeat('★', $review['danhgia_diem']); ?></p>
                                                <p><?php echo nl2br(htmlspecialchars($review['danhgia_noidung'])); ?>
                                                </p>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <p>Chưa có đánh giá nào.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!--/category-tab-->
                    </div>
                    <!--/product-details-->
                </div>
            </div>
        </div> -->
    </section>

    <div class="product_same">
        <h2>Sản phẩm tương tự</h2>
        <div class="navigation-buttons">
            <button class="nav-button" onclick="scrollLeft()">&#x3C; Previous</button>
            <button class="nav-button" onclick="scrollRight()">Next &#x3E;</button>
        </div>
    </div>
    <!-- <div class="product-suggestions" id="suggestions-container"> -->
        <?php foreach ($suggested_products as $suggested): ?>
        <div class="product-card">
            <img src="<?php echo isset($suggested_images[$suggested['sanpham_id']]) ? $suggested_images[$suggested['sanpham_id']][0] : 'default.jpg'; ?>"
                alt="<?php echo $suggested['sanpham_name']; ?>">
            <h4><?php echo $suggested['sanpham_name']; ?></h4>
            <p>Giá: <?php echo number_format($suggested['sanpham_gia'], 0, ',', '.'); ?>₫</p>
        </div>
        <?php endforeach; ?>
    </div>
    </div>



    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Hỗ trợ trực tuyến</a></li>
                                <li><a href="#">Liên hệ với chúng tôi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Giới thiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin cửa hàng</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Liên hệ ngay với chúng tôi</p>
                    <p class="pull-right">0999999999 <span><a target="_blank"
                                href="https://maps.app.goo.gl/xkJr64N7uyQzNdZ76">vị trí cửa hàng</a></span></p>
                    <p></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->

    <!-- CSS cho ngôi sao -->
    <style>

    </style>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Xử lý sự kiện gửi form đánh giá
        $('#review-form').submit(function(event) {
            event.preventDefault(); // Ngăn chặn hành động gửi form mặc định

            $.ajax({
                type: 'POST',
                url: '', // URL gửi đến, để lại trống nếu cùng trang
                data: $(this).serialize(),
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.success) {
                        // Thêm đánh giá mới vào danh sách
                        $('#reviews-list').prepend(`
                        <div class="review-item" data-rating="${data.rating}">
                            <strong>${data.name}</strong>
                            <p>Đánh giá: ${'★'.repeat(data.rating)}</p>
                            <p>${data.content.replace(/\n/g, "<br>")}</p>
                        </div>
                    `);
                        // Làm sạch form
                        $('#review-form')[0].reset();
                    } else {
                        alert('Có lỗi xảy ra: ' + data.error);
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra khi gửi đánh giá.');
                }
            });
        });

        // Xử lý sự kiện thay đổi lọc đánh giá
        $('input[name="filter_rating"]').change(function() {
            const selectedRating = parseInt($(this).val());
            $('#reviews-list .review-item').each(function() {
                const itemRating = parseInt($(this).data('rating'));
                if (selectedRating === 0 || itemRating === selectedRating) {
                    $(this).show(); // Hiện thị nếu chọn "Tất cả" hoặc đánh giá khớp
                } else {
                    $(this).hide(); // Ẩn nếu không khớp
                }
            });
        });
    });
    </script>


    <script>
    // Thay đổi ảnh khi nhấn vào thumbnail
    function changeImage(imageUrl) {
        document.getElementById('main-image').src = imageUrl;
    }
    </script>
    <script src="js/product.js"></script>
    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        let images = <?php echo json_encode($product_images); ?>;
        let currentIndex = 0;

        // Hàm chuyển đổi ảnh với hiệu ứng mờ dần
        function changeImageWithFade(imageUrl) {
            $('#main-image').fadeOut(500, function() {
                $(this).attr('src', imageUrl).fadeIn(500); // Chuyển đổi ảnh và làm mờ dần trở lại
            });
        }

        // Tự động chuyển đổi ảnh mỗi 3 giây
        function autoChangeImage() {
            if (images.length > 0) {
                changeImageWithFade(images[currentIndex]);
                currentIndex = (currentIndex + 1) % images.length;
            }
        }

        // Gọi hàm tự động chuyển ảnh mỗi 3 giây
        setInterval(autoChangeImage, 4000);


    });
    </script>

</body>

</html>