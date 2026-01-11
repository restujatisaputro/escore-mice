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
		    if($_POST['id_obat']==''){
		?>
		    <form role="form" class="form-horizontal"  action="https://simo.adiva.click/anggaranobat/create/" method="POST" enctype="multipart/form-data">
	            <label>Cari Obat :</label>
	            <input type="text" name="cari">
	            <input type="hidden" name="id_obat">
	            <input type="submit" value="Cari">
            </form>
        <br/>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="80px"><center>No</center></th>
					<th><center>Nama Obat</center></th>
					<th><center>Merek</center></th>
					<th><center>Golongan</center></th>
					<th><center>Bentuk</center></th>
					<th><center>Klasifikasi Medis</center></th>
					<th width="200px"><center>Action</center></th>
                </tr>
            </thead>
            <?php
                $cari = $_POST['cari'];
				$connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                $data = mysqli_query($connect, "select * from tb_obat where id_obat like '%".$cari."%' or nama_obat like '%".$cari."%' or merek like '%".$cari."%' ");
                    
				$no=1; // Nomor urut dalam menampilkan data
				  
				// Menampilkan data Rekening
				foreach($data as $row)
				 {
			?>
			    <tr>
			        <td><?php echo $no++ ; ?></td>
			        <td><?php echo $row['nama_obat'] ; ?></td>
			        <td><?php echo $row['merek'] ; ?></td>
			        <td>
			            <?php
			                $id_golonganobat = $row['id_golonganobat'];
			                $data2=mysqli_query($connect, "select * from tb_golonganobat where id_golonganobat = '$id_golonganobat' ");
                            while($result2=mysqli_fetch_array($data2)){
                            echo $result2["golongan_obat"];
                            }
			            ?>
			        </td>
			        <td>
			            <?php
			                $id_bentukobat = $row['id_bentukobat'];
			                $data3=mysqli_query($connect, "select * from tb_bentukobat where id_bentukobat = '$id_bentukobat' ");
                            while($result3=mysqli_fetch_array($data3)){
                            echo $result3["bentuk_obat"];
                            }
			            ?>
			        </td>
			        <td>
			            <?php
			                $id_klasifikasimedis = $row['id_klasifikasimedis'];
			                $data4=mysqli_query($connect, "select * from tb_klasifikasimedis where id_klasifikasimedis = '$id_klasifikasimedis' ");
                            while($result4=mysqli_fetch_array($data4)){
                            echo $result4["klasifikasi_medis"];
                            }
			            ?>
			        </td>
			        <td>
			            <form role="form" class="form-horizontal"  action="https://simo.adiva.click/anggaranobat/create/" method="post" enctype="multipart/form-data">
				            <input type="hidden" class="form-control" name="id_obat" id="id_obat" value="<?php echo $row['id_obat']; ?>" />
				            <input type="hidden" class="form-control" name="cari" id="cari" value="<?php echo $cari; ?>" />
				        <button type="submit" class="btn btn-primary">Tambah Anggaran</button> 
				        </form>  
			        </td>
			    </tr>
			<?php
			 }
			?>
	    
        </table>
		<?php
		    }
		else{
		?>
		
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
					<label class="col-sm-2" for="varchar">Satuan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
						<?php echo form_error('satuan') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Jumlah</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="sum();" placeholder="Contoh : 1000" value="<?php echo $jumlah; ?>" />
						<?php echo form_error('jumlah') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Harga Satuan</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="harga_satuan" id="harga_satuan" onkeyup="sum();" placeholder="Contoh : 5000" value="<?php echo $harga_satuan; ?>" />
						<?php echo form_error('harga_satuan') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Total</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="total" id="total" onkeyup="sum();"  placeholder ="Total" value="<?php echo $total; ?>" />
						<?php echo form_error('total') ?>
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
                        <div class="col-sm-4">
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
				
				<input type="hidden" class="form-control" name="inputer" id="inputer"  value="<?php echo $username; ?>" />
				<input type="hidden" class="form-control" name="status" id="status"  value="Permohonan" />
				<input type="hidden" class="form-control" name="tanggal" id="tanggal"  value="<?php echo date('Y-m-d'); ?>" />
				
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('anggaranobat') ?>" class="btn btn-default">Cancel</a>
				</form>
		
		
		<?php
		}    
		?>
		
		
		
		
		
		
		