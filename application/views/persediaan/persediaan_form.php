<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Dinkes Kabupaten Indragiri Hilir        */
/*-------------------------------------------------------->

<script>
    function sum() {
    var txtFirstNumberValue = document.getElementById('jumlah').value;
    var txtSecondNumberValue = document.getElementById('harga_satuan').value;
    var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
            }
    }
</script>

<section class="content-header">
      <h1>
        SIMO
        <small>System Informasi Manajemen Obat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Persediaan</a></li>
        <li class="active">Tambah Persediaan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		    
			<!-- Form input dan Persediaan Obat -->
			<legend>Tambah Persediaan Obat</legend>		 
			
			<form role="form" class="form-horizontal"  action="https://simo.adiva.click/persediaan/create/" method="GET" enctype="multipart/form-data">
	            <label>Cari Obat :</label>
	            <input type="text" name="cari">
	            <input type="hidden" name="id_pembelianobat" value='0'>
	            <input type="submit" value="Cari">
            </form>
            
            <?php
                if($_GET['cari']!=$_GET['id_pembelianobat']){
            ?>
                </br>
                
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="80px"><center>No</center></th>
					    <th><center>Nama Obat</center></th>
					    <th><center>Jumlah Diorder</center></th>
					    <th><center>Satuan</center></th>
					    <th><center>Harga Satuan</center></th>
					    <th><center>Total</center></th>
					    <th width="200px"><center>Action</center></th>
                    </tr>
                </thead>
                
                <?php
                    $cari = $_GET['cari'];
				    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                    $data = mysqli_query($connect, "select * from tb_pembelianobat where status='' and id_obat like '%".$cari."%' or status='' and nama_obat like '%".$cari."%' ");
                    
				    $no=1; // Nomor urut dalam menampilkan data
				  
				    // Menampilkan data Rekening
				    foreach($data as $row)
				    {
			    ?>
			    <tr>
			        <td><?php echo $no++ ; ?></td>
			        <td><?php echo $row['nama_obat'] ; ?></td>
			        <td align='right'><?php echo number_format($row['jumlah']) ; ?></td>
			        <td><?php echo $row['satuan'] ; ?></td>
			        <td align='right'><?php echo number_format($row['harga_satuan']) ; ?></td>
			        <td align='right'><?php echo number_format($row['harga_satuan']*$row['jumlah']) ; ?></td>
			        
			        <td align='center'>
			           <form role="form" action="https://simo.adiva.click/persediaan/create/" method="get" enctype="multipart/form-data">
		                    <input type="hidden"  class="form-control" name="id_pembelianobat" id="id_pembelianobat" value="<?php echo $row['id_pembelianobat']; ?>" />
		                    <input type="hidden"  class="form-control" name="cari" id="cari" value="<?php echo $row['id_pembelianobat']; ?>" />
		                    <button type="submit" class="btn btn-primary">Tambah</button> 
	               	    </form>
		            
			        </td>
			    </tr>
			<?php
			 }
			?>
	    
        </table>
            
            <?php
                }
            ?>
          
            <?php
                if($_GET['id_pembelianobat']==$_GET['cari']){
            ?>
            
            <legend>&nbsp;</legend>
                <form role="form" action="https://simo.adiva.click/script/input_persediaan_obat.php" method="post" enctype="multipart/form-data">
		            <input type="hidden"  class="form-control" name="id_persediaanobat" id="id_persediaanobat" value="<?php echo $id_persediaanobat; ?>" />
		            <input type="hidden"  class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>" />
		        
		        <?php
		            $id_pembelianobat = $_GET['id_pembelianobat'];
		            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
		            $data7=mysqli_query($connect, "select * from tb_pembelianobat where id_pembelianobat = '$id_pembelianobat' ");

                    while($result7=mysqli_fetch_array($data7)){
                    	$id_obat = $result7["id_obat"];
                    	$nama_obat = $result7["nama_obat"];
                    	$satuan = $result7["satuan"];
                    	$harga_satuan = $result7["harga_satuan"];
                    	$inv_no = $result7["inv_no"];
                    }
                    
		            $data8=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");

                    while($result8=mysqli_fetch_array($data8)){
                    	$barcode = $result8["barcode"];
                    	$id_klasifikasimedis = $result8["id_klasifikasimedis"];
                    }
		        ?>
		            
		            <input type="hidden"  class="form-control" name="id_obat" id="id_obat" value="<?php echo $id_obat; ?>" />
		            <input type="hidden"  class="form-control" name="id_pembelianobat" id="id_pembelianobat" value="<?php echo $id_pembelianobat; ?>" />
		            <input type="hidden"  class="form-control" name="inv_no" id="inv_no" value="<?php echo $inv_no; ?>" />
		            <input type="hidden"  class="form-control" name="inputer" id="inputer" value="<?php echo $username; ?>" />
	    
	            <div class="form-group">
                    <label for="varchar" >Obat </label>
                        <?php
                            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                            $data=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");

                            while($result=mysqli_fetch_array($data)){

	                        $nama_obat = $result["nama_obat"];

                            }
                        ?>
                    <input type="text" class="form-control" name="nama_obat" id="nama_obat"  value="<?php echo $nama_obat; ?>" readonly />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Gudang/Puskesmas</label>
                    <div class="form-control">
                        <?php 
                            $connect = mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
							$query = $this->db->query('SELECT * FROM tb_puskesmas ORDER BY nama_puskesmas ASC');
							$dropdowns = $query->result();
							    foreach($dropdowns as $dropdown) {
								    $dropDownList[$dropdown->id_puskesmas] = $dropdown->nama_puskesmas;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_puskesmas', $finalDropDown ); 	
							  echo form_error('id_puskesmas') 
						  ?>
					</div>
	            </div>
	           
		        <div class="form-group">
                    <label for="varchar">Barcode<?php echo form_error('barcode') ?></label>
                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="<?php echo $barcode; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Kadarluasa<?php echo form_error('kadarluasa') ?></label>
                        <input type="date" class="form-control" name="kadarluasa" id="kadarluasa" value="<?php echo $kadarluasa; ?>" />
                </div>
                
                <div class="form-group">        
					<label for="varchar">Status Obat </label>
					<div class="form-control">
						<?php 
							$pil_statusobat= array("" => "-- Pilihan --",
													"Boleh Edar" => "Boleh Edar", 
													"Dilarang" => "Dilarang");
							echo form_dropdown('status_obat', $pil_statusobat,$status_obat, ' id="status_obat"'); 
							echo form_error('status_obat') 
						?>   
					</div>
				</div>
                
		        <div class="form-group">
                    <label for="varchar">Jumlah<?php echo form_error('jumlah') ?></label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="sum();" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
	            
	            <div class="form-group">
                    <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" readonly/>
                </div>
                
                <div class="form-group">
                    <label for="varchar">Harga Satuan <?php echo form_error('harga_satuan') ?></label>
                    <input type="hidden" class="form-control" name="harga_satuan" id="harga_satuan" onkeyup="sum();" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" />
                    <input type="text" class="form-control" name="harga_satuan2" id="harga_satuan2" placeholder="Harga Satuan2" value="<?php echo number_format($harga_satuan); ?>" readonly />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Total <?php echo form_error('total') ?></label>
                    <input type="text" class="form-control" name="total" id="total" onkeyup="sum();" placeholder="Total" value="<?php echo $total; ?>" readonly />
                </div>
                
				
	            <button type="submit" class="btn btn-primary">Tambah</button> 
	            <a href="<?php echo site_url('persediaan') ?>" class="btn btn-default">Cancel</a>
            	</form>
            <?php
                }
            ?>
			
		
			