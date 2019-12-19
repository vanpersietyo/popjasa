<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_project_izin
 *
 * @author root
 */
class M_project_izin extends CI_Model {

    //Models
    const Bool_Izin_Akta_Notaris = "Bool_Izin_Akta_Notaris";
    const Izin_Akta_Notaris = "Izin_Akta_Notaris";
    const Bool_Izin_Pengesahan = "Bool_Izin_Pengesahan";
    const Izin_Pengesahan = "Izin_Pengesahan";
    const Bool_NPWP = "Bool_NPWP";
    const Bool_NPWP_Perusahaan = "Bool_NPWP_Perusahaan";
    const Bool_SKT_Perusahaan = "Bool_SKT_Perusahaan";
    const Bool_SIUP_TDP = "Bool_SIUP_TDP";
    const Bool_Registrasi = "Bool_Registrasi";
    const Bool_PKP = "Bool_PKP";
    const Bool_SK_Domisili = "Bool_SK_Domisili";
    const Izin_Lain = "Izin_Lain";
    const ID_Project_JNS = "ID_Project_JNS";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const TABLE = "trs_projects_izin";

//for inisialisasi.
    public $Bool_Izin_Akta_Notaris;
    public $Izin_Akta_Notaris;
    public $Bool_Izin_Pengesahan;
    public $Izin_Pengesahan;
    public $Bool_NPWP;
    public $Bool_NPWP_Perusahaan;
    public $Bool_SKT_Perusahaan;
    public $Bool_SIUP_TDP;
    public $Bool_Registrasi;
    public $Bool_PKP;
    public $Bool_SK_Domisili;
    public $Izin_Lain;
    public $ID_Project_JNS;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;
    var $table = 'trs_projects_izin';
    var $primary_key = 'ID_Project_JNS';

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
