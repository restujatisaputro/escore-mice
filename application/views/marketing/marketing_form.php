<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Safina Tour & Travel                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        SAFINA
        <small>Tour & Travel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Marketing</a></li>
        <li class="active"><?php echo $button ?> Marketing</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		    <?php
				$koneksi = mysqli_connect('localhost','u197914754_safinatour','Andri13021980','u197914754_safinatour');
	            $data_marketing = mysqli_query($koneksi,"SELECT * FROM tb_marketing ");
	            $jlh_marketing = mysqli_num_rows($data_marketing);
	            
	            $rand = $jlh_marketing + 1;
					                

			    if($id_marketing==''){
			        $id_marketing2 = "LM".$rand ;
			    }
			    else{
			        $id_marketing2 = $id_marketing ;
			    }
			?>			
		    
			<!-- Form input dan edit Marketing-->
			<legend><?php echo $button ?> Marketing</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Marketing</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="id_marketing" id="id_marketing" value="<?php echo $id_marketing2; ?>" readonly/>
						<?php echo form_error('id_marketing') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">No. NIK/KTP</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="ktp" id="ktp" placeholder="Nomor NIK / KTP" value="<?php echo $ktp; ?>" />
						<?php echo form_error('ktp') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Lengkap</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
						<?php echo form_error('nama_lengkap') ?>
					</div>
				</div>
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Jenis Kelamin </label>
					<div class="col-sm-4">
						<?php 
							$pil_jeniskelamin= array("" => "-- Pilihan --",
													"Laki-laki" => "Laki-laki", 
													"Perempuan"=>"Perempuan");
							echo form_dropdown('jenis_kelamin', $pil_jeniskelamin, $jenis_kelamin, 'class="form-control" id="jenis_kelamin"'); 
							echo form_error('jenis_kelamin') 
						?>   
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
						<?php echo form_error('tempat_lahir') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
						<?php echo form_error('tanggal_lahir') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Handphone</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
						<?php echo form_error('no_handphone') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Whatsapp</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="no_whatsapp" id="no_whatsapp" placeholder="Nomor Whatsapp" value="<?php echo $no_whatsapp; ?>" />
						<?php echo form_error('no_whatsapp') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Email</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
						<?php echo form_error('email') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Alamat</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat ; ?>" />
						<?php echo form_error('alamat') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kelurahan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
						<?php echo form_error('kelurahan') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kecamatan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
						<?php echo form_error('kecamatan') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kabupaten</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
						<?php echo form_error('kabupaten') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Propinsi</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Propinsi" value="<?php echo $propinsi; ?>" />
						<?php echo form_error('propinsi') ?>
					</div>
				</div>
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Status </label>
					<div class="col-sm-4">
						<?php 
							$pil_status= array("" => "-- Pilihan --",
													"Aktif" => "Aktif", 
													"Tidak Aktif"=>"Tidak Aktif");
							echo form_dropdown('status', $pil_status, $status, 'class="form-control" id="status"'); 
							echo form_error('status') 
						?>   
					</div>
				</div>
				<div class="form-group"> 
					<label class="col-sm-2" for="varchar">Cabang </label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT * FROM tb_cabang ORDER BY nama_cabang ASC');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_cabang] = $dropdown->nama_cabang;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_cabang',$finalDropDown , $id_cabang, 
								    'class="form-control" id="id_cabang"'); 	
							  echo form_error('id_cabang') 
						  ?> 
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer" placeholder="Username" value="<?php echo $username; ?>" />
						
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $photo; ?>" width='300px'>
									</div><br />
							<?php
								}
							?>
							<input type="file" name="photo" id="photo">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('marketing') ?>" class="btn btn-default">Cancel</a>
				</form>  