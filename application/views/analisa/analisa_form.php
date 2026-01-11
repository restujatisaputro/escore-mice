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
        <li><a href="<?php echo $back ?>">Analisa</a></li>
        <li class="active"><?php echo $button ?> Analisa</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Analisa-->
			<legend><?php echo $button ?> Analisa</legend>		 
			
			<form role="form" class="form-horizontal"  action='<?php echo base_url("script/input_analisa.php")?>' method="POST" enctype="multipart/form-data">
				
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Website </label>
					<div class="col-sm-10">
						 <?php 
							   $query1 = $this->db->query("SELECT * FROM tb_website ");
							   $dropdowns1 = $query1->result();
							   foreach($dropdowns1 as $dropdown1) {
									   $dropDownList1[$dropdown1->alamat_website] = $dropdown1->alamat_website;
									}
								  $finalDropDown1 = array_merge(array("" => "-- Pilihan --"), $dropDownList1); 
							  echo  form_dropdown('alamat_website',$finalDropDown1 , $alamat_website, 
								    'class="form-control" id="alamat_website"'); 	
							  echo form_error('alamat_website') 
						  ?> 
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Source Code </label>
					<div class="col-sm-10">
						 <textarea cols="130" rows="10" name="source_code" id="source_code"></textarea>
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username ; ?>" />
				
				<input type="hidden" class="form-control" name="input" id="input"  value="Baru" />
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('analisa') ?>" class="btn btn-default">Cancel</a>
					
				</form> 
			
			
			
			 