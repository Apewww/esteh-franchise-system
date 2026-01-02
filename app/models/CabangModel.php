<?php

class CabangModel extends Model
{
    // AMBIL SEMUA DATA
    public function getAll()
    {
        $sql = "SELECT * FROM cabang ORDER BY id_cabang ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // AMBIL DATA BY ID
    public function findById($id)
    {
        $sql = "SELECT * FROM cabang WHERE id_cabang = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // INSERT DATA
    public function insert($data)
    {
        $sql = "INSERT INTO cabang (nama_cabang, kota, no_telp, alamat_cabang, jenis_cabang)
                VALUES (:nama_cabang, :kota, :no_telp, :alamat_cabang, 'cabang')";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama_cabang'   => $data['nama_cabang'],
            'kota'          => $data['kota'],
            'no_telp'       => $data['no_telp'],
            'alamat_cabang' => $data['alamat_cabang']
        ]);
    }

    // UPDATE DATA
    public function update($id, $data)
    {
        $sql = "UPDATE cabang 
                SET nama_cabang = :nama_cabang,
                    kota = :kota,
                    no_telp = :no_telp,
                    alamat_cabang = :alamat_cabang
                WHERE id_cabang = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'            => $id,
            'nama_cabang'   => $data['nama_cabang'],
            'kota'          => $data['kota'],
            'no_telp'       => $data['no_telp'],
            'alamat_cabang' => $data['alamat_cabang']
        ]);
    }

    // DELETE DATA
    public function delete($id)
    {
        $sql = "DELETE FROM cabang WHERE id_cabang = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
