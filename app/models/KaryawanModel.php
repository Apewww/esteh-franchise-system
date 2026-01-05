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

    // ambil 1 karyawan (untuk edit)
    public function getById($id) {
        $sql = "SELECT * FROM karyawan WHERE id_karyawan = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // tambah karyawan
    public function insert($data) {
        $sql = "INSERT INTO karyawan (nama_karyawan, jabatan, id_cabang)
                VALUES (:nama_karyawan, :jabatan, :id_cabang)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':nama_karyawan' => $data['nama_karyawan'],
            ':jabatan'       => $data['jabatan'],
            ':id_cabang'     => $data['id_cabang']
        ]);
    }


    // update karyawan
    public function update($id, $data) {
    $sql = "UPDATE karyawan 
            SET nama_karyawan = :nama,
                jabatan = :jabatan,
                id_cabang = :cabang
            WHERE id_karyawan = :id";
            
    $stmt = $this->db->prepare($sql);
    
    // Kembalikan hasil eksekusi (true jika berhasil, false jika gagal)
    return $stmt->execute([
        ':nama'    => $data['nama_karyawan'],
        ':jabatan' => $data['jabatan'],
        ':cabang'  => $data['id_cabang'],
        ':id'      => $id
    ]);
}

    public function delete($id) {
    $sql = "DELETE FROM karyawan WHERE id_karyawan = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }
}