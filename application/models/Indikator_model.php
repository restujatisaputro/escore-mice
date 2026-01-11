<?php
/************************************************************/
/* File        : Indikator_model.php                        */
/* Lokasi File : ./application/models/Indikator_model.php   */
/* Copyright   : CV Adiva                                   */
/* Publish     : Green                                      */
/*----------------------------------------------------------*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Indikator_model
class Indikator_model extends CI_Model
{
	// Property yang bersifat public
    public $table = 'tb_indikator';
    public $id = 'id_indikator';
    public $order = 'DESC';
	
	// Konstrutor 
    function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama indikator	
    function json() {
        $this->datatables->select('id_indikator,no_indikator,indikator,kelompok,inputer');
        $this->datatables->from('tb_indikator');        
        $this->datatables->add_column('action', anchor(site_url('indikator/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('indikator/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_indikator');
        return $this->datatables->generate();
    }
	
    // Menampilkan semua data 
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // menampilkan jumlah data
    function total_rows($q = NULL) {
        $this->db->like('id_indikator', $q);
		$this->db->or_like('no_indikator', $q);
		$this->db->or_like('indikator', $q);
		$this->db->or_like('kelompok', $q);
		$this->db->or_like('inputer', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_indikator', $q);
		$this->db->or_like('no_indikator', $q);
		$this->db->or_like('indikator', $q);
		$this->db->or_like('kelompok', $q);
		$this->db->or_like('inputer', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Menambahkan data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // Menghapus data kedalam database
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Indikator_model.php */
/* Location: ./application/models/Indikator_model.php */
/* Please DO NOT modify this information : */