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
        <li><a href="<?php echo $back ?>">Klasifikasi Medis</a></li>
        <li class="active"><?php echo $button ?> Klasifikasi Medis</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
			
			    $rand = rand(10, 50);

			    if($id_klasifikasimedis==''){
			        $id_klasifikasimedis2 = "KM".$rand ;
			    }
			    else{
			        $id_klasifikasimedis2 = $id_klasifikasimedis ;
			    }
			?>
		
			<!-- Form input dan edit Klasifikasi Medis -->
			<legend><?php echo $button ?> Klasifikasi Medis</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">ID Klasifikasi <?php echo form_error('id_klasifikasi_medis') ?></label>
					<input type="text" class="form-control" name="id_klasifikasimedis" id="id_klasifikasimedis"  value="<?php echo $id_klasifikasimedis2; ?>" readonly />
				</div>
				
				
				<div class="form-group">
					<label for="varchar">Klasifikasi Medis <?php echo form_error('klasifikasi_medis') ?></label>
					<input type="text" class="form-control" name="klasifikasi_medis" id="klasifikasi_medis" placeholder="Klasifikasi Medis" value="<?php echo $klasifikasi_medis; ?>" />
				</div>
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('klasifikasimedis') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Klasifikasi Medis -->