<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    public function AllData()
    {
        if (session()->get('npsn') != null && session()->get('privilege') != 'superadmin') {
            return $this->db->table('tbl_sekolah')
                ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
                ->where('npsn', session()->get('npsn'))
                ->get()->getResultArray();
        }
        return $this->db->table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->get()->getResultArray();
    }

    // wilayah dan sekolah



    public function AllDataPerWilayah($id_wilayah)
    {
        return $this->db->table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->where('id_wilayah', $id_wilayah)
            ->get()->getResultArray();
    }

    public function AllDataPerJenjang($id_jenjang)
    {
        return $this->db->table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->where('tbl_sekolah.id_jenjang', $id_jenjang)
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_sekolah')->insert($data);
    }

    public function DetailData($id_sekolah)
    {
        return $this->db->table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_sekolah.id_provinsi', 'left')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_sekolah.id_kabupaten', 'left')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_sekolah.id_kecamatan', 'left')
            ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_sekolah.id_wilayah', 'left')
            ->where('id_sekolah', $id_sekolah)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->delete($data);
    }

    //provinsi
    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }

    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()->getResultArray();
    }

    public function allKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()->getResultArray();
    }

    // mencari jenjang sekolah dan
    public function getCertainSchools($id_jenjang, $id_wilayah)
    {


        return $this->db->query(
            "SELECT *
        FROM tbl_sekolah
        JOIN tbl_wilayah ON tbl_wilayah.id_wilayah = tbl_sekolah.id_wilayah
        JOIN tbl_jenjang ON tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang
        WHERE tbl_sekolah.id_jenjang = ? AND tbl_sekolah.id_wilayah = ?",
            array($id_jenjang, $id_wilayah)
        )->getResultArray();
    }
}
