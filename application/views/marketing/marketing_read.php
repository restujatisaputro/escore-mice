<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Safina Tour & Travel                    */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        SAFINA
        <small>Tour & Travel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Marketing</a></li>
        <li class="active"><?php echo $button ?> Marketing</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Marketing -->  
			<legend><?php echo $button ?> Marketing</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('marketing/update/'.$id_marketing) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman obat list -->	
			<a href="<?php echo site_url('marketing') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data marketing secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID</td><td><?php echo $id_marketing; ?></td></tr>
				<tr><td>Nomor NIK/KTP</td><td><?php echo $ktp ; ?></td></tr>
				<tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
				<tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
				<tr><td>Tempat & Tanggal Lahir</td><td><?php echo $tempat_lahir.", ".date('d F Y', strtotime($tanggal_lahir)) ; ?></td></tr>
				<tr><td>Nomor Handphone</td><td><?php echo $no_handphone; ?></td></tr>
				<tr><td>Nomor Whatsapp</td><td><?php echo $no_whatsapp; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email ; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
				<tr><td></td><td><?php echo "Kel. ".$kelurahan.", Kec. ".$kecamatan; ?></td></tr>
				<tr><td></td><td><?php echo "Kab. ".$kabupaten.", Propinsi ".$propinsi; ?></td></tr>
				<tr><td>Status</td><td><?php echo $status; ?></td></tr>
				<tr>
				    <td>Cabang</td>
				    <td>
				        <?php 
				            $connect=mysqli_connect("localhost", "u197914754_safinatour", "Andri13021980", "u197914754_safinatour");
				            $data=mysqli_query($connect, "select * from tb_cabang where id_cabang = '$id_cabang' ");
                            while($result=mysqli_fetch_array($data)){
	                        echo $result["nama_cabang"];
                            }
				        ?>
				    </td>
				</tr>
				<tr><td width='200px'>Photo</td><td><img src="../../images/<?php echo $photo; ?>" width='250px'></td></tr>
				
			 </table>
