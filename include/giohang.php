<?php

$sotiengiam = 0;
$thanhtien = 0;
$isapply_voucher = null;
$isSuccess_Applyvoucher = false;
$Message_ApplyVourcher = "";



include  './/include/models/VeGiamGia.php';
$khachhang_id = "";

if(isset($_SESSION['khachhang_id']))
{
	$khachhang_id = $_SESSION['khachhang_id'];
}

if(!isset($_SESSION['khachhang_id']))
{
	echo "<script>
	alert('chưa đăng nhập !');

	window.location.href ='index.php?quanly=dangnhap';
	
	</script>";
	
	die();
}

 if(isset($_POST['themgiohang'])){
	
 	$tensanpham = $_POST['tensanpham'];
 	$sanpham_id = $_POST['sanpham_id'];
 	$hinhanh = $_POST['hinhanh'];
 	$gia = $_POST['giasanpham'];
 	$soluong = $_POST['soluong'];	
	
 	$sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'  and khachhang_id = '$khachhang_id'");
 	$count = mysqli_num_rows($sql_select_giohang);
 	if($count>0){
 		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
 		$soluong = $row_sanpham['soluong'] + 1;
 		$sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' and khachhang_id = '$khachhang_id'";
 	}else{
 		$soluong = $soluong;
		
 		$sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong,khachhang_id) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$khachhang_id')";

 	}
 	$insert_row = mysqli_query($con,$sql_giohang);
 	// if($insert_row==0){
 	// 	header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
 	// }

 }elseif(isset($_POST['capnhatsoluong'])){
 	
 	for($i=0;$i<count($_POST['product_id']);$i++){
 		$sanpham_id = $_POST['product_id'][$i];
 		$soluong = $_POST['soluong'][$i];
 		if($soluong<=0){
 			$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id' and khachhang_id = '$khachhang_id'");
 		}else{
 			$sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' and khachhang_id = '$khachhang_id'");
 		}
 	}	

 }elseif(isset($_GET['xoa'])){
 	$id = $_GET['xoa'];
 	$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id='$id' and khachhang_id = $khachhang_id");

 }elseif(isset($_GET['dangxuat'])){

 	$id = $_GET['dangxuat'];
 	if($id==1){
		session_destroy();
		
		
 	}

 
 }elseif(isset($_POST['thanhtoan'])){


 	$name = $_POST['name'];
 	$phone = $_POST['phone'];
 	$email = $_POST['email'];
 	$password = md5($_POST['password']);
 	$note = $_POST['note'];
 	$address = $_POST['address'];
 	$giaohang = $_POST['giaohang'];
 
 	$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
 	if($sql_khachhang){
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang where khachhang_id = $khachhang_id ORDER BY khachhang_id DESC LIMIT 1");
 		$mahang = rand(0,9999);
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$khachhang_id = $row_khachhang['khachhang_id'];
 		$_SESSION['dangnhap_home'] = $row_khachhang['name'];
 		$_SESSION['khachhang_id'] = $khachhang_id;
 		for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
	 		$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
	 		$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
	 		$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id' and khachhang_id = $khachhang_id");
 		}

		

 	}
 }elseif(isset($_POST['thanhtoandangnhap'])){

	$voucher_id = null;
	if(isset($_SESSION['id_voucher_select']))
	{
		$voucher_id = $_SESSION['id_voucher_select'];
	}
	

 	$khachhang_id = $_SESSION['khachhang_id'];
 	$mahang = rand(0,9999);	
 	for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
	 		$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang,voucher_id) values ('$sanpham_id','$khachhang_id','$soluong','$mahang','$voucher_id')");
	 		$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id,voucher_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$voucher_id')");
	 		$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id' and khachhang_id = $khachhang_id ");
 		}

		if($voucher_id !=null)
		{
			$soLuongVeHienTai = Tiketdiscount::getSoLuongHienTai($voucher_id);
			Tiketdiscount::setSoLuongHienTai($voucher_id,$soLuongVeHienTai-1);
			$sqldungvoucher = mysqli_query($con, "INSERT INTO tbl_usevoucher(khachhang_id,voucher_id,ngaySudung) values('$khachhang_id','$$voucher_id',default)");

		}

		
		if(isset($_SESSION['id_voucher_select']))
		{
			unset($_SESSION['id_voucher_select']);
		}
		echo "<script>alert('Đặt hàng thành công !')</script>";
		
	
 }


 if (isset($_POST['select_voucher']) && isset($_POST['id_voucher'])) {
    
	$isapply_voucher = true;

    $id_GiamGia = $_POST['id_voucher'];
	
	$_SESSION['id_voucher_select'] = $_POST['id_voucher'];
    $tongSoTien = $_POST['tongSoTien'];
	

	

    $result =  Tiketdiscount::applyVoucher($id_GiamGia, $tongSoTien);
	
	

    $status = $result["isSuccess"];
    $message = $result["message"];
	$Message_ApplyVourcher = $message;
	$isSuccess_Applyvoucher = $status;
    $khachhang_id = $_SESSION['khachhang_id'];
   
	$sotiengiam = $result["sotiengiam"];
}

