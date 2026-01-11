<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : CV SMR                                  */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        SMR
        <small>CV Samudra Mitra Rejeki</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Gudang</a></li>
        <li class="active"><?php echo $button ?> Gudang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Gudang-->
			<legend><?php echo $button ?> Gudang</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				
				<?php
			        $koneksi = mysqli_connect('localhost','u197914754_smr','Andri13021980','u197914754_smr');
	                $data_gudang = mysqli_query($koneksi,"SELECT * FROM tb_gudang ");
	                $jlh_gudang = mysqli_num_rows($data_gudang);
	            
	                $rand = $jlh_gudang + 1;
					                

			    if($id_gudang ==''){
			        $id_gudang2 = "GD".rand().$rand ;
			    }
			    else{
			        $id_gudang2 = $id_gudang ;
			    }
			?>
				
				<div class="form-group">
					<label class="col-sm-2" for="char">ID Gudang</label>
					<div class="col-sm-8">
						<input type="text"   class="form-control" name="id_gudang" id="id_gudang" placeholder="ID Gudang" value="<?php echo $id_gudang2; ?>" readonly />
						<?php echo form_error('id_gudang'); ?>
					</div>
				</div>
								
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Gudang</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nama_gudang" id="nama_gudang" placeholder="Nama Gudang" value="<?php echo $nama_gudang ; ?>" />
						<?php echo form_error('nama_gudang') ?>
					</div>
				</div>	
						
				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Alamat Gudang </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamat_gudang" id="alamat_gudang" placeholder="Alamat Gudang" value="<?php echo $alamat_gudang; ?>" />
						<?php echo form_error('alamat_gudang') ?>
					</div>
				</div>
								
				<input type="hidden" class="form-control" name="inputer" id="inputer" value="<?php echo $username; ?>" />
				
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto </p>";
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
					<a href="<?php echo site_url('gudang') ?>" class="btn btn-default">Cancel</a>
				</form>  