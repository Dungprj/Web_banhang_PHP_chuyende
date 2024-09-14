<?php
include "TinhTienGiamGia.php";

class Giamgia extends TinhTienGiamGia {

    public function __construct($phanTramCanGiam, $ngayBatDau, $ngayKetThuc,$soLuongVeToiDa = null) {
        parent::__construct($phanTramCanGiam, $ngayBatDau, $ngayKetThuc,$soLuongVeToiDa);
    }

    public function layGiamGia() {
        return $this->phanTramCanGiam / 100;
    }

    public function getNamePhanTramGiamGia() {
        return strval($this->phanTramCanGiam);
    }

    public function isValid() {
        $now = new DateTime();
        return $now >= new DateTime($this->ngayBatDau) && $now <= new DateTime($this->ngayKetThuc);
    }
}
?>
