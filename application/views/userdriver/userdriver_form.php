<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Ujek                                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>Ojek, Belanja & Kurir Online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">User Driver</a></li>
        <li class="active"><?php echo $button ?> User Driver</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input atau edit Users -->
			<h2 style="margin-top:0px">User Driver <?php echo $button ?></h2>
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Nomor Handphone <?php echo form_error('no_handphone') ?></label>
					<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor Handphone" value="<?php echo $no_handphone; ?>" />
				</div>
			
				<div class="form-group">
					<label for="varchar">Password <?php echo form_error('password') ?></label>
					<input type="text" class="form-control" name="password" id="password" placeholder="Password"  />
				</div>
						
				<div class="form-group">
					<label for="enum">Off/On <?php echo form_error('off_on') ?></label>
					<select name="off_on" class="form-control select2" style="width: 100%;">	
							<option value="Off" selected>Off</option>
							<option value="On">On</option>
					</select>            
				</div>
				
				
				
				<input type="hidden" class="form-control" name="lattitude" id="lattitude" placeholder="Lattitude" value="" />
				<input type="hidden" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="" />
				<input type="hidden" class="form-control" name="photo" id="photo" placeholder="Longitude" value="" />
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('userdriver') ?>" class="btn btn-default">Cancel</a>
			</form>
    