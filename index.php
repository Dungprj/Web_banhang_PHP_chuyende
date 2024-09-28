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
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
</head><!--/head-->
 <body>
 <?php
	
	include('include/topbar.php'); 
	include('include/menu.php');
   
	

	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
	}else{
		$tam = '';
	}

	if($tam=='danhmuc'){
		include('include/danhmuc.php');
	}elseif($tam=='chitietsp'){
		include('include/chitietsp.php');
	}elseif($tam=='giohang') {
		include('include/giohang.php');
		
	}elseif ($tam=='timkiem') {
		include('include/timkiem.php');
	}elseif ($tam=='tintuc') {
		include('include/tintuc.php');
	}elseif ($tam=='chitiettin') {
		include('include/chitiettin.php');
	}elseif ($tam=='xemdonhang') {
		include('include/xemdonhang.php');
	}elseif ($tam=='taikhoan') {
		include('include/account.php');
	}
	elseif ($tam=='dangnhap') {
		include('include/dangnhap.php');
	}
	elseif ($tam=='dangky'){
		include('include/dangky.php');
	}else{
		include('include/home.php'); 
	}
	 
	include('include/footer.php'); 
	?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
 </body>
 </html>