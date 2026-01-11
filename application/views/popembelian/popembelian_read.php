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
		
			<!-- Tampil Data Purchase Order -->  
			<legend> Purchase Order</legend>
			
			 <!-- Menampilkan data popembelian secara detail -->
			 <table class="table table-striped table-bordered">
				<tr>
				    <td>Supplier</td>
				    <td>
				        <?php
				            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
				            $data=mysqli_query($connect, "select * from tb_supplier where id_supplier = '$id_supplier' ");
                            while($result=mysqli_fetch_array($data)){
	                        echo $result["nama_supplier"];
	                        $alamat_supplier = $result["alamat_supplier"];
	                        $no_handphone = $result["no_handphone"];
	                        $email = $result["email"];
                            }
                        ?>
				    </td>
				    
				    <td>Tanggal</td>
				    <td><?php echo $tanggal ; ?></td>
				</tr>
				<tr>
				    <td>Telepon</td>
				    <td>
				        <?php echo $no_handphone ; ?>
				    </td>
				    <td>No. Purchase Order</td><td><?php echo $inv_no; ?></td>
				
				</tr>
				<tr>
				    <td>Email</td>
				    <td><?php echo $email ; ?></td>
				    <td>Keterangan</td>
				    <td><?php echo $keterangan ; ?></td>
				</tr>
				
				<tr>
				    <td>Alamat</td><td><?php echo $alamat_supplier ; ?></td>
				</tr>
				
			 </table>
			 
			 <br/>
			 
			 <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px"><center>No</center></th>
					<th><center>Nama Obat</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Satuan</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Total</center></th>
					<th width="200px"><center>Action</center></th>
                </tr>
            </thead>
	        
	        <?php
			    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                $data4=mysqli_query($connect, "select * from tb_pembelianobat ");
                    
			    $no=1; // Nomor urut dalam menampilkan data
				  
			    // Menampilkan data Penganggaran Obat
			    foreach($data4 as $row2)
		        {
		  ?>
		        
		        <tr>
		            <td align='center'><?php echo $no++ ; ?></td>
		            <td>
		                <?php
		                    $data5=mysqli_query($connect, "select * from tb_obat where id_obat = '$row2[id_obat]' ");
                            while($result5=mysqli_fetch_array($data5)){
                            echo $result5["nama_obat"];
                        }
		            ?>  
		            </td>
		            <td align='right'><?php echo number_format($row2['jumlah']) ; ?></td>
		            <td><?php echo $row2['satuan'];?></td>
		            <td align='right'><?php echo number_format($row2['harga_satuan']);?></td>
		            <td align='right'><?php echo number_format($row2['harga_satuan']*$row2['jumlah']);?></td>
		            <td>
		                <form action="https://simo.adiva.click/pembelianobat/update/<?php echo $row2['id_pembelianobat'] ; ?>" method="post">
				            <input type="hidden" class="form-control" name="id_pembelianobat" id="id_pembelianobat"  value="<?php echo $row2['id_pembelianobat']; ?>" />
				            <input type="hidden" class="form-control" name="id_obat" id="id_obat"  value="<?php echo $row2['id_obat']; ?>" />
					    
				        <button type="submit" class="btn btn-primary">Edit</button> 
			        </form> 
		            </td>
		        </tr>
		        
		    
		<?php
		}
		?>
		
		        <tr>
		            <td colspan='5' align='right'><b>TOTAL</b></td>
		            <td align='right'><b>
		                <?php 
					        $data2 = mysqli_query($connect, "SELECT SUM(total) AS jumlah_total FROM tb_pembelianobat WHERE inv_no = '$inv_no' ");
                            while($result2=mysqli_fetch_array($data2)){	echo number_format($result2["jumlah_total"]);}
					    ?>
					    </b>
		            </td>
		        </tr>
	        
        </table>
        
        

        <br/>
        <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Tambah Obat</button>
        
</div>
</div>
</div>
</div>
        
        
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Tambah Obat </h4>
   </div>
   <div class="modal-body">
        <table class="table table-bordered table table-striped" style="margin-bottom: 10px;">
				<tr>
					<th><center>No</center></th>
					<th><center>Obat</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Satuan </center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Total</center></th>
					<th><center>Action</center></th>
				</tr>
		
		<?php
			$connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
            $data2=mysqli_query($connect, "select * from tb_penganggaranobat where status = 'Permohonan' ");
                    
			$no=1; // Nomor urut dalam menampilkan data
				  
			// Menampilkan data Penganggaran Obat
			foreach($data2 as $row)
		{
		?>
		    <tr>
		        <td><?php echo $no++ ; ?></td>
		        <td>
		            <?php
		                $data3=mysqli_query($connect, "select * from tb_obat where id_obat = '$row[id_obat]' ");
                        while($result3=mysqli_fetch_array($data3)){
                        echo $result3["nama_obat"];
                        }
		            ?>
		        </td>
		        <td align='right'>
		            <?php echo number_format($row['jumlah']);?>
		        </td>
		        <td>
		            <?php echo $row['satuan'];?>
		        </td>
		        <td align='right'>
		            <?php echo number_format($row['harga_satuan']); ?>
		        </td>
		        <td align='right'>
		            <?php echo number_format($row['jumlah']*$row['harga_satuan']);?>
		        </td>
		        <td>
		            <form action="https://simo.adiva.click/script/input_obat_popembelian.php" method="post">
				        <input type="hidden" class="form-control" name="id_obat" id="id_obat"  value="<?php echo $row['id_obat']; ?>" />
					    <input type="hidden" class="form-control" name="id_penganggaranobat" id="id_penganggaranobat" value="<?php echo $row['id_penganggaranobat'];?>" />
					    <input type="hidden" class="form-control" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier ; ?>" />
					    <input type="hidden" class="form-control" name="inv_no" id="inv_no" value="<?php echo $inv_no ; ?>" />
					    <input type="hidden" class="form-control" name="pembayaran" id="pembayaran" value="<?php echo $pembayaran ; ?>" />
					    <input type="hidden" class="form-control" name="satuan" id="satuan" value="<?php echo $row['satuan'] ; ?>" />
					    <input type="hidden" class="form-control" name="jumlah" id="jumlah" value="<?php echo $row['jumlah'] ; ?>" />
					    <input type="hidden" class="form-control" name="harga_satuan" id="harga_satuan" value="<?php echo $row['harga_satuan'] ; ?>" />
					    <input type="hidden" class="form-control" name="total" id="total" value="<?php echo $row['jumlah']*$row['harga_satuan'] ; ?>" />
					    <input type="hidden" class="form-control" name="inputer" id="inputer" value="<?php echo $username ; ?>" />
				
				        <button type="submit" class="btn btn-primary">Pilih</button> 
			        </form> 
		        </td>
		    </tr>
		<?php
		}
		?>
		
				
		<table/>
   </div>
   
  </div>
 </div>
</div>