?>

<style>
	#magiamgia{
    width:700px;
    height:750px; 
    background-color:#ffffff;
    position:fixed;
    z-index: 999999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
	display:none;
	outline-style: double;
    

}
.base_magiamgia{
    
    width: 90%;
    height:25%;
    margin-top:5%;
    margin-left:2%;
    background-color: white;
    justify-content:space-between;
    align-content: center;
    border:solid 1px orange;
    border-style: groove;
    display:flex;
}
.noidung_magiamgia
{
    width: 100%;
    height: 100%;
    padding-right:30%;
    display:flex;
    flex-direction: column;
    justify-content:center;
    padding-left:5%;
}
.bl_radio_magiamgia{
    width: 10%;
    height: 100%;
    position:absolute;
    right:1%;
    top:45%;

    


    
}

.radio_magiamgia {
        transform: scale(2.5); /* Tăng kích thước của nút radio */
        -webkit-transform: scale(2.5); /* Hỗ trợ cho trình duyệt WebKit */
        -moz-transform: scale(2.5); /* Hỗ trợ cho trình duyệt Firefox */
        -ms-transform: scale(2.5); /* Hỗ trợ cho trình duyệt Internet Explorer */
        -o-transform: scale(2.5); /* Hỗ trợ cho trình duyệt Opera */
        margin: 10px; /* Thêm margin nếu cần */
    }

.bl_timkiemmagiamgia{
    width: 100%;
    display: flex;
    align-items: center;
    background-color:#bebebe;
    
    

}
.inp_timkiem{
    margin-left:5%;
    margin-right:5%;
    margin-top:5%;
    margin-bottom:5%;
    width: 80%;
    
}
.btn-apdungmagiamgia
{
    width: 25%;
    height: 25%;
    margin-right:5%;
}
.list-magiamgia{
    width: 100%;
    height:75%;
    overflow-y: auto;
}
.noidung-and-radio
{
    width: 95%;
    height:100;
    position:relative;
}
.bl_footer-magiamgia{
    width: 95%;
    
    display: flex;
    justify-content: end;
    margin-top:2%;
    
}


