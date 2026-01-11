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
        <li><a href="<?php echo $back ?>">Website</a></li>
        <li class="active"><?php echo $button ?> Website</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Mitra-->
			<legend><?php echo $button ?> Website</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				
				<input type="hidden" class="form-control" name="id_website" id="id_website" placeholder="Id Mitra" value="<?php echo $id_website; ?>" readonly />
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Alamat Website</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="alamat_website" id="alamat_website" placeholder="Nama Usaha" value="<?php echo $alamat_website; ?>" />
						<?php echo form_error('alamat_website') ?>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Negara</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="negara" id="negara" placeholder="Negara" value="<?php echo $negara; ?>" />
						<?php echo form_error('negara') ?>
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username ; ?>" />
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('website') ?>" class="btn btn-default">Cancel</a>
				</form>  