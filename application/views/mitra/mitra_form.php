<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Ujek                                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>Ojek, Belanja & Kurir Online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Mitra</a></li>
        <li class="active"><?php echo $button ?> Mitra</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Mitra-->
			<legend><?php echo $button ?> Mitra</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				
				<?php
				    if($id_mitra==''){
				        $id_mitra2 = rand();
				    }else{
				        $id_mitra2 =$id_mitra ;
				    }
				?>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Id Mitra</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id_mitra" id="id_mitra" placeholder="Id Mitra" value="<?php echo $id_mitra2; ?>" readonly />
						<?php echo form_error('id_mitra') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Usaha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" value="<?php echo $nama_usaha; ?>" />
						<?php echo form_error('nama_usaha') ?>
					</div>
				</div>	
						
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Pemilik </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
						<?php echo form_error('nama_pemilik') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Handphone </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
						<?php echo form_error('no_handphone') ?>
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor WhatsApp </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="no_whatsapp" id="no_whatsapp" placeholder="Nomor WhatsApp" value="<?php echo $no_whatsapp ; ?>" />
						<?php echo form_error('no_whatsapp') ?>
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
					<label class="col-sm-2"  for="varchar">Alamat Usaha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" placeholder="Alamat Usaha" value="<?php echo $alamat_mitra; ?>" />
						<?php echo form_error('alamat_mitra') ?>
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kelurahan </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan ; ?>" />
						<?php echo form_error('kelurahan') ?>
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kecamatan </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan ; ?>" />
						<?php echo form_error('kecamatan') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kabupaten </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten ; ?>" />
						<?php echo form_error('kabupaten') ?>
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username ; ?>" />
				
				
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
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('mitra') ?>" class="btn btn-default">Cancel</a>
				</form>  