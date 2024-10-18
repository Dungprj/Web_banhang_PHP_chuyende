



<div class="col-sm-9">
    <h2><?php echo $title?></h2>
    <div class="row text-center">
        <!-- Căn giữa các sản phẩm -->
        <?php while ($product = $result_products->fetch_assoc()): ?>
        <div class="col-sm-4">
            <div class="product-card" style="cursor: pointer;" onclick="changeProduct(<?php echo $product['sanpham_id']; ?>)">
                <div class="productinfo">
                    <img src="./uploads/<?php echo $product['sanpham_image']; ?>"
                        alt="<?php echo htmlspecialchars($product['sanpham_name']); ?>" />
                        
                    <h2><?php echo number_format($product['sanpham_giakhuyenmai'])?> VNĐ</h2>
                    <del><?php echo number_format($product['sanpham_gia'])?> VNĐ</del>

                    <p><?php echo $product['sanpham_name']; ?></p>
                    <form action="index.php?quanly=giohang" method="post">
                        <fieldset>
                            <input type="hidden" name="tensanpham" value="<?php echo $product['sanpham_name'] ?>" />
                            <input type="hidden" name="sanpham_id" value="<?php echo $product['sanpham_id'] ?>" />
                            <input type="hidden" name="sanpham_giakhuyenmai" value="<?php echo $product['sanpham_giakhuyenmai'] ?>" />
                            <input type="hidden" name="hinhanh" value="<?php echo $product['sanpham_image'] ?>" />
                            <input type="hidden" name="soluong" value="1" />			
                        </fieldset>
                    <input  type="submit" name="themgiohang" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" />

                    </form>
                </div>
                
            </div>
        </div>

        <?php endwhile; ?>
    </div>

  
</div>