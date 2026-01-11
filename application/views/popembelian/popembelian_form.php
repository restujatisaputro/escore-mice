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
        <li><a href="<?php echo $back ?>">Purchase Order</a></li>
        <li class="active"><?php echo $button ?> Purchase Order</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
			<!-- Form input dan edit Purchase Order-->
			<legend><?php echo $button ?> Purchase Order</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				
				<?php
			
			    $rand = rand(10, 50);

			    if($inv_no==''){
			        $inv_no2 = "PO.".$rand."-".date('Y') ;
			    }
			    else{
			        $inv_no2 = $inv_no ;
			    }
			?>
				<div class="form-group">
					<label class="col-sm-2" for="varchar">No. Invoice</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="inv_no" id="inv_no" placeholder="Nomor Invoice" value="<?php echo $inv_no2; ?>" readonly />
						<?php echo form_error('inv_no') ?>
					</div>
				</div>	
				
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Supplier </label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT * FROM tb_supplier ORDER BY nama_supplier ASC');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_supplier] = $dropdown->nama_supplier;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_supplier',$finalDropDown , $id_supplier, 
								    'class="form-control" id="id_supplier"'); 	
							  echo form_error('id_supplier') 
						  ?> 
					</div>
					<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-secondary">+ Supplier</button>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Keterangan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
						<?php echo form_error('keterangan') ?>
					</div>
				</div>
				
				<div class="form-group">        
					<label class="col-sm-2" for="varchar">Pembayaran </label>
					<div class="col-sm-4">
						<?php 
							$pil_pembayaran= array("" => "-- Pilihan --",
													"Tunai" => "Tunai",
													"Non Tunai"=>"Non Tunai");
							echo form_dropdown('pembayaran', $pil_pembayaran,$pembayaran, 'class="form-control" id="pembayaran"'); 
							echo form_error('pembayaran') 
						?>   
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username; ?>" />
				<input type="hidden" class="form-control" name="tanggal" id="tanggal"  value="<?php echo date('Y-m-d') ; ?>" />
				
						
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('popembelian') ?>" class="btn btn-default">Cancel</a>
				</form>  


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Tambah Supplier </h4>
   </div>
   <div class="modal-body">
        <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <?php
			
			    $rand = rand(10, 50);
			    $id_supplier = "SP".$rand ;
			    
			?>
		
			 
			<form action="https://simo.adiva.click/script/input_supplier.php" method="post">
				<div class="form-group">
					<label for="varchar">ID Supplier  </label>
					<input type="text" class="form-control" name="id_supplier" id="id_supplier"  value="<?php echo $id_supplier; ?>" readonly/>
				</div>
				
				<div class="form-group">
					<label for="varchar">Supplier  <?php echo form_error('nama_supplier') ?></label>
					<input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier"  />
				</div>
				
				<div class="form-group">
					<label for="varchar">Alamat <?php echo form_error('alamat_supplier') ?></label>
					<input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat Supplier" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Telepon/Handphone <?php echo form_error('no_handphone') ?></label>
					<input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="Nomor telepon atau nomor handphone"  />
				</div>
				
				<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email"  />
				</div>
				
				<div class="form-group">
					<label for="varchar">Kontak Person <?php echo form_error('kontak_person') ?></label>
					<input type="text" class="form-control" name="kontak_person" id="kontak_person" placeholder="Kontak Person"  />
				</div>
				
				<button type="submit" class="btn btn-primary">Simpan</button> 
			</form>  
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>