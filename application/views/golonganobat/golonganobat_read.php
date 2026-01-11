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
         <li><a href="<?php echo $back ?>">Golongan Obat</a></li>
        <li class="active"><?php echo $button ?> Golongan Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Golongan Obat -->  
			<legend><?php echo $button ?> Golongan Obat</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('golonganobat/update/'.$id_golonganobat) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman golongan obat list -->	
			<a href="<?php echo site_url('golonganobat') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data golonganobat secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_golonganobat; ?></td></tr>
				<tr><td>Golongan Obat</td><td><?php echo $golongan_obat; ?></td></tr>
				<tr><td width='150px'>Tanda Gambar</td><td><img src="../../images/<?php echo $gambar; ?>" width='50px'></td></tr>
				
			 </table>
