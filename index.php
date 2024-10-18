<?php
	session_start();
	include_once('db/connect.php');
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/fontawesome/css/all.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/product_p_p.css" rel="stylesheet">
	<link href="css/product.css" rel="stylesheet">
	<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

		<!-- Google Fonts -->
		<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head><!--/head-->
 <body>
 <?php
	
	include('include/topbar.php'); 
	include('include/menu.php');
  
?>

<div class="container">
        <div class="row">
       




<?php
	
	
	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
	}else{
		$tam = '';
	}

	if($tam=='danhmuc'){
		include "include/_partialpanellert.php";
		include('include/danhmuc.php');
	}
	elseif($tam=='hang'){
		
			include "include/_partialpanellert.php";
			include('include/hang.php');
	}elseif($tam=='chitietsp'){
		include "include/_partialpanellert.php";
		include('include/chitietsanpham.php');
	}elseif($tam=='giohang') {
		
		include('include/giohang.php');
		
	}elseif($tam=='lienhe') {

		include('include/contact.html');
		
	}elseif ($tam=='timkiem') {
		include "include/_partialpanellert.php";
		include('include/timkiem.php');
	}elseif ($tam=='tintuc') {
		include('include/tintuc.php');
	}elseif ($tam=='chitiettin') {
		include('include/chitiettin.php');
	}elseif ($tam=='xemdonhang') {
		include('include/xemdonhang.php');
	}elseif ($tam=='taikhoan') {
		include('include/account.php');
	}elseif ($tam=='locgia') {
		include "include/_partialpanellert.php";
		include('include/gia.php');
	}
	elseif ($tam=='dangnhap') {
		include('include/dangnhap.php');
	}elseif ($tam=='dangky') {
		include('include/dangky.php');
	}else{
		
		include "include/slider.php";
		include "include/_partialpanellert.php";
		include('include/home.php'); 
	}
	 
	
	?>

	
    
</div>	

</div>	
<?php
	include('include/footer.php'); 
	?>
 </body>
 
 <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script>
    function changeProduct(productId) {
        window.location.href = 'index.php?quanly=chitietsp&sanpham_id=' + productId;
    }
    </script>
 </html>