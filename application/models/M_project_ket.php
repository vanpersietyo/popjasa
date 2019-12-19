<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_project_ket
 *
 * @author root
 */
class M_project_ket extends CI_Model {

    const Ket_Email = "Ket_Email";
    const Email_Pengurus = "Email_Pengurus";
    const No_Telp = "No_Telp";
    const Ket_Luas = "Ket_Luas";
    const Ket_Bidang_Usaha = "Ket_Bidang_Usaha";
    const Ket_Bidang_Usaha_Utama = "Ket_Bidang_Usaha_Utama";
    const Ket_Informasi = "Ket_Informasi";
    const ID_Project_Ket = "ID_Project_Ket";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_By = "Created_By";
    const EntryTime = "EntryTime";
    const Modified_By = "Modified_By";
    const Last_Mofidified = "Last_Mofidified";
    const TABLE = "trs_projects_Ket";

    //for inisialisasi.
    public $Ket_Email;
    public $Email_Pengurus;
    public $No_Telp;
    public $Ket_Luas;
    public $Ket_Bidang_Usaha;
    public $Ket_Bidang_Usaha_Utama;
    public $Ket_Informasi;
    public $ID_Project_Ket;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_By;
    public $EntryTime;
    public $Modified_By;
    public $Last_Mofidified;
    var $table = 'trs_projects_Ket';
    var $primary_key = 'ID_Project';

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
