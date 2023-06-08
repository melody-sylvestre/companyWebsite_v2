<?php

namespace App\Models;
use PDO;

class BannerImageModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;    
    }

    public function getAllImages(): array
    {
        $query = $this->db->prepare("SELECT * FROM BannerImages");
        $query->execute();
        return $query->fetchAll();
    }
}