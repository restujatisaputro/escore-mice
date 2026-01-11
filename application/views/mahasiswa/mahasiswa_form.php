<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Ujek                                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>ojek online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Driver Ojek</a></li>
        <li class="active"><?php echo $button ?> Driver Ojek</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Driverojek-->
			<legend><?php echo $button ?> Driver Ojek</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="char">NIK</label>
					<div class="col-sm-4">
						<input type="text"   class="form-control" name="nim" id="nim" placeholder="NIK" value="<?php echo $nim; ?>" />
						<?php echo form_error('nim'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Lengkap</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
						<?php echo form_error('nama_lengkap') ?>
					</div>
				</div>	
						
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Panggilan </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $nama_panggilan; ?>" />
						<?php echo form_error('nama_panggilan') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Alamat </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
						<?php echo form_error('alamat') ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Email </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
						<?php echo form_error('email') ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Handphone </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Handphone" value="<?php echo $telp; ?>" />
						<?php echo form_error('telp') ?>
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Tempat Lahir </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
						<?php echo form_error('tempat_lahir') ?>
					</div>
				</div>
					
				<div class="form-group">         
					<label class="col-sm-2" for="date">Tanggal Lahir </label>  	
					<div class="col-sm-4">
						<input type="date" class="form-control" name="tgl_lahir" value="<?php echo isset($tgl_lahir) ? set_value('tgl_lahir', date('Y-m-d', strtotime($tgl_lahir))) : set_value('tgl_lahir'); ?>">
						<?php echo form_error('tgl_lahir') ?>	
					</div>
				</div>
					
				<div class="form-group">         
					<label class="col-sm-2" for="enum">Jenis Kelamin</label>
					<div class="col-sm-4">
						<?php 
							$pilihan = array("" => "-- Pilihan --","L" => "Laki-laki", "P" => "Perempuan");
							echo form_dropdown('jenis_kelamin', $pilihan,$jenis_kelamin, 'class="form-control" id="jenis_kelamin"'); 
							echo form_error('jenis_kelamin'); 
						?>		 
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Agama </label>
					<div class="col-sm-4">
						<?php 
							$pil_agama= array("" => "-- Pilihan --",
													"Islam" => "Islam", 
													"Katholik" => "Katholik",
													"Protestan"=>"Protestan",
													"Hindu"=>"Hindu",
													"Budha"=>"Budha",
													"Lainnya"=>"Lainnya");
							echo form_dropdown('agama', $pil_agama,$agama, 'class="form-control" id="agama"'); 
							echo form_error('agama') 
						?>   
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Status </label>
					<div class="col-sm-4">
						<?php 
							$pil_status =  array("" => "-- Pilihan --",
													"Aktif" => "Aktif", 
													"Tidak Aktif" => "Tidak Aktif",
													"Diblokir"=>"Diblokir",
													"Lainnya"=>"Lainnya");
							echo form_dropdown('status', $pil_status,$status, 'class="form-control" id="status"'); 
							echo form_error('status') 
						?>   
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Sepeda Motor</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="merek_sepeda_motor" id="merek_sepeda_motor" placeholder="Merek dan jenis Sepeda Motor" value="<?php echo $merek_sepeda_motor; ?>" />
						<?php echo form_error('merek_sepeda_motor') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Polisi</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="Nomor Polisi Sepeda Motor" value="<?php echo $no_plat; ?>" />
						<?php echo form_error('no_plat') ?>
					</div>
				</div>
					 
				
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto KTP </p>";
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
					<a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a>
				</form>  