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
        <li><a href="<?php echo $back ?>">Tarif Jasa</a></li>
        <li class="active"><?php echo $button ?> Tarif Jasa</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Tarif Jasa -->
			<legend><?php echo $button ?> Tarif Jasa</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Nama Tarif <?php echo form_error('nama_tarif') ?></label>
					<input type="text" class="form-control" name="nama_tarif" id="nama_tarif" placeholder="Nama Tarif" value="<?php echo $nama_tarif; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Tarif <?php echo form_error('tarif') ?></label>
					<input type="number" class="form-control" name="tarif" id="tarif" placeholder="Tarif" value="<?php echo $tarif; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
					<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan Tarif" value="<?php echo $satuan; ?>" />
				</div>
				<input type="hidden" name="id_tarifjasa" value="<?php echo $id_tarifjasa; ?>" /> 
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('tarifjasa') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Tarifjasa.php -->