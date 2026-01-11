<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Safina Tour & Travel                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Ujek
        <small>Ojek Online</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Cabang</a></li>
        <li class="active"><?php echo $button ?> Cabang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Cabang -->  
			<legend><?php echo $button ?> Cabang</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('cabang/update/'.$id_cabang) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman cabang list -->	
			<a href="<?php echo site_url('cabang') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data cabang secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>Photo</td><td><img src="../../images/<?php echo $photo; ?>" width=200px></td></tr>
				<tr><td>ID Cabang</td><td><?php echo $id_cabang; ?></td></tr>
				<tr><td>Nama Cabang</td><td><?php echo $nama_cabang; ?></td></tr>
				<tr><td>Handphone</td><td><?php echo $handphone; ?></td></tr>
				<tr><td>Whatsapp</td><td><?php echo $whatsapp; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat_cabang; ?></td></tr>
				<tr><td></td><td><?php echo "Kel. ".$kelurahan.", Kec. ".$kecamatan; ?></td></tr>
				<tr><td></td><td><?php echo "Kab. ".$kabupaten." - ".$propinsi; ?></td></tr>
				<tr><td>Kepala Cabang</td><td><?php echo $kepala_cabang; ?></td></tr>
				<tr><td>No. Handphone Kepala Cabang</td><td><?php echo $hp_kepala; ?></td></tr>
				<tr><td>No. Whatsapp Kepala Cabang</td><td><?php echo $wa_kepala; ?></td></tr>
				<tr><td>Email Kepala Cabang</td><td><?php echo $email_kepala; ?></td></tr>
				<tr><td>Inputer</td><td><?php echo $inputer; ?></td></tr>
			 </table>
