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
        <li><a href="<?php echo $back ?>">Anggaran Obat</a></li>
        <li class="active"><?php echo $button ?> Anggaran Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
            <legend><?php echo $button ?> Anggaran Obat</legend>		 
		
		
		
		<?php
			
			    $rand = rand(10, 50);

			    if($id_penganggaranobat==''){
			        $id_penganggaranobat2 = "BG".$rand ;
			    }
			    else{
			        $id_penganggaranobat2 = $id_penganggaranobat ;
			    }
			?>
			
		    
			<!-- Form input dan edit Anggaran Obat-->
			 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Anggaran Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="id_penganggaranobat" id="id_penganggaranobat" value="<?php echo $id_penganggaranobat2; ?>" readonly/>
						<?php echo form_error('id_penganggaranobat') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">ID Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="id_obat" id="id_obat" value="<?php echo $id_obat; ?>" readonly/>
						<?php echo form_error('id_obat') ?>
					</div>
				</div>
				
				<?php
				    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
				    $data7=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");
                    while($result7=mysqli_fetch_array($data7)){
                    $nama_obat = $result7["nama_obat"];
                    $id_golonganobat = $result7["id_golonganobat"];
                    $id_bentukobat = $result7["id_bentukobat"];
                    $id_klasifikasimedis = $result7["id_klasifikasimedis"];
                    }
                    
                    $data8=mysqli_query($connect, "select * from tb_golonganobat where id_golonganobat = '$id_golonganobat' ");
                    while($result8=mysqli_fetch_array($data8)){
                    $golongan_obat = $result8["golongan_obat"];
                    }
                    
                    $data9=mysqli_query($connect, "select * from tb_bentukobat where id_bentukobat = '$id_bentukobat' ");
                    while($result9=mysqli_fetch_array($data9)){
                    $bentuk_obat = $result9["bentuk_obat"];
                    }
                    
                    $data10=mysqli_query($connect, "select * from tb_klasifikasimedis where id_klasifikasimedis = '$id_klasifikasimedis' ");
                    while($result10=mysqli_fetch_array($data10)){
                    $klasifikasi_medis = $result10["klasifikasi_medis"];
                    }
				?>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  value="<?php echo $nama_obat; ?>" readonly/>
						<?php echo form_error('id_obat') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Golongan Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  value="<?php echo $golongan_obat; ?>" readonly/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Bentuk Obat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  value="<?php echo $bentuk_obat; ?>" readonly/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Klasifikasi Medis</label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  value="<?php echo $klasifikasi_medis; ?>" readonly/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Satuan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
						<?php echo form_error('satuan') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Jumlah</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Contoh : 1000" value="<?php echo $jumlah; ?>" />
						<?php echo form_error('jumlah') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Harga Satuan</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Contoh : 5000" value="<?php echo $harga_satuan; ?>" />
						<?php echo form_error('harga_satuan') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Netto</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="netto" id="netto" placeholder="Berat Bersih / Netto" value="<?php echo $netto; ?>" />
						<?php echo form_error('netto') ?>
					</div>
				</div>
				
				<div class="form-group">
                    <label class="col-sm-2" for="varchar">Puskesmas</label>
                        <?php 
                            $connect = mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
							$query = $this->db->query('SELECT * FROM tb_puskesmas ORDER BY nama_puskesmas ASC');
							$dropdowns = $query->result();
							    foreach($dropdowns as $dropdown) {
								    $dropDownList[$dropdown->id_puskesmas] = $dropdown->nama_puskesmas;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_puskesmas', $finalDropDown, 'class="form-control" id="id_puskesmas"' ); 	
							  echo form_error('id_puskesmas') 
						  ?>
	            </div>
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username; ?>" />
				<input type="hidden" class="form-control" name="status" id="status"  value="Permohonan" />
				
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('anggaranobat') ?>" class="btn btn-default">Cancel</a>
				</form>