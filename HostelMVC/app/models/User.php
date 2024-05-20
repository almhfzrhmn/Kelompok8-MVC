<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public function findUser($emailreg, $password)
    {
        $stmt = $this->db->prepare("SELECT email, password, id FROM userregistration WHERE (email=? || regNo=?) and password=?");
        $stmt->execute([$emailreg, $emailreg, $password]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function logUser($uid, $uemail, $ip, $city, $country)
    {
        $stmt = $this->db->prepare("INSERT INTO userLog (userId, userEmail, userIp, city, country) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$uid, $uemail, $ip, $city, $country]);
    }
}
