<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model{
    protected $table = 'tb_anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['nama','alamat','telepon'];

    public function getAnggota($idanggota=false){
        if($idanggota==false){
            return $this->findAll();
        }
        return $this->where(['id_anggota'=>$idanggota])->first();
    }

    public function findAnggota($cari){
        return $this->table('tb_anggota')->like('nama', $cari);
    }
}
?>