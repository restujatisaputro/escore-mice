<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Dinkes Kabupaten Indragiri Hilir        */
/*-------------------------------------------------------->
<head>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  

<section class="content-header">
      <h1>
        SIMO
        <small>System Informasi Manajemen Obat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anggaran Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Menampilkan Data Anggaran Obat -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Anggaran Obat</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">+ Anggaran Obat</button>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px"><center>No</center></th>
					<th><center>Tanggal</center></th>
					<th><center>Nama Obat</center></th>
					<th><center>Satuan</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Total</center></th>
					<th><center>Peruntukan</center></th>
					<th><center>Status</center></th>
					<th width="200px"><center>Action</center></th>
                </tr>
            </thead>
        
        <?php
            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
            $data = mysqli_query($connect, "select * from tb_penganggaranobat where status='Permohonan' ");
                    
			$no=1; // Nomor urut dalam menampilkan data
				  
			// Menampilkan data Rekening
			foreach($data as $row)
			{
		?>
		    <tr>
		        <td align='center'><?php echo $no++ ; ?></td>
		        <td><?php echo date('d F Y', strtotime($row['tanggal'])); ;?></td>
		        <td>
		            <?php
			            $data2=mysqli_query($connect, "select * from tb_obat where id_obat = '$row[id_obat]' ");
                        while($result2=mysqli_fetch_array($data2)){
                        echo $result2["nama_obat"];
                        }
			        ?>
		        </td>
		        <td><?php echo $row['satuan'];?></td>
		        <td align='right'><?php echo number_format($row['jumlah']);?></td>
		        <td align='right'><?php echo number_format($row['harga_satuan']);?></td>
		        <td align='right'><?php echo number_format($row['jumlah']*$row['harga_satuan']);?></td>
		        <td>
		            <?php
		                $data5=mysqli_query($connect, "select * from tb_puskesmas where id_puskesmas = '$row[id_puskesmas]' ");
                        while($result5=mysqli_fetch_array($data5)){
	                    echo $result5["nama_puskesmas"];
                        }
		            ?>
		        </td>
		        <td><?php echo $row['status'];?></td>
		        <td align='center'>
		            <?php 
						// Button untuk melakukan create bentuk obat
						echo anchor(site_url('anggaranobat/read/'.$row['id_penganggaranobat']), '<i  aria-hidden="true"></i>&nbsp;Lihat', 'class="btn btn-primary"'); 
					?> 
					
					<?php 
						// Button untuk melakukan create bentuk obat
						echo anchor(site_url('anggaranobat/delete/'.$row['id_penganggaranobat']), '<i  aria-hidden="true"></i>&nbsp;Hapus', 'class="btn btn-warning"'); 
					?> 
		        </td>
		    </tr>
		<?php
			}
		?>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        
		<!-- // Menampilkan Data Anggaran Obat -->
		
		
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Tambah Anggaran Obat </h4>
   </div>
   <div class="modal-body">
        <form action="https://simo.adiva.click/anggaranobat/create/" method="POST">
	        <label>Cari Obat :</label>
	        <input type="text" name="cari">
	        <input type="hidden" name="id_obat" value=''>
	        <input type="submit" value="Cari">
        </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>