</style>
<!-- 
//begin body cart -->

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<form action="" method="POST">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td colspan="3" class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Giá tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

                    <?php
					$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang where khachhang_id = '$khachhang_id' ORDER BY giohang_id DESC");
						$i = 0;
						$total = 0;
						while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){ 
							// var_dump($row_fetch_giohang);
							$subtotal = (int)$row_fetch_giohang['soluong'] *(int) $row_fetch_giohang['giasanpham'];
							$total+=$subtotal;
							$i++;
							$tongTienGlobal = $total;
							$thanhtien = $total;
				
							
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="uploads/<?php echo $row_fetch_giohang['hinhanh'] ?>" style="width:100%; max-width:150px; " alt=""></a>
							</td>
						
							<td colspan="3" class="cart_description">
                                <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                <p style="padding-left:5%;"><?php echo $row_fetch_giohang['tensanpham'] ?></p>
                            </td>
                                
							</td>
							<td class="cart_price">
								<p><?php echo $row_fetch_giohang['giasanpham'].'vnđ' ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="" data-id="<?php echo $row_fetch_giohang['sanpham_id']; ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="soluong[]"  id="soluong_<?php echo $row_fetch_giohang['sanpham_id']; ?>" value="<?php echo $row_fetch_giohang['soluong'] ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""   data-id="<?php echo $row_fetch_giohang['sanpham_id']; ?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($subtotal).'vnđ' ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>"><i class="fa fa-times"></i></a>
							</td>
							<tr>
							<td colspan="4">&nbsp;</td>
							
						</tr>
						</tr>
                        <?php
							} 
							?>
							<tr>
								<td colspan="6" style="text-align: right;">Voucher: </td>
								<?php
								if (isset($_POST['select_voucher']) && isset($_POST['id_voucher'])) {
									?>
								
								<td><p id="open" style="color:orange; cursor:pointer;"><?php echo $row_fetch_magiamgia["name"]?></p> </td>
								
								<?php
								}
								else{
								?>
								<td><p id="open" style="color:orange; cursor:pointer;">Chọn mã giảm giá</p> </td>
								<?php
							}
								?>
							</tr>
							
							<tr>
								<td colspan="7" style="text-align: right;">Tổng tiền : <?php echo number_format($total).' vnđ' ?></td>

							</tr>
							<tr>
								
								<td colspan="6" style="text-align: right;">
								<?php 
								
								if($isapply_voucher!= null && $isSuccess_Applyvoucher == false)
								{
									echo "<strong>$Message_ApplyVourcher</strong>";
								}else if($isapply_voucher != null && $isSuccess_Applyvoucher == true){
									$Message_ApplyVourcher = "Đã áp dụng mã giảm giá";
									echo "<strong>$Message_ApplyVourcher</strong>";
								}else{
									echo "";
								} 
								
								?> 
								</td>
							

								<td colspan="1" style="text-align: right;"> -- <?php echo number_format($sotiengiam).' vnđ' ?></td>

							</tr>
							<tr>
								<td colspan="7" style="text-align: right;">Thành tiền : <?php echo number_format($thanhtien-$sotiengiam).' vnđ'  ?></td>

							</tr>
							<tr>
								<td colspan="5"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
								<?php 
								$sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang where khachhang_id = $khachhang_id");
								$count_giohang_select = mysqli_num_rows($sql_giohang_select);

								if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
									while($row_1 = mysqli_fetch_array($sql_giohang_select)){
								?>
								
								<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
								<?php 
							}
								?>
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="thanhtoandangnhap">
		
								<?php
								} 
								?>
								
								</td>
							
							</tr>
						

							

					</tbody>
				</table>
			</div>

			
			<script>
				// Khi nhấn nút increase
document.querySelectorAll('.cart_quantity_up').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var productId = this.getAttribute('data-id');
        var input = document.getElementById('soluong_' + productId);
        input.value = parseInt(input.value) + 1;
    });
});

// Khi nhấn nút decrease
document.querySelectorAll('.cart_quantity_down').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var productId = this.getAttribute('data-id');
        var input = document.getElementById('soluong_' + productId);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    });
});



