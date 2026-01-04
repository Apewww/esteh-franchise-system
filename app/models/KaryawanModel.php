<?php

require_once __DIR__ . '/Model.php';

class KaryawanModel extends Model {

    public function getKaryawanByCabang($id_cabang) {
        $sql = "SELECT * FROM karyawan WHERE id_cabang = :id_cabang";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_cabang', $id_cabang, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
