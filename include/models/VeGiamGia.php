<?php
include('C:\xampp\htdocs\bandienmay\bandienmay\db\connect.php');
include("GiamGia.php");
class Tiketdiscount {
  
    private $name;
    private $tinhTiengiamgia;

    public function __construct( $name = null, TinhTienGiamGia $tinhTiengiamgia = null) {
        
        $this->name = $name;
        $this->tinhTiengiamgia = $tinhTiengiamgia;
    }

   
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTinhTienGiamGia(TinhTienGiamGia $value) {
        $this->tinhTiengiamgia = $value;
    }

    public function getTinhTienGiamGia() {
        return $this->tinhTiengiamgia;
    }

    public function getNgayBatDau() {
        return $this->tinhTiengiamgia->getNgayBatDau();
    }

    public function getNgayKetThuc() {
        return $this->tinhTiengiamgia->getNgayKetThuc();
    }

    public function isDiscountValid() {
        $now = new DateTime();
        return $this->tinhTiengiamgia->getNgayBatDau() <= $now && $this->tinhTiengiamgia->getNgayKetThuc() >= $now;
    }

    public function getSoLuongVeToiDa() {
        return $this->tinhTiengiamgia->getSoLuongVeToiDa();
    }

    public function setSoLuongVeToiDa($soLuongVeToiDa) {
        $this->tinhTiengiamgia->setSoLuongVeToiDa($soLuongVeToiDa);
    }
    public static function setSoLuongHienTai($id,$soLuongMoi) {
        global $con;
        $sql_select_tru1 = mysqli_query($con,"UPDATE tbl_tiketdiscount SET soLuong = $soLuongMoi WHERE id = $id");
        
    }

    public static function getSoLuongHienTai($id)
    {
        global $con;
        $sql_select_ve = mysqli_query($con,"SELECT soLuong FROM tbl_tiketdiscount WHERE id = $id");
        $row = mysqli_fetch_assoc($sql_select_ve);
        return $row['soLuong'];
    }




    //xu ly database
    public function add() {
        global $con;
        
          // Lấy thông tin từ đối tượng `Giamgia`
          $phanTramGiam = $this->tinhTiengiamgia->getPhanTramGiamGia(); // Lấy phần trăm giảm giá từ đối tượng `Giamgia`
          $ngayBatDau = $this->tinhTiengiamgia->getNgayBatDau();
          $ngayKetThuc = $this->tinhTiengiamgia->getNgayKetThuc();
          $soLuong = $this->tinhTiengiamgia->getSoLuongVeToiDa();
        
        $sql_insert_ve = mysqli_query($con,"INSERT INTO tbl_tiketdiscount(name,phanTramGiam,ngayBatDau,ngayKetThuc,soLuong) values ('$this->name','$phanTramGiam','$ngayBatDau','$ngayKetThuc','$soLuong')");
       
    }

    public static function update($id,$name,$phanTramGiam,$ngayBatDau,$ngayKetThuc,$soLuong) {
        global $con;
        $sql_update_ve = mysqli_query($con,"UPDATE tbl_tiketdiscount SET name = '$name',phanTramGiam = '$phanTramGiam',ngayBatDau = '$ngayBatDau',ngayKetThuc = '$ngayKetThuc',soLuong = '$soLuong' where id=$id");

    }

    public static function delete($id) {
        global $con;
        $sql_xoa_ve = mysqli_query($con,"DELETE FROM tbl_tiketdiscount WHERE id='$id'");

    }
    

    public static function getById($id) {
        global $con;
        $sql =  mysqli_query($con,"SELECT * FROM tbl_tiketdiscount WHERE id = '$id'");
      
    }


    //dùng vé giảm giá 
    public static function applyVoucher($idVoucher,$orderAmount) {
        global $con;
        
        // Lấy thông tin vé giảm giá
        $sql = mysqli_query($con, "SELECT * FROM tbl_tiketdiscount WHERE id = '$idVoucher'");
        $voucher = mysqli_fetch_array($sql);
        
        if (!$voucher) {
            return ['success' => false, 'message' => 'Vé giảm giá không tồn tại hoặc đã được sử dụng.'];
        }

        $tinhTienGiamGia = new Giamgia(
            $voucher['phanTramGiam'],
            $voucher['ngayBatDau'],
            $voucher['ngayKetThuc'],
            $voucher['soLuong']
        );
        
        
        if (!$tinhTienGiamGia->isValid()) {
            return ['isSuccess' => false, 'message' => 'Vé giảm giá không hợp lệ vào ngày hôm nay.','sotiengiam'=>0];
        }

        $soLuongVeHienTai = Tiketdiscount::getSoLuongHienTai($idVoucher);
        if($soLuongVeHienTai>0)
        {
            $sotiengiam = $tinhTienGiamGia->layGiamGia()*$orderAmount;
           

            return ['isSuccess' => true, 'sotiengiam' => $sotiengiam,'message'=>null];

        }else
        {
            return ['isSuccess' => false, 'sotiengiam'=>0, 'message' => "Hết vé"];
        }

    }
    
}
?>
