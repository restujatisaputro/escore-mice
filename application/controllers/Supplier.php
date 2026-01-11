<?php
/**********************************************************/
/* File        : Supplier.php                             */
/* Lokasi File : ./application/controllers/Supplier.php   */
/* Copyright   : CV Adiva                                 */
/* Publish     : Dinkes Kabupaten Indragiri Hilir         */
/*--------------------------------------------------------*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Supplier
class Supplier extends CI_Controller
{
	// Konstrutor 
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model'); // Memanggil Supplier_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library        
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman utama supplier
    public function index()
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'wa'       => 'SIMO',
			'univ'     => 'Dinkes Kabupaten Indragiri Hilir',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
		$this->load->view('header_list',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('supplier/supplier_list'); // Menampilkan halaman utama supplier
		$this->load->view('footer_list'); // Menampilkan bagian footer		 
    } 
    
	// Fungsi JSON
    public function json() {
        header('Content-Type: application/json');
        echo $this->Supplier_model->json(); // Menampilkan data json yang terdapat pada Supplier_model
    }
	
	// Fungsi menampilkan form Create Supplier
    public function create() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'SIMO',
			'univ'     => 'Dinkes Kabupaten Indragiri Hilir',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);	
		
		// Menampung data yang diinputkan 
        $data = array(
            'button' => 'Create',
			'back'   => site_url('supplier'),
            'action' => site_url('supplier/create_action'),
			'id_supplier' => set_value('id_supplier'),
			'nama_supplier' => set_value('nama_supplier'),
			'alamat_supplier' => set_value('alamat_supplier'),
			'no_handphone' => set_value('no_handphone'),
			'email' => set_value('email'),
			'kontak_person' => set_value('kontak_person'),
		);
		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('supplier/supplier_form', $data); // Menampilkan form supplier
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form supplier belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form supplier telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
				'id_supplier' => $this->input->post('id_supplier',TRUE),
				'nama_supplier' => $this->input->post('nama_supplier',TRUE),
				'alamat_supplier' => $this->input->post('alamat_supplier',TRUE),
				'no_handphone' => $this->input->post('no_handphone',TRUE),
				'email' => $this->input->post('email',TRUE),
				'kontak_person' => $this->input->post('kontak_person',TRUE),
			);

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }
    
	// Fungsi menampilkan form Update Supplier
    public function update($id) 
    {	
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
				'wa'       => 'SIMO',
				'univ'     => 'Dinkes Kabupaten Indragiri Hilir',
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampilkan data berdasarkan id-nya yaitu supplier
        $row = $this->Supplier_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data supplier ditampilkan ke form edit supplier
        if ($row) {
			
            $data = array(
                'button' => 'Update',
				'back'   => site_url('supplier'),
                'action' => site_url('supplier/update_action'),
				'id_supplier' => set_value('id_supplier', $row->id_supplier), 
				'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
				'alamat_supplier' => set_value('alamat_supplier', $row->alamat_supplier),
				'no_handphone' => set_value('no_handphone', $row->no_handphone),
				'email' => set_value('email', $row->email),
				'kontak_person' => set_value('kontak_person', $row->kontak_person),
			);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('supplier/supplier_form', $data); // Menampilkan form supplier 
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form supplier belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } 
		// Jika form supplier telah diisi dengan benar 
		// maka sistem akan melakukan update data supplier kedalam database
		else {			
		    $data = array(
				'id_supplier' => $this->input->post('id_supplier',TRUE),
				'nama_supplier' => $this->input->post('nama_supplier',TRUE),
				'alamat_supplier' => $this->input->post('alamat_supplier',TRUE),
				'no_handphone' => $this->input->post('no_handphone',TRUE),
				'email' => $this->input->post('email',TRUE),
				'kontak_person' => $this->input->post('kontak_person',TRUE),
			);

            $this->Supplier_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id) 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $row = $this->Supplier_model->get_by_id($id);
		
		//jika id supplier yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } 
		//jika id supplier yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_supplier', 'kode supplier', 'trim|required');
	$this->form_validation->set_rules('alamat_supplier', 'nama supplier', 'trim|required');

	$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
/* Please DO NOT modify this information : */
?>