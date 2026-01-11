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
        <li><a href="<?php echo $back ?>">Golongan Obat</a></li>
        <li class="active"><?php echo $button ?> Golongan Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Golongan Obat-->
			<legend><?php echo $button ?> Golongan Obat</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="gambar" id="gambar" value="<?php echo $gambar; ?>" />
				<input type="hidden"  class="form-control" name="id_golonganobat" id="id_golonganobat" value="<?php echo $id_golonganobat; ?>" />
				
			<?php
			
			    $rand = rand(10, 50);

			    if($id_golonganobat==''){
			        $id_golonganobat2 = "GO".$rand ;
			    }
			    else{
			        $id_golonganobat2 = $id_golonganobat ;
			    }
			?>
			
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Golongan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id_golonganobat" id="id_golonganobat" placeholder="ID Golongan Obat" value="<?php echo $id_golonganobat2; ?>" / readonly>
						<?php echo form_error('id_golonganobat') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Golongan Obat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="golongan_obat" id="golongan_obat" placeholder="Golongan Obat" value="<?php echo $golongan_obat; ?>" />
						<?php echo form_error('golongan_obat') ?>
					</div>
				</div>	
						
				<div class="form-group">
					<label class="col-sm-2" for="gambar">Gambar Tanda</label>
						<div class="col-sm-4">
							<?php
								if($gambar==""){
									echo"<p class='help-block'>Silahkan upload foto Tanda Gambar </p>";
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
					<a href="<?php echo site_url('golonganobat') ?>" class="btn btn-default">Cancel</a>
				</form>  