<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	 
	    <ul class="navbar-nav">
	       <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
	      </li>
          <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục Bài viết</a>
	      </li>
	    </ul>
	  </div>
	</nav>
