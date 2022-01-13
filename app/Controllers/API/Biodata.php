<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\Biodata as ModelsBiodata;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Biodata extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new ModelsBiodata();

        return $this->respond([
            'data' => $model->findAll(),
        ]);
    }

    public function simpandata()
    {
        $model = new ModelsBiodata();
        
        if (!$model->save($this->request->getJSON(true))) {
            return $this->fail('Data gagal disimpan');
        }
        
        return $this->respond([
            'message' => 'Biodata telah di simpan'
        ]);
    }

    public function update($nik)
    {
        $model = new ModelsBiodata();
        $data = $this->request->getJSON('true');

        $data = [
            'nama' => $data['nama'],
            'hobi' => $data['hobi'],
            'alamat' => $data['alamat'],
        ];

        $model->where('nik', $nik)->set($data)->update();

        return $this->respond([
            'message' => 'Biodata telah di perbarui'
        ]);
    }

    public function hapus($nik)
    {
        $model = new ModelsBiodata();
        $model->where('nik', $nik)->delete();

        return $this->respond([
            'message' => 'Biodata telah di hapus'
        ]);
    }
}
