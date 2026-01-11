<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Dinkes Kabupaten Indragiri Hilir        */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        SIMO
        <small>System Informasi Manajemen Obat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Puskesmas</a></li>
        <li class="active"><?php echo $button ?> Puskesmas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
			
			    $rand = rand(10, 50);

			    if($id_puskesmas==''){
			        $id_puskesmas2 = "PKM".$rand ;
			    }
			    else{
			        $id_puskesmas2 = $id_puskesmas ;
			    }
			?>
		
			<!-- Form input dan edit Puskesmas-->
			<legend><?php echo $button ?> Puskesmas</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="gambar" id="gambar" value="<?php echo $gambar; ?>" />
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Puskesmas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="ID Puskesmas" value="<?php echo $id_puskesmas2; ?>" />
						<?php echo form_error('id_puskesmas') ?>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Puskesmas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Nama Puskesmas" value="<?php echo $nama_puskesmas; ?>" />
						<?php echo form_error('nama_puskesmas') ?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
						<?php echo form_error('alamat') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kelurahan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
						<?php echo form_error('kelurahan') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kecamatan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
						<?php echo form_error('kecamatan') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kabupaten</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
						<?php echo form_error('kabupaten') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
						<?php echo form_error('email') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nomor Handphone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
						<?php echo form_error('no_handphone') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Website</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="website" id="website" placeholder="Alamat Website" value="<?php echo $website; ?>" />
						<?php echo form_error('website') ?>
					</div>
				</div>
				
				
				
						
				<div class="form-group">
					<label class="col-sm-2" for="gambar">Photo</label>
						<div class="col-sm-4">
							<?php
								if($gambar==""){
									echo"<p class='help-block'>Silahkan upload foto Photo </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $gambar; ?>">
									</div><br />
							<?php
								}
							?>
							<input type="file" name="gambar" id="gambar">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('puskesmas') ?>" class="btn btn-default">Cancel</a>
				</form>  