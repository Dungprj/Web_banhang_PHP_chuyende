<?php

abstract class TinhTienGiamGia {
    protected $phanTramCanGiam;
    protected $ngayBatDau;
    protected $ngayKetThuc;
    protected $soLuongVeToiDa; // Thuộc tính số lượng vé tối đa, có thể NULL

    public function __construct($phanTramCanGiam, $ngayBatDau, $ngayKetThuc, $soLuongVeToiDa = null) {
        $this->phanTramCanGiam = $phanTramCanGiam;
        $this->ngayBatDau = $ngayBatDau;
        $this->ngayKetThuc = $ngayKetThuc;
        $this->soLuongVeToiDa = $soLuongVeToiDa;
    }



    public function getNgayBatDau() {
        return $this->ngayBatDau;
    }

    public function getNgayKetThuc() {
        return $this->ngayKetThuc;
    }

    public function getPhanTramGiamGia() {
        return $this->phanTramCanGiam;
    }

    public function getSoLuongVeToiDa() {
        return $this->soLuongVeToiDa;
    }

    public function setSoLuongVeToiDa($soLuongVeToiDa) {
        $this->soLuongVeToiDa = $soLuongVeToiDa;
    }

    public abstract function layGiamGia();
    public abstract function getNamePhanTramGiamGia();
}
?>
