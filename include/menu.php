<?php 
		$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	?>
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
                                    <a href="#">Tin tức <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                        // Lấy danh sách danh mục tin tức từ cơ sở dữ liệu
                                        $sql_danhmuctin = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");

                                        // Lặp qua kết quả và hiển thị các danh mục
                                        while ($danhmuc = mysqli_fetch_array($sql_danhmuctin)) {
                                        ?>
                                           <li>
                                               <a class="dropdown-item" href="?quanly=tintuc&id_tin=<?= $danhmuc['danhmuctin_id'] ?>">
                                                   <?= $danhmuc['tendanhmuc'] ?>
                                               </a>
                                           </li>
                                       <?php } ?>
                                   </ul>
                              </li>


								<!-- <li><a href="404.html">404</a></li> -->
								<li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<form action="index.php?quanly=timkiem" method="POST">
						<div class="search_product">
							<input id="searchInput" type="text" placeholder="Tìm kiếm" name="tukhoa" />
							<input type="submit" name="timkiem" value="Tìm kiếm">
						</div>
					</form>
            </div>
				</div>
			</div>
		</div><!--/header-bottom-->

<script>
    
</script>