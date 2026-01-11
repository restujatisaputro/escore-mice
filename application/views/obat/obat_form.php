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
        <li><a href="<?php echo $back ?>">Obat</a></li>
        <li class="active"><?php echo $button ?> Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		    <?php
			
			    $rand = rand(10, 50);

			    if($id_obat==''){
			        $id_obat2 = "FR".$rand ;
			    }
			    else{
			        $id_obat2 = $id_obat ;
			    }
			?>
			
		    
			<!-- Form input dan edit Obat-->
			<legend><?php echo $button ?> Obat</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="id_obat" id="id_obat" value="<?php echo $id_obat2; ?>" readonly/>
						<?php echo form_error('id_obat') ?>
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Golongan Obat </label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT * FROM tb_golonganobat ORDER BY golongan_obat ASC');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_golonganobat] = $dropdown->golongan_obat;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_golonganobat',$finalDropDown , $id_golonganobat, 
								    'class="form-control" id="id_golonganobat"'); 	
							  echo form_error('id_golonganobat') 
						  ?> 
					</div>
				</div>	
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Bentuk Obat </label>
					<div class="col-sm-4">
						 <?php 
							   $query2 = $this->db->query('SELECT id_bentukobat,bentuk_obat FROM tb_bentukobat ORDER BY bentuk_obat ASC');
							   $dropdowns2 = $query2->result();
							   foreach($dropdowns2 as $dropdown2) {
									   $dropDownList2[$dropdown2->id_bentukobat] = $dropdown2->bentuk_obat;
									}
								  $finalDropDown2 = array_merge(array("" => "-- Pilihan --"), $dropDownList2); 
							  echo  form_dropdown('id_bentukobat',$finalDropDown2 , $id_bentukobat, 
								    'class="form-control" id="id_bentukobat"'); 	
							  echo form_error('id_bentukobat') 
						  ?> 
					</div>
				</div>	
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Klasifikasi Medis </label>
					<div class="col-sm-4">
						 <?php 
							   $query3 = $this->db->query('SELECT id_klasifikasimedis,klasifikasi_medis FROM tb_klasifikasimedis ORDER BY klasifikasi_medis ASC');
							   $dropdowns3 = $query3->result();
							   foreach($dropdowns3 as $dropdown3) {
									   $dropDownList3[$dropdown3->id_klasifikasimedis] = $dropdown3->klasifikasi_medis;
									}
								  $finalDropDown3 = array_merge(array("" => "-- Pilihan --"), $dropDownList3); 
							  echo  form_dropdown('id_klasifikasimedis',$finalDropDown3 , $id_klasifikasimedis, 
								    'class="form-control" id="id_klasifikasimedis"'); 	
							  echo form_error('id_klasifikasimedis') 
						  ?> 
					</div>
				</div>	
				
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Obat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat" value="<?php echo $nama_obat; ?>" />
						<?php echo form_error('nama_obat') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Merek</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="merek" id="merek" placeholder="Merek Obat" value="<?php echo $merek; ?>" />
						<?php echo form_error('merek') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Barcode</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="<?php echo $barcode; ?>" />
						<?php echo form_error('barcode') ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Inputer</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="inputer" id="inputer" placeholder="Username" value="<?php echo $username; ?>" />
						<?php echo form_error('inputer') ?>
					</div>
				</div>
						
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto Obat </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $photo; ?>">
									</div><br />
							<?php
								}
							?>
							<input type="file" name="photo" id="photo">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('obat') ?>" class="btn btn-default">Cancel</a>
				</form>  