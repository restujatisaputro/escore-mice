<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Ujek                                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>Ojek Online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Cabang</a></li>
        <li class="active"><?php echo $button ?> Cabang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
				$koneksi = mysqli_connect('localhost','u197914754_ujek','Andri13021980','u197914754_ujek');
	            $data_cabang = mysqli_query($koneksi,"SELECT * FROM tb_cabang ");
	            $jlh_cabang = mysqli_num_rows($data_cabang);
	            
	            $rand = $jlh_cabang + 1;
					                

			    if($id_cabang==''){
			        $id_cabang2 = "CS".$rand ;
			    }
			    else{
			        $id_cabang2 = $id_cabang ;
			    }
			?>
		
			<!-- Form input dan edit Cabang-->
			<legend><?php echo $button ?> Cabang</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="char">ID Cabang</label>
					<div class="col-sm-4">
						<input type="text"   class="form-control" name="id_cabang" id="id_cabang" placeholder="ID Cabang" value="<?php echo $id_cabang2; ?>" readonly/>
						<?php echo form_error('id_cabang'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Cabang</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" placeholder="Nama Cabang" value="<?php echo $nama_cabang; ?>" />
						<?php echo form_error('nama_cabang') ?>
					</div>
				</div>	
						
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Handphone </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="handphone" id="handphone" placeholder="Nomor Handphone" value="<?php echo $handphone; ?>" />
						<?php echo form_error('handphone') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Whatsapp </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Nomor Whatsapp" value="<?php echo $whatsapp; ?>" />
						<?php echo form_error('whatsapp') ?>
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
					<label class="col-sm-2" for="varchar">Alamat </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat_cabang" id="alamat_cabang" placeholder="Alamat Cabang" value="<?php echo $alamat_cabang; ?>" />
						<?php echo form_error('alamat_cabang') ?>
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kelurahan </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
						<?php echo form_error('kelurahan') ?>
					</div>
				</div>
					
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kecamatan </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
						<?php echo form_error('kecamatan') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kabupaten </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
						<?php echo form_error('kabupaten') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Propinsi </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Propinsi" value="<?php echo $propinsi; ?>" />
						<?php echo form_error('propinsi') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Kepala Cabang </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="kepala_cabang" id="kepala_cabang" placeholder="Kepala Cabang" value="<?php echo $kepala_cabang; ?>" />
						<?php echo form_error('kepala_cabang') ?>
					</div>
				</div>
					 
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Nomor Handphone Kepala Cabang </label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="hp_kepala" id="hp_kepala" placeholder="Nomor Handphone Kepala Cabang" value="<?php echo $hp_kepala; ?>" />
						<?php echo form_error('hp_kepala') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Whatsapp Kepala Cabang </label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="wa_kepala" id="wa_kepala" placeholder="Whatsapp Kepala Cabang" value="<?php echo $wa_kepala; ?>" />
						<?php echo form_error('wa_kepala') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Email Kepala Cabang </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="email_kepala" id="email_kepala" placeholder="Email Kepala Cabang" value="<?php echo $email_kepala; ?>" />
						<?php echo form_error('email_kepala') ?>
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer" value="<?php echo $inputer; ?>" />
				
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto cabang </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $photo; ?>" width='200px'>
									</div><br />
							<?php
								}
							?>
							<input type="file" name="photo" id="photo">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('cabang') ?>" class="btn btn-default">Cancel</a>
				</form>  