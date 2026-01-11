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
		
			<!-- Tampil Data Obat -->  
			<legend><?php echo $button ?> Obat</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('obat/update/'.$id_obat) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman obat list -->	
			<a href="<?php echo site_url('obat') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data obat secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_obat; ?></td></tr>
				<tr><td>Golongan</td>
				    <td>
				        <?php 
				            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                            $data = mysqli_query($connect, "SELECT * FROM tb_golonganobat WHERE id_golonganobat = '$id_golonganobat' ");
                            while($result=mysqli_fetch_array($data)){	
                            
                            $gambar = $result["gambar"];
                        ?>
                            <img src="https://simo.adiva.click/images/<?php echo $gambar; ?>" width='30px'>
                        &nbsp;&nbsp;
                            
                        <?php
                                echo $result["golongan_obat"];
                            }
    			        ?>
				    </td>
				</tr>
				<tr><td>Bentuk</td><td><?php echo $id_bentukobat; ?></td></tr>
				<tr><td>Klasifikasi Medis</td><td><?php echo $id_klasifikasimedis; ?></td></tr>
				<tr><td>Nama Obat</td><td><?php echo $nama_obat; ?></td></tr>
				<tr><td>Merek</td><td><?php echo $merek; ?></td></tr>
				<tr><td>Barcode</td><td><?php echo $barcode; ?></td></tr>
				<tr><td>Inputer</td><td><?php echo $inputer; ?></td></tr>
				<tr><td width='200px'>Photo</td><td><img src="../../images/<?php echo $photo; ?>" width='250px'></td></tr>
				
			 </table>
