<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_project_terima
 *
 * @author root
 */
class M_project_terima extends CI_Model {

    //Models
    const bool_ktp_fotokopi = "bool_ktp_fotokopi";
    const bool_ktp_asli = "bool_ktp_asli";
    const bool_npwp_fotokopi = "bool_npwp_fotokopi";
    const bool_npwp_asli = "bool_npwp_asli";
    const bool_sertifikat_fotokopi = "bool_sertifikat_fotokopi";
    const bool_sertifikat_asli = "bool_sertifikat_asli";
    const bool_imb_fotokopi = "bool_imb_fotokopi";
    const bool_imb_asli = "bool_imb_asli";
    const bool_stempel = "bool_stempel";
    const jml_materai = "jml_materai";
    const bool_sk_domisili_fotokopi = "bool_sk_domisili_fotokopi";
    const bool_sk_domisili_asli = "bool_sk_domisili_asli";
    const bool_surat_sewa_fotokopi = "bool_surat_sewa_fotokopi";
    const bool_surat_sewa_asli = "bool_surat_sewa_asli";
    const ID_Project_terima = "ID_Project_terima";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const TABLE = "trs_project_terima";

//for inisialisasi.
    public $bool_ktp_fotokopi;
    public $bool_ktp_asli;
    public $bool_npwp_fotokopi;
    public $bool_npwp_asli;
    public $bool_sertifikat_fotokopi;
    public $bool_sertifikat_asli;
    public $bool_imb_fotokopi;
    public $bool_imb_asli;
    public $bool_stempel;
    public $jml_materai;
    public $bool_sk_domisili_fotokopi;
    public $bool_sk_domisili_asli;
    public $bool_surat_sewa_fotokopi;
    public $bool_surat_sewa_asli;
    public $ID_Project_terima;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;
    var $table = 'trs_project_terima';
    var $primary_key = 'ID_Project_terima';

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
