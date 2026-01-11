<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Green                                   */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Green
        <small>Automated Checklist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Indikator</a></li>
        <li class="active"><?php echo $button ?> Indikator</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
           	<!-- Form input dan edit Indikator -->
			<legend><?php echo $button ?> Indikator</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">
					    Nomor Indikator  <?php echo form_error('no_indikator') ?></label>
					<input type="text" class="form-control" name="no_indikator" id="no_indikator"  placeholder="Nomor Indikator" value="<?php echo $no_indikator ; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Indikator  <?php echo form_error('indikator') ?></label>
					<input type="text" class="form-control" name="indikator" id="indikator" placeholder="Indikator" value="<?php echo $indikator ; ?>" />
				</div>
				
				<div class="form-group">        
					<label for="varchar">Kelompok Indikator  <?php echo form_error('kelompok') ?></label>
						<?php 
							$pil_kelompok= array("" => "-- Pilihan --",
													"GREEN D WEB VARIABLES" => "GREEN D WEB VARIABLES", 
													"MICE or CVB"=>"MICE or CVB");
							echo form_dropdown('kelompok', $pil_kelompok, $kelompok, 'class="form-control" id="kelompok"'); 
							echo form_error('kelompok') 
						?>   
				</div>
				
				<input type="hidden" class="form-control" name="id_indikator" id="id_indikator" placeholder="Inputer" value="<?php echo $id_indikator ; ?>" />
				<input type="hidden" class="form-control" name="inputer" id="inputer" placeholder="Inputer" value="<?php echo $username ; ?>" />
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('indikator') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Account -->