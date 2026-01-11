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
        <li><a href="<?php echo $back ?>">Kepala Dinas</a></li>
        <li class="active"><?php echo $button ?> Kepala Dinas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Kepala Dinas -->
		<legend><?php echo $button ?> Kepala Dinas</legend>	
        <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden"  class="form-control" name="id_kadis" id="id_kadis" value="<?php echo $id_kadis; ?>" />
		<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIP <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Handphone <?php echo form_error('no_handphone') ?></label>
            <input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    
	    	    
		<div class="form-group">
			<label for="varchar">Photo <?php echo form_error('photo') ?></label>

					<?php
						if($photo==""){
								echo"<p class='help-block'>Silahkan upload photo </p>";
						}
						else{
					?>
						<div>			
							<img width="100px" src="../images/<?php echo $photo; ?>">
							
						</div><br />
					<?php
						}
					?>
					<div>	
						<input type="file" name="photo" id="photo">	
					</div>		
				
		</div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kadis') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!--// Form Kadis -->