<?php
	include('../db/connect.php');
?>
<?php
// Khởi tạo biến để lưu trữ dữ liệu
$ngay = [];
$tong_soluong = [];
$tong_doanh_thu = [];
$tong_doanh_thu_tong = 0; // Biến để lưu tổng doanh thu

// Kiểm tra xem người dùng có chọn thống kê không
if (isset($_POST['thongke'])) {
    $thongke = $_POST['thongke'];

    // Thực hiện truy vấn dựa trên lựa chọn
    if ($thongke == 'ngay') {
        $sql = "SELECT 
                    DATE(`tbl_giaodich`.`ngaythang`) AS `ngay`,
                    SUM(`tbl_giaodich`.`soluong`) AS `tong_soluong`,
                    SUM(`tbl_sanpham`.`sanpham_giakhuyenmai` * `tbl_giaodich`.`soluong`) AS `tong_doanh_thu`
                FROM 
                    `tbl_giaodich`
                JOIN 
                    `tbl_sanpham` ON `tbl_giaodich`.`sanpham_id` = `tbl_sanpham`.`sanpham_id`
                GROUP BY 
                    DATE(`tbl_giaodich`.`ngaythang`)
                ORDER BY 
                    DATE(`tbl_giaodich`.`ngaythang`) ASC";
    } elseif ($thongke == 'thang') {
        $sql = "SELECT 
                    DATE_FORMAT(`tbl_giaodich`.`ngaythang`, '%Y-%m') AS `thang`,
                    SUM(`tbl_giaodich`.`soluong`) AS `tong_soluong`,
                    SUM(`tbl_sanpham`.`sanpham_giakhuyenmai` * `tbl_giaodich`.`soluong`) AS `tong_doanh_thu`
                FROM 
                    `tbl_giaodich`
                JOIN 
                    `tbl_sanpham` ON `tbl_giaodich`.`sanpham_id` = `tbl_sanpham`.`sanpham_id`
                GROUP BY 
                    DATE_FORMAT(`tbl_giaodich`.`ngaythang`, '%Y-%m')
                ORDER BY 
                    DATE_FORMAT(`tbl_giaodich`.`ngaythang`, '%Y-%m') ASC";
    } elseif ($thongke == 'nam') {
        $sql = "SELECT 
                    YEAR(`tbl_giaodich`.`ngaythang`) AS `nam`,
                    SUM(`tbl_giaodich`.`soluong`) AS `tong_soluong`,
                    SUM(`tbl_sanpham`.`sanpham_giakhuyenmai` * `tbl_giaodich`.`soluong`) AS `tong_doanh_thu`
                FROM 
                    `tbl_giaodich`
                JOIN 
                    `tbl_sanpham` ON `tbl_giaodich`.`sanpham_id` = `tbl_sanpham`.`sanpham_id`
                GROUP BY 
                    YEAR(`tbl_giaodich`.`ngaythang`)
                ORDER BY 
                    YEAR(`tbl_giaodich`.`ngaythang`) ASC";
    }

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Lấy dữ liệu cho biểu đồ
        while($row = mysqli_fetch_assoc($result)) {
            if ($thongke == 'ngay') {
                $ngay[] = $row["ngay"];
            } elseif ($thongke == 'thang') {
                $ngay[] = $row["thang"];
            } elseif ($thongke == 'nam') {
                $ngay[] = $row["nam"];
            }
            $tong_soluong[] = $row["tong_soluong"];
            $tong_doanh_thu[] = $row["tong_doanh_thu"];
            $tong_doanh_thu_tong += $row["tong_doanh_thu"]; // Cộng dồn doanh thu
        }
    } else {
        echo "0 kết quả";
    }
}
// Đóng kết nối
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thống kê</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<?php include "dashboard.php";?>
	<br><br>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-8">
                <form method="POST" action="">
                    <label for="thongke">Chọn loại thống kê:</label>
                    <select name="thongke" id="thongke">
                        <option value="ngay">Theo ngày</option>
                        <option value="thang">Theo tháng</option>
                        <option value="nam">Theo năm</option>
                    </select>
                    <input type="submit" value="Thống kê">
                </form>

                <canvas id="myChart"></canvas>
                <script>
                    // Dữ liệu từ PHP
                    const labels = <?php echo json_encode($ngay); ?>;
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Tổng số lượng sản phẩm đã bán',
                            data: <?php echo json_encode($tong_soluong); ?>,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 1
                        },
                        {
                            label: 'Doanh thu',
                            data: <?php echo json_encode($tong_doanh_thu); ?>,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'line', // Loại biểu đồ (line, bar, pie, ...)
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

                <!-- Hiển thị tổng doanh thu -->
                <h3>Tổng doanh thu: <?php echo number_format($tong_doanh_thu_tong, 0, ',', '.'); ?> VNĐ</h3>

			</div>
		</div>
	</div>
</body>
</html>
