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
         <li><a href="<?php echo $back ?>">Penganggaran Obat</a></li>
        <li class="active"><?php echo $button ?> Penganggaran Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Penganggaran Obat -->  
			<legend><?php echo $button ?> Penganggaran Obat</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('penganggaranobat/update/'.$id_penganggaranobat) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman obat list -->	
			<a href="<?php echo site_url('anggaranobat') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			
			<?php
			    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
			    
			    $data2=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");
                while($result2=mysqli_fetch_array($data2)){
                $nama_obat = $result2["nama_obat"];
                $id_golonganobat = $result2["id_golonganobat"];
                $id_bentukobat = $result2["id_bentukobat"];
                $id_klasifikasimedis = $result2["id_klasifikasimedis"];
                }
                
                $data3=mysqli_query($connect, "select * from tb_golonganobat where id_golonganobat = '$id_golonganobat' ");
                while($result3=mysqli_fetch_array($data3)){
                $golongan_obat = $result3["golongan_obat"];
                }
                
                $data4=mysqli_query($connect, "select * from tb_bentukobat where id_bentukobat = '$id_bentukobat' ");
                while($result4=mysqli_fetch_array($data4)){
                $bentuk_obat = $result4["bentuk_obat"];
                }
                
                $data5=mysqli_query($connect, "select * from tb_klasifikasimedis where id_klasifikasimedis = '$id_klasifikasimedis' ");
                while($result5=mysqli_fetch_array($data5)){
                $klasifikasi_medis = $result5["klasifikasi_medis"];
                }
			?>
			
			 <!-- Menampilkan data obat secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_penganggaranobat; ?></td></tr>
				<tr><td>Nama Obat</td><td><?php echo $nama_obat; ?></td></tr>
				<tr><td>Klasifikasi Medis</td><td><?php echo $id_klasifikasimedis; ?></td></tr>
				<tr><td>Golongan Obat</td><td><?php echo $golongan_obat; ?></td></tr>
				<tr><td>Bentuk Obat</td><td><?php echo $bentuk_obat; ?></td></tr>
				<tr><td>Klasifikasi Medis</td><td><?php echo $klasifikasi_medis; ?></td></tr>
				<tr><td>Netto</td><td><?php echo $netto ; ?></td></tr>
				<tr><td>Jumlah</td><td><?php echo number_format($jumlah)." ".$satuan ; ?></td></tr>
				<tr><td>Harga Satuan (Rp.)</td><td><?php echo number_format($harga_satuan) ; ?></td></tr>
				<tr><td>Total (Rp.)</td><td><?php echo number_format($jumlah*$harga_satuan) ; ?></td></tr>
				<tr><td>Pemohon</td>
				    <td>
				        <?php
				            $data6=mysqli_query($connect, "select * from tb_puskesmas where id_puskesmas = '$id_puskesmas' ");
                            while($result6=mysqli_fetch_array($data6)){
                            echo $result6["nama_puskesmas"];
                            }
                        ?>
				    </td>
				</tr>
				<tr><td>Inputer</td><td><?php echo $inputer; ?></td></tr>
				
			 </table>
