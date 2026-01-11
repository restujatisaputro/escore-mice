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
         <li><a href="<?php echo $back ?>">Pegawai Gudang</a></li>
        <li class="active"><?php echo $button ?> Pegawai Gudang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Pegawai Gudang -->  
			<legend><?php echo $button ?> Pegawai Gudang</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('pegawaigudang/update/'.$id_pegawaigudang) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman pegawai gudang list -->	
			<a href="<?php echo site_url('pegawaigudang') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data pegawaigudang secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_pegawaigudang; ?></td></tr>
				<tr><td>NIP</td><td><?php echo $nip; ?></td></tr>
				<tr><td>Nama Pegawai</td><td><?php echo $nama_pegawai; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
				<tr><td>Nomor Handphone</td><td><?php echo $no_handphone; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email; ?></td></tr>
				<tr><td width='150px'>Photo</td><td><img src="../../images/<?php echo $gambar; ?>" width='150px'></td></tr>
				
			 </table>
