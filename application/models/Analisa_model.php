<?php
/***********************************************************/
/* File        : Analisa_model.php                         */
/* Lokasi File : ./application/models/Analisa_model.php    */
/* Copyright   : CV Adiva                                  */
/* Publish     : Green                                     */
/*---------------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Analisa_model
class Analisa_model extends CI_Model
{
	// Property yang bersifat public   
    public $table = 'tb_analisakeyword';
    public $id = 'id_analisa';
    public $order = 'DESC';
    
	// Konstrutor    
    function __construct()
    {
        parent::__construct();
    }
	
	// Tabel data dengan nama analisa
    function json() {		
        $this->datatables->select("id_analisa, id_website, alamat_website, id_indikator, indikator, nilai_indikator, kelompok, inputer, photo ");
        $this->datatables->from('tb_analisakeyword');        
        $this->datatables->add_column('action', anchor(site_url('analisa/read/$1'),'<button type="button" class="btn btn-primary"><i class="fa fa-file-o" aria-hidden="true"></i></button>')."  ".anchor(site_url('analisa/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('analisa/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_analisa');
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
        $this->db->like('id_analisa', $q);
		$this->db->or_like('id_analisa', $q);
		$this->db->or_like('id_website', $q);
		$this->db->or_like('alamat_website', $q);
		$this->db->or_like('id_indikator', $q);
		$this->db->or_like('indikator', $q);
		$this->db->or_like('nilai_indikator', $q);
		$this->db->or_like('kelompok', $q);
		$this->db->or_like('inputer', $q);
		$this->db->or_like('photo', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_analisa', $q);
		$this->db->or_like('id_analisa', $q);
		$this->db->or_like('id_website', $q);
		$this->db->or_like('alamat_website', $q);
		$this->db->or_like('id_indikator', $q);
		$this->db->or_like('indikator', $q);
		$this->db->or_like('nilai_indikator', $q);
		$this->db->or_like('kelompok', $q);
		$this->db->or_like('inputer', $q);
		$this->db->or_like('photo', $q);
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

/* End of file Analisa_model.php */
/* Location: ./application/models/Analisa_model.php */
/* Please DO NOT modify this information : */