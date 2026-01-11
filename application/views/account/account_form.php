<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Manajemen                               */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        CV Adiva
        <small>Manajemen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Account</a></li>
        <li class="active"><?php echo $button ?> Account</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
            
           	<!-- Form input dan edit Account -->
			<legend><?php echo $button ?> Account</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Kode Account  <?php echo form_error('kode_account') ?></label>
					<input type="text" class="form-control" name="kode_account" id="kode_account"  placeholder="Kode Account" value="<?php echo $kode_account; ?>" />
				</div>
				
				<div class="form-group">
					<label for="varchar">Nama Account  <?php echo form_error('nama_account') ?></label>
					<input type="text" class="form-control" name="nama_account" id="nama_account" placeholder="Nama Account" value="<?php echo $nama_account; ?>" />
				</div>
				
				<div class="form-group">        
					<label for="varchar">Kelompok Account  <?php echo form_error('kelompok') ?></label>
						<?php 
							$pil_kelompok= array("" => "-- Pilihan --",
													"Kas" => "Kas", 
													"Piutang" => "Piutang",
													"Persediaan"=>"Persediaan",
													"Perlengkapan"=>"Perlengkapan",
													"Peralatan"=>"Peralatan",
													"Hutang Lancar"=>"Hutang Lancar",
													"Hutang Jangka Panjang"=>"Hutang Jangka Panjang",
													"Biaya Dibayar Dimuka"=>"Biaya Dibayar Dimuka",
													"Kewajiban Lainnya"=>"Kewajiban Lainnya",
													"Modal"=>"Modal",
													"Pendapatan Jasa"=>"Pendapatan Jasa",
													"Pendapatan"=>"Pendapatan",
													"Pendapatan Lainnya"=>"Pendapatan Lainnya",
													"Biaya Operasional"=>"Biaya Operasional",
													"Biaya Non Operasional"=>"Biaya Non Operasional",
													"Biaya Lainnya"=>"Biaya Lainnya",
													"Tanah"=>"Tanah",
													"Bangunan"=>"Bangunan",
													"Kendaraan"=>"Kendaraan",
													"Laba Rugi"=>"Laba Rugi");
							echo form_dropdown('kelompok', $pil_kelompok, $kelompok, 'class="form-control" id="kelompok"'); 
							echo form_error('kelompok') 
						?>   
				</div>
				
				<div class="form-group">        
					<label for="varchar">Posisi  <?php echo form_error('posisi') ?></label>
						<?php 
							$pil_posisi= array("" => "-- Pilihan --",
													"D" => "Debet", 
													"K"=>"Kredit");
							echo form_dropdown('posisi', $pil_posisi, $posisi, 'class="form-control" id="posisi"'); 
							echo form_error('posisi') 
						?>   
				</div>
				
				
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('account') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Account -->