</script>
			</form>
				<!-- form ma giảm giá-->
			<form action="" method="post" id="magiamgia" >
				<input type="hidden" name="tongSoTien" value=<?php echo $total;?>>
				<div class="bl_timkiemmagiamgia">
					<input class="inp_timkiem form-control" type="text" placeholder="Nhập mã giảm giá">
					<button type="button" class="btn btn-light btn-apdungmagiamgia">Áp dụng</button>
				</div>


				
			

			
				<div class="list-magiamgia">

				<?php
				$sql_lay_magiamgia = mysqli_query($con,"SELECT * FROM tbl_tiketdiscount");
				while($row_fetch_magiamgia = mysqli_fetch_array($sql_lay_magiamgia)){ 
					if($row_fetch_magiamgia["soLuong"]>0 && strtotime($row_fetch_magiamgia["ngayKetThuc"]) >= strtotime(date("Y-m-d H:i:s")))
					{
				?>

					<div class="base_magiamgia">
						
						
						<img src="https://down-vn.img.susercontent.com/file/01ad529d780769c418b225c96cb8a3d7" alt="magiamgia" style="width:30%;height:100%;">
						<div class="noidung-and-radio">
							<div class="noidung_magiamgia">
								<p> Mã giảm giá <?php echo $row_fetch_magiamgia["name"]?> . Giảm tổng giá trị đơn hàng lên đến <?php echo $row_fetch_magiamgia["phanTramGiam"]?> %</p>
								<p> </p>
								<p> Từ <?php echo $row_fetch_magiamgia["ngayBatDau"]?></p>
								<p> Đến <?php echo $row_fetch_magiamgia["ngayKetThuc"]?></p>
								<p style="text-align: right; position:absolute; bottom:1%;right:1%; font-size:12px;"> Chỉ còn : <?php echo $row_fetch_magiamgia["soLuong"]?></p>
								
								
							</div>
							<div class="bl_radio_magiamgia">
							<input  class="radio_magiamgia form-check-input" type="radio" name="id_voucher" value=<?php echo $row_fetch_magiamgia["id"]?>  >
							</div>
						</div>
					</div>
				<?php
					}else{
					?>

					<div class="base_magiamgia" style="cursor: not-allowed;">
						
						
						<img src="https://down-vn.img.susercontent.com/file/01ad529d780769c418b225c96cb8a3d7" alt="magiamgia" style="width:30%;height:100%;">
						<div class="noidung-and-radio" >
							<div class="noidung_magiamgia">
								<p> Mã giảm giá <?php echo $row_fetch_magiamgia["name"]?> . Giảm tổng giá trị đơn hàng lên đến <?php echo $row_fetch_magiamgia["phanTramGiam"]?> %</p>
								<p> </p>
								<p> Từ <?php echo $row_fetch_magiamgia["ngayBatDau"]?></p>
								<p> Đến <?php echo $row_fetch_magiamgia["ngayKetThuc"]?></p>
								<p style="text-align: right; position:absolute; bottom:1%;right:1%; font-size:12px;"> Chỉ còn : <?php echo $row_fetch_magiamgia["soLuong"]?></p>
								
								
							</div>
							<div class="bl_radio_magiamgia">
							<input  class="radio_magiamgia form-check-input" type="radio" disabled style="cursor: not-allowed;" name="id_voucher" value=<?php echo $row_fetch_magiamgia["id"]?>  >
							</div>
						</div>
					</div>




					<?php }?>










				
				<?php
				}
				?>

					


					

					

					


				</div>
				<div class="bl_footer-magiamgia">
					<button id="close" type="button" class="btn btn-light">Trở Lại</button>
					<button id="chonvoucher" type="submit" class="btn btn-danger" name="select_voucher" style="margin-left:5%;margin-right:3%;">OK</button>
				</div>
				
				
				
				

			</form>
			
		</div>
	</section> <!--/#cart_items-->







<!-- //end body cart -->







	<script>
    const openBtn = document.getElementById('open');
    const closeBtn = document.getElementById('close');
    const myDiv = document.getElementById('magiamgia');
	
    const chonVoucher = document.getElementById('chonvoucher');
	
	chonVoucher.addEventListener('click', function() {
        myDiv.style.display = 'none';
		
    });


    openBtn.addEventListener('click', function() {
        myDiv.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        myDiv.style.display = 'none';
		
    });



	//ajax ap voucher
	






</script>