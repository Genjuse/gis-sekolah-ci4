<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenjang;

class Jenjang extends BaseController
{
  protected  $ModelJenjang;
    public function __construct()
    {
        $this->ModelJenjang = new ModelJenjang();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jenjang',
            'menu'  => 'jenjang', //variabel menu aktiv
            'page' => 'v_jenjang',
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_jenjang)
    {
        $marker = $this->request->getFile('marker');
        $name_file = $marker->getRandomName();
        $data = [
            'id_jenjang' => $id_jenjang,
            'marker' => $name_file,
        ];
        $marker->move('marker', $name_file);
        $this->ModelJenjang->UpdateData($data);
        session()->setFlashdata('update', 'Marker Berhasil Diupdate !!');
        return redirect()->to('Jenjang');
    }
}
