<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Ujek                                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>Ojek, Belanja & Kurir Online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Mitra </a></li>
        <li class="active"><?php echo $button ?> Mitra</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Mahasiswa -->  
			<legend><?php echo $button ?> Mitra</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('mitra/update/'.$id_mitra) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman mitra list -->	
			<a href="<?php echo site_url('mitra') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data mahasiswa secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>Id Mitra</td><td><?php echo $id_mitra; ?></td></tr>
				<tr><td>Nama Usaha</td><td><?php echo $nama_usaha; ?></td></tr>
				<tr><td>Nama Pemilik</td><td><?php echo $nama_pemilik; ?></td></tr>
				<tr><td>Nomor Handphone</td><td><?php echo $no_handphone; ?></td></tr>
				<tr><td>Nomor WhatsApp</td><td><?php echo $no_whatsapp; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat_mitra; ?></td></tr>
				<tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
				<tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
				<tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
				<tr><td>Status</td><td><?php echo $status ; ?></td></tr>
			 </table>
