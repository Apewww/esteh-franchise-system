<?php

require_once __DIR__ . '/Model.php';

class UserModel extends Model
{
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
