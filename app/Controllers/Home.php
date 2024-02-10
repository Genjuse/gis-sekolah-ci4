<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;


class Home extends BaseController
{
    protected $ModelSetting, $ModelAdmin, $ModelJenjang, $ModelWilayah, $ModelSekolah;
    public $detail_id_wilayah;
    public function __construct()
    {

        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
    }


    public function index()
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'sekolah' => $this->ModelSekolah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $dw = $this->ModelWilayah->DetailData($id_wilayah);
        $this->detail_id_wilayah = $id_wilayah; // Simpan id_wilayah di properti class

        $data = [
            'judul' => $dw['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
            'sekolah' => $this->ModelSekolah->AllDataPerWilayah($id_wilayah),
        ];

        return view('v_template_front_end', $data);
    }

    public function Jenjang()
    {
        $id_jenjang = intval($this->request->getPost('jenjang'));
        $id_wilayah = intval($this->request->getPost('id_wilayah_input'));
        // Menggunakan properti class untuk mendapatkan id_wilayah

        $dj = $this->ModelJenjang->DetailData($id_jenjang);


        // menampilkan jika tidak ada parameter wilayah
        if (empty($id_wilayah)) {
            $data = [
                'judul' => $dj['jenjang'],
                'page' => 'v_sekolah_per_jenjang',
                'web' => $this->ModelSetting->DataWeb(),
                'wilayah' => $this->ModelWilayah->AllData(),
                'jenjang' => $this->ModelJenjang->AllData(),
                'sekolah' => $this->ModelSekolah->AllDataPerJenjang($id_jenjang),

            ];
            // return view('v_sekolah_per_jenjang', $data);
            dd($data);
        } else {
            // menampilkan jika ada parameter wilayah dan jenjang
            $data = [
                'judul' => $dj['jenjang'],
                'page' => 'v_sekolah_per_jenjang',
                'web' => $this->ModelSetting->DataWeb(),
                'wilayah' => $this->ModelWilayah->AllData(),
                'jenjang' => $this->ModelJenjang->AllData(),
                'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
                'sekolah' => $this->ModelSekolah->getCertainSchools($id_jenjang, $id_wilayah),

            ];
            // dd($data);
            // return view('v_template_front_end', $data);
        }
    }
    public function DetailSekolah($id_sekolah)
    {
        $sekolah = $this->ModelSekolah->DetailData($id_sekolah);
        $data = [
            'judul' => $sekolah['nama_sekolah'],
            'page' => 'v_detail_sekolah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'sekolah' => $sekolah,

        ];
        return view('v_template_front_end', $data);
    }
}
