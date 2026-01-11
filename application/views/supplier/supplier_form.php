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
        <li><a href="<?php echo $back ?>">Supplier</a></li>
        <li class="active"><?php echo $button ?> Supplier</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
			
			    $rand = rand(10, 50);

			    if($id_supplier==''){
			        $id_supplier2 = "SP".$rand ;
			    }
			    else{
			        $id_supplier2 = $id_supplier ;
			    }
			?>
		
			<!-- Form input dan edit Supplier -->
			<legend><?php echo $button ?> Supplier</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">ID Supplier  <?php echo form_error('id_supplier') ?></label>
					<input type="text" class="form-control" name="id_supplier" id="id_supplier"  value="<?php echo $id_supplier2; ?>" readonly/>
				</div>
				
				<div class="form-group">
					<label for="varchar">Supplier  <?php echo form_error('nama_supplier') ?></label>
					<input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Alamat <?php echo form_error('alamat_supplier') ?></label>
					<input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat Supplier" value="<?php echo $alamat_supplier; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Telepon/Handphone <?php echo form_error('no_handphone') ?></label>
					<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor telepon atau nomor handphone" value="<?php echo $no_handphone; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" value="<?php echo $email; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Kontak Person <?php echo form_error('kontak_person') ?></label>
					<input type="text" class="form-control" name="kontak_person" id="kontak_person" placeholder="Kontak Person" value="<?php echo $kontak_person; ?>" />
				</div>
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Bentuk Obat -->