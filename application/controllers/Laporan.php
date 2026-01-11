<?php 
/***********************************************************/
/* File        : Laporan.php                               */
/* Lokasi File : ./application/controllers/Laporan.php     */
/* Copyright   : CV Adiva                                  */
/* Publish     : Green                                     */
/*---------------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Laporan
class Laporan extends CI_Controller
{
     // Konstruktor			
	function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model'); // Memanggil Mahasiswa_model yang terdapat pada models
		$this->load->model('Indikator_model'); // Memanggil Mahasiswa_model yang terdapat pada models
		$this->load->model('Website_model'); // Memanggil Mahasiswa_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman laporan
    public function index(){   
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		
		$this->load->view('header_list', $dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('laporan/laporan_list'); // Menampilkan halaman utama laporan
		$this->load->view('footer_list'); // Menampilkan bagian footer
    }
	
	// Fungsi JSON
	public function json() {
        header('Content-Type: application/json');
        echo $this->Laporan_model->json();
    }
	
	// Fungsi untuk menampilkan halaman laporan secara detail
    public function read($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		
		// Menampilkan data mita yang ada di database berdasarkan id-nya yaitu id_analisa
        $row = $this->Laporan_model->get_by_id($id);
		
		// Jika data laporan tersedia maka akan ditampilkan
        if ($row) {
            $data = array(
				'button' => 'Read',
				'back'   => site_url('laporan'),
				'id_analisa' => $row->id_analisa,
				'id_website' => $row->id_website,
				'alamat_website' => $row->alamat_website,
				'id_indikator' => $row->id_indikator,
				'indikator' => $row->indikator,
				'nilai_indikator' => $row->nilai_indikator,
				'kelompok' => $row->kelompok,
				'inputer' => $row->inputer,
				'photo' => $row->photo,
			);
            $this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('laporan/laporan_read', $data); // Menampilkan halaman detail laporan
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika data laporan tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
            $this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
            redirect(site_url('laporan'));
        }
    }
	
	// Fungsi menampilkan form Create Laporan
    public function create(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
	  
	  // Menampung data yang diinputkan
      $data = array(
        'button' => 'Create',
		'back'   => site_url('laporan'),
        'action' => site_url('laporan/create_action'),
	    'id_analisa' => set_value('id_analisa'),
	    'id_website' => set_value('id_website'),
	    'alamat_website' => set_value('alamat_website'),
	    'id_indikator' => set_value('id_indikator'),
	    'indikator' => set_value('indikator'),
	    'nilai_indikator' => set_value('nilai_indikator'),
	    'kelompok' => set_value('kelompok'),
	    'inputer' => set_value('inputer'),
		'photo' => set_value('photo'),
	  );
        $this->load->view('header',$dataAdm ); // Menampilkan bagian header dan object data users 	 
        $this->load->view('laporan/laporan_form', $data); // Menampilkan halaman form laporan
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form mahasiswa belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form mahasiswa telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {	
			// konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder image
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_analisa')); //nama file photo dirubah menjadi nama berdasarkan nim	
			$this->upload->initialize($config);
			
			// Jika file photo ada 
			if(!empty($_FILES['photo']['name'])){
				
				if ($this->upload->do_upload('photo')){
					$photo = $this->upload->data();	
					$dataphoto = $photo['file_name'];					
					$this->load->library('upload', $config);		    
					
					$data = array(
					    'id_analisa' => $this->input->post('id_analisa',TRUE),
						'id_website' => $this->input->post('id_website',TRUE),
						'alamat_website' => $this->input->post('alamat_website',TRUE),
						'id_indikator' => $this->input->post('id_indikator',TRUE),
						'indikator' => $this->input->post('indikator',TRUE),
						'nilai_indikator' => $this->input->post('nilai_indikator',TRUE),
						'kelompok' => $this->input->post('kelompok',TRUE),
						'inputer' => $this->input->post('inputer',TRUE),
						'photo' => $dataphoto, 
					); 
					
					$this->Laporan_model->insert($data);
				}
				
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('laporan'));			
			}
			// Jika file photo kosong 
			else{		
			
				$data = array(
					'id_analisa' => $this->input->post('id_analisa',TRUE),
					'id_website' => $this->input->post('id_website',TRUE),
					'alamat_website' => $this->input->post('alamat_website',TRUE),
						'id_indikator' => $this->input->post('id_indikator',TRUE),
						'indikator' => $this->input->post('indikator',TRUE),
						'nilai_indikator' => $this->input->post('nilai_indikator',TRUE),
						'kelompok' => $this->input->post('kelompok',TRUE),
						'inputer' => $this->input->post('inputer',TRUE),
				);            
				
				$this->Laporan_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('laporan'));	
			}
					
        }
    }
    
	// Fungsi menampilkan form Update Laporan
    public function update($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Green',
			'univ'     => 'Automated Checklist',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		
		// Menampilkan data berdasarkan id-nya yaitu id_analisa
        $row = $this->Laporan_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data mahasiswa ditampilkan ke form edit laporan
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('laporan'),
                'action' => site_url('laporan/update_action'),
				'id_analisa' => set_value('id_analisa', $row->id_analisa),
				'id_website' => set_value('id_website', $row->id_website),
				'alamat_website' => set_value('alamat_website', $row->alamat_website),
				'id_indikator' => set_value('id_indikator', $row->id_indikator),
				'indikator' => set_value('indikator', $row->indikator),
				'nilai_indikator' => set_value('nilai_indikator', $row->nilai_indikator),
				'kelompok' => set_value('kelompok', $row->kelompok),
				'inputer' => set_value('inputer', $row->inputer),
				'photo' => set_value('photo', $row->photo),
			);
		    $this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('laporan/laporan_form', $data); // Menampilkan form laporan
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 			
		
		// Jika form laporan belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_analisa', TRUE));
        } 
		// Jika form laporan telah diisi dengan benar 
		// maka sistem akan melakukan update data mahasiswa kedalam database
		else{	
			// Konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_analisa')); //nama file photo dirubah menjadi nama berdasarkan id_website
			$this->upload->initialize($config);
			
			// Jika file photo ada 
			if(!empty($_FILES['photo']['name'])){	
			
				// Menghapus file image lama
				unlink("./images/".$this->input->post('photo'));	
				
				// Upload file image baru
				if ($this->upload->do_upload('photo')){
					$photo = $this->upload->data();	
					$dataphoto = $photo['file_name'];					
					$this->load->library('upload', $config);
					
					// Menampung data yang diinputkan
					$data = array(
					    'id_analisa' => $this->input->post('id_analisa',TRUE),
						'id_website' => $this->input->post('id_website',TRUE),
						'alamat_website' => $this->input->post('alamat_website',TRUE),
						'id_indikator' => $this->input->post('id_indikator',TRUE),
						'indikator' => $this->input->post('indikator',TRUE),
						'nilai_indikator' => $this->input->post('nilai_indikator',TRUE),
						'kelompok' => $this->input->post('kelompok',TRUE),
						'inputer' => $this->input->post('inputer',TRUE),
						'photo' => $dataphoto, 
					); 
					
					$this->Laporan_model->update($this->input->post('id_analisa', TRUE), $data);
				}
				
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('laporan'));			
			}
			// Jika file photo kosong 
			else{		
				// Menampung data yang diinputkan
				$data = array(
					'id_analisa' => $this->input->post('id_analisa',TRUE),
					'id_website' => $this->input->post('id_website',TRUE),
					'alamat_website' => $this->input->post('alamat_website',TRUE),
						'id_indikator' => $this->input->post('id_indikator',TRUE),
						'indikator' => $this->input->post('indikator',TRUE),
						'nilai_indikator' => $this->input->post('nilai_indikator',TRUE),
						'kelompok' => $this->input->post('kelompok',TRUE),
						'inputer' => $this->input->post('inputer',TRUE),
				);            
				
				$this->Laporan_model->update($this->input->post('id_analisa', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('laporan'));	
			}
			
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Laporan_model->get_by_id($id);
		
		//jika id nim yang dipilih tersedia maka akan dihapus
        if ($row) {
			// menghapus data berdasarkan id-nya yaitu nim
			if($this->Laporan_model->delete('tb_laporan',array('id_analisa'->$id))){
				
				// menampilkan informasi 'Delete Record Success' setelah data mahasiswa dihapus 
				$this->session->set_flashdata('message', 'Delete Record Success');
				
				// menghapus file photo
				unlink("./images/".$row->photo);
			}
			// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
			else{
			
				$this->session->set_flashdata('message', 'Can not Delete This Record !');	
			}
            redirect(site_url('laporan'));				
			
        } 
		//jika id laporan yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	
	$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim|required');
	$this->form_validation->set_rules('nilai_indikator', 'nilai_indikator', 'trim|required');
	
	$this->form_validation->set_rules('id_analisa', 'id_analisa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
/* Please DO NOT modify this information : */