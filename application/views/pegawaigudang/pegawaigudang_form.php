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
        <li><a href="<?php echo $back ?>">Pegawai Gudang</a></li>
        <li class="active"><?php echo $button ?> Pegawai Gudang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Pegawai Gudang-->
			<legend><?php echo $button ?> Pegawai Gudang</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="gambar" id="gambar" value="<?php echo $gambar; ?>" />
				
				
			<?php
			
			    $rand = rand(10, 50);

			    if($id_pegawaigudang==''){
			        $id_pegawaigudang2 = "PG".$rand ;
			    }
			    else{
			        $id_pegawaigudang2 = $id_pegawaigudang ;
			    }
			?>
			
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Pegawai Gudang</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id_pegawaigudang" id="id_pegawaigudang" placeholder="ID Pegawai Gudang" value="<?php echo $id_pegawaigudang2; ?>" / readonly>
						<?php echo form_error('id_pegawaigudang') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">NIP</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nip" id="nip" placeholder="Nomor Induk Pegawai" value="<?php echo $nip; ?>" />
						<?php echo form_error('nip') ?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Pegawai</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" />
						<?php echo form_error('nama_pegawai') ?>
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
					<label class="col-sm-2" for="varchar">Nomor Handphone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
						<?php echo form_error('no_handphone') ?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
						<?php echo form_error('email') ?>
					</div>
				</div>	
				
				<input type="hidden" class="form-control" name="inputer" id="inputer" placeholder="Inputer" value="<?php echo $username; ?>" />
						
				<div class="form-group">
					<label class="col-sm-2" for="gambar">Photo</label>
						<div class="col-sm-4">
							<?php
								if($gambar==""){
									echo"<p class='help-block'>Silahkan upload Photo </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $gambar; ?>" width='250px'>
									</div><br />
							<?php
								}
							?>
							<input type="file" name="gambar" id="gambar">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('pegawaigudang') ?>" class="btn btn-default">Cancel</a>
				</form>  