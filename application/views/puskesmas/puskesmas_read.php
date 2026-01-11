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
         <li><a href="<?php echo $back ?>">Puskesmas</a></li>
        <li class="active"><?php echo $button ?> Puskesmas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Puskesmas -->  
			<legend><?php echo $button ?> Puskesmas</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('puskesmas/update/'.$id_puskesmas) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman puskesmas list -->	
			<a href="<?php echo site_url('puskesmas') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data puskesmas secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_puskesmas; ?></td></tr>
				<tr><td>Puskesmas</td><td><?php echo $nama_puskesmas; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email; ?></td></tr>
				<tr><td>Telepon</td><td><?php echo $no_handphone; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
				<tr><td> </td><td><?php echo "Kel. ".$kelurahan.", Kec. ".$kecamatan.", Kab. ".$kabupaten; ?></td></tr>
				<tr><td width='200px'>Photo</td><td><img src="../../images/<?php echo $gambar; ?>" width='250px'></td></tr>
				
			 </table>
