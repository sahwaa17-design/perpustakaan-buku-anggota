<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $AnggotaModel;

    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $current = $this->request->getVar('page_anggota')? $this->request->getVar('page_anggota'):1;
        $cari=$this->request->getVar('cari');
        if($cari){
            $anggota= $this->AnggotaModel->findAnggota($cari);
        }else{
            $anggota = $this->AnggotaModel;
        }
        $data = [
            'title' => 'Daftar Anggota',
            'anggota' => $this->AnggotaModel->paginate(2, 'anggota'),
            'pager' => $this->AnggotaModel->pager,
            'current' => $current
        ];

        return view('anggota/index', $data);
    }

    public function detail($idanggota)
    {
        $data = [
            'title' => 'Detail Anggota',
            'anggota' => $this->AnggotaModel->getAnggota($idanggota)
        ];

        return view('anggota/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Anggota',
            'validation' => \Config\Services::validation()
        ];

        return view('anggota/tambah', $data);
    }

    public function simpan()
    {
        //validasi
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'telepon' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ]
               
            ]
        )) {
           
            // kirim kembali ke form + input lama + pesan error
            return redirect()->to('/anggota/tambah')->withInput();
        }

        // $filesampul = $this->request->getFile('sampul');
        // $filesampul->move('img');
        // $nmsampul = $filesampul->getName();

        // simpan
        $this->AnggotaModel->save([
            'nama'        => $this->request->getVar('nama'),
            'alamat'    => $this->request->getVar('alamat'),
            'telepon'     => $this->request->getVar('telepon'),
        ]);


        session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('/anggota');
    }

    public function hapus($idanggota)
    {
        $this->AnggotaModel->delete($idanggota);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/anggota');
    }

    public function ubah($idanggota)
    {
        $data = [
            'title'      => 'Form Ubah Data Anggota',
            'validation' => \Config\Services::validation(),
            'anggota'       => $this->AnggotaModel->getAnggota($idanggota)
        ];

        return view('anggota/ubah', $data);
    }


  public function update($idanggota)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],
            'telepon' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ]
        ])) {
            return redirect()->to('/anggota/ubah/' . $idanggota)->withInput();
            return alert('Data Gagal di update');
        }

        // cek gambar
        // $filesampul = $this->request->getFile('sampul');

        // if ($filesampul->getError() == 4) {
        //     // tidak upload baru -> pakai sampul lama
        //     $nmsampul = $this->request->getVar('sampulLama');
        // } else {
        //     // upload baru
        //     $nmsampul = $filesampul->getName();
        //     $filesampul->move('img', $nmsampul);
        // }

        // dd($idbuku);

        // simpan perubahan
        $this->AnggotaModel->save([
            'id_anggota'      => $idanggota,
            'nama'        => $this->request->getVar('nama'),
            'alamat'    => $this->request->getVar('alamat'),
            'telepon'     => $this->request->getVar('telepon')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/anggota');
    }
}
?>