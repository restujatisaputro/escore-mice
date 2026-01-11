<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : SMK Negeri 1 Rengat                     */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Bank Syariah Al-Kautsar
        <small>SMK Negeri 1 Rengat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Setoran</a></li>
        <li class="active">Terima Setoran</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Rekening -->   
			<legend><font color='blue'>Terima Setoran</font></legend>
			
			<!-- Button untuk melakukan update -->
		    <a href="<?php echo site_url('setoran/update/'.$no_rekening ) ?> " class="btn btn-primary">Setoran</a>
			<!-- Button cancel untuk kembali ke halaman rekening list -->
			<a href="<?php echo site_url('setoran') ?>" class="btn btn-warning">Kembali</a>
			<p></p>
			<table class="table table-striped table-bordered">
				<tr>
				    <td>Nomor Rekening</td><td><?php echo $no_rekening; ?></td>
				    <td>Nomor CIF</td><td><?php echo $no_cif; ?></td>
				</tr>
				<tr>
				    <td>Tabungan</td>
				    <td>
				        <?php 
				            $connect=mysqli_connect("localhost", "u197914754_smkn1", "Andri13021980", "u197914754_smkn1");
			                $data=mysqli_query($connect, "select * from tb_funding where id_funding = '$id_funding' ");
                            while($result=mysqli_fetch_array($data)){
	                        echo $result["nama_produk"];
	                        $bagi_hasil = $result["bagi_hasil"] ;
	                        $akad = $result["akad"] ;
                            }
				        ?>
				    </td>
				    <td>Tanggal Buka </td>
				    <td><?php echo $tanggal_buka ; ?> </td>
				</tr>
				<tr>
				    <td>Nama Nasabah </td><td><?php echo $nama_rekening; ?></td>
				    <td>Akad</td><td><?php echo $akad ; ?></td>
				    
				</tr>
				<tr>
				    <td>Alamat</td>
				    <td>
				        <?php 
				            $data2=mysqli_query($connect, "select * from tb_cif where no_cif = '$no_cif' ");
                            while($result2=mysqli_fetch_array($data2)){
	                        echo $result2["alamat"];
                            }
				        ?>
				    
				    </td>
				    <td>Bagi Hasil</td>
				    <td>
				        <?php echo $bagi_hasil." %" ; ?>
				    </td>
				</tr>
				<tr>
				    <td>Total Debet</td>
				    <td>
				        <?php 
		                    $data4 = mysqli_query($connect, "SELECT SUM(debet) AS jumlah_debet FROM tb_transaksirek WHERE no_rekening = '$no_rekening' ");
                            while($result4=mysqli_fetch_array($data4)){	echo "Rp. ".number_format($result4["jumlah_debet"]);}
                        ?>
				    </td>
				    <td>Total Kredit</td>
				    <td>
				        <?php 
		                    $data5 = mysqli_query($connect, "SELECT SUM(kredit) AS jumlah_kredit FROM tb_transaksirek WHERE no_rekening = '$no_rekening' ");
                            while($result5=mysqli_fetch_array($data5)){	echo "Rp. ".number_format($result5["jumlah_kredit"]);}
                        ?>
				    </td>
				</tr>
				<tr>
				    <td>Saldo Rekening</td>
				    <td>
				        <?php
				            $data4 = mysqli_query($connect, "SELECT SUM(debet) AS jumlah_debet FROM tb_transaksirek WHERE no_rekening = '$no_rekening' ");
                            while($result4=mysqli_fetch_array($data4)){	$total_debet = $result4["jumlah_debet"] ;}
                            
                            $data5 = mysqli_query($connect, "SELECT SUM(kredit) AS jumlah_kredit FROM tb_transaksirek WHERE no_rekening = '$no_rekening' ");
                            while($result5=mysqli_fetch_array($data5)){	$total_kredit =$result5["jumlah_kredit"];}
                            
                            echo "Rp. ". number_format(($total_kredit - $total_debet));
				        ?>
				    </td>
				</tr>
			</table>
			
			<h4><font color='Blue'>&nbsp;&nbsp;Mutasi Rekening</font></h4>
			
			<table class="table table-bordered table-striped" id="mytable">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Keterangan</th>				
					<th>Debet</th>
					<th>Kredit</th>
					<th>Saldo</th>
				</tr>
			</thead>
			
			<?php
			    $connect=mysqli_connect("localhost", "u197914754_smkn1", "Andri13021980", "u197914754_smkn1");
                $data3 = mysqli_query($connect, "select * from tb_transaksirek where no_rekening = '$no_rekening' ");
                    
			    $no=1; // Nomor urut dalam menampilkan data
				  
			    // Menampilkan data Penganggaran Obat
			    foreach($data3 as $row3)
		        {
		    ?>
		        <tr>
		            <td><?php echo $no++ ; ?></td>
		            <td><?php echo $row3['tanggal'] ; ?></td>
		            <td><?php echo $row3['keterangan'] ; ?></td>
		            <td align='right'><?php echo number_format($row3['debet']) ; ?></td>
		            <td align='right'><?php echo number_format($row3['kredit']) ; ?></td>
		            <td align='right'><?php echo number_format($row3['saldo']) ; ?></td>
		        </tr>
		    <?php
		        }
		    ?>
			
			</table>
			<!--// Tampil Data Rekening -->  