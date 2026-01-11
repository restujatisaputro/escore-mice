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
        <li><a href="<?php echo $back ?>">Bentuk Obat</a></li>
        <li class="active"><?php echo $button ?> Bentuk Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
			
			    $rand = rand(10, 50);

			    if($id_bentukobat==''){
			        $id_bentukobat2 = "BO".$rand ;
			    }
			    else{
			        $id_bentukobat2 = $id_bentukobat ;
			    }
			?>
		
			<!-- Form input dan edit Bentuk Obat -->
			<legend><?php echo $button ?> Bentuk Obat</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">ID Bentuk Obat  <?php echo form_error('id_bentukobat') ?></label>
					<input type="text" class="form-control" name="id_bentukobat" id="id_bentukobat"  value="<?php echo $id_bentukobat2; ?>" readonly/>
				</div>
				
				<div class="form-group">
					<label for="varchar">Kode  <?php echo form_error('kode_bentukobat') ?></label>
					<input type="text" class="form-control" name="kode_bentukobat" id="kode_bentukobat" placeholder="Kode Bentuk Obat" value="<?php echo $kode_bentukobat; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Bantuk Obat <?php echo form_error('bentuk_obat') ?></label>
					<input type="text" class="form-control" name="bentuk_obat" id="bentuk_obat" placeholder="Bentuk Obat" value="<?php echo $bentuk_obat; ?>" />
				</div>
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('bentukobat') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Bentuk Obat -->