<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model{
    protected $table = 'tb_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['judul','pengarang','penerbit','tahun_terbit','sampul'];

    public function getBuku($idbuku=false){
        if($idbuku==false){
            return $this->findAll();
        }
        return $this->where(['id_buku'=>$idbuku])->first();
    }

    public function findBuku($cari){
        return $this->table('buku')->like('judul', $cari);
    }
}
?>