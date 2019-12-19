<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_project_uraian
 *
 * @author root
 */
class M_project_uraian extends CI_Model {

    //Models
    const nm_perusahaan = "nm_perusahaan";
    const modal = "modal";
    const presentase_shm = "presentase_shm";
    const hrg_saham = "hrg_saham";
    const No_Telp = "No_Telp";
    const No_Fax = "No_Fax";
    const alamat = "alamat";
    const kota = "kota";
    const kelurahan = "kelurahan";
    const kabupaten = "kabupaten";
    const izin_persetujuan = "izin_persetujuan";
    const signature_commander = "signature_commander";
    const penerima = "penerima";
    const ID_Project_Uraian = "ID_Project_Uraian";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const TABLE = "trs_project_uraian";

//for inisialisasi.
    public $nm_perusahaan;
    public $modal;
    public $presentase_shm;
    public $hrg_saham;
    public $No_Telp;
    public $No_Fax;
    public $alamat;
    public $kota;
    public $kelurahan;
    public $kabupaten;
    public $izin_persetujuan;
    public $signature_commander;
    public $penerima;
    public $ID_Project_Uraian;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;
    var $table = 'trs_project_uraian';
    var $primary_key = 'ID_Project_Uraian';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project
     */
    public function find_first($where = null, $order = []) {
        //cek order
        if ($order) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        $result = $data->num_rows();
        return empty($result) ? FALSE : $data->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project
     */
    public function find($where = null, $order = []) {
        //cek order
        if ($order) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);

        $result = $data->num_rows();
        //return
        return empty($result) ? FALSE : $data->result();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

}
