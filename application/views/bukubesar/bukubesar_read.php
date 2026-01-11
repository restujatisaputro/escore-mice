<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Manajemen                               */
/*-------------------------------------------------------->

<head>
  <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
  <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
</head>


<section class="content-header">
      <h1>
        CV Adiva
        <small>Manajemen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Buku Besar</a></li>
        <li class="active"><?php echo $button ?> Buku Besar</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Buku Besar -->  
			<legend><?php echo $button ?> Buku Besar</legend>
				
			<!-- Button cancel untuk kembali ke halaman bukubesar list -->	
			<a href="<?php echo site_url('bukubesar') ?>" class="btn btn-warning">Kembali</a>
			<p></p>
			 <!-- Menampilkan data mahasiswa secara detail -->
			 <table class="table table-striped table-bordered">
				<tr>
				    <td>Kode Account</td><td><?php echo $kode_account; ?></td>
				    <td>Nama Account</td><td><?php echo $nama_account; ?></td>
				</tr>
				<tr>
				    <td width='25%'>Total Debet</td>
				    <td width='25%' align='right'>Rp.&nbsp;
				        <?php
				            $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
                            $data = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_nominal_d FROM tb_jurnalumum WHERE account_d = '$kode_account' ");
                            while($result=mysqli_fetch_array($data)){ echo number_format($result["total_nominal_d"]) ; $total_nominal_d = $result["total_nominal_d"] ; }
                        ?>
				    </td>
				    <td width='25%'>Total Kredit</td>
				    <td width='25%' align='right'>Rp.&nbsp;
				        <?php
                            $data2 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_nominal_k FROM tb_jurnalumum WHERE account_k = '$kode_account' ");
                            while($result2=mysqli_fetch_array($data2)){ echo number_format($result2["total_nominal_k"]) ; $total_nominal_k = $result2["total_nominal_k"] ; }
                        ?>
				    </td>
				</tr>
				<tr>
				    <td>Posisi</td>
				    <td><?php echo $posisi ; ?></td>
				    <td>Saldo</td>
				    <td align='right'>Rp.&nbsp;
				        <?php
				            if($posisi == 'D'){
				                echo number_format($total_nominal_d - $total_nominal_k) ;
				            }
				            if($posisi == 'K'){
				                echo number_format($total_nominal_k - $total_nominal_d) ;
				            }
				            
				        ?>
				    </td>
				</tr>
			 </table>

<!-- JavaScript yang berfungsi untuk menampilkan data dari tabel mahasiswa dengan AJAX -->
			<div id="table-gridjs2"></div>
			
			
  <script>
    new gridjs.Grid({
        search: true,
      sort: true,
      pagination: {
        limit: 10
      },
      
      columns: ["No","Tanggal","Keterangan","Debet","Kredit","Action"],
      data: [
        <?php
            $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
            $data = mysqli_query($connect, "select * from tb_jurnalumum WHERE account_d = '$kode_account' or account_k ='$kode_account' ");
                    
			$no=1; // Nomor urut dalam menampilkan data
				  
			// Menampilkan data Rekening
			foreach($data as $row)
			{
			    if($row['account_d'] == $kode_account){
			        echo "['".$no++."', '".$row["tanggal"]."', '".$row["keterangan"]."', '".number_format($row["nominal_d"])."' , '"."0"."'," 
			    
			    
		?>    
	        gridjs.html(`<a href='https://adiva.click/manajemen/jurnalumum/read/<?php echo $row['id_jurnalumum'] ; ?>'>Lihat </a> &nbsp;&nbsp; <a href='https://adiva.click/manajemen/jurnalumum/update/<?php echo $row['id_jurnalumum']; ?>'>Edit </a>`)
		<?php
			    
			echo "]," ;    
			    }if($row['account_k'] == $kode_account){
			        echo "['".$no++."', '".$row["tanggal"]."', '".$row["keterangan"]."', '"."0"."' , '".number_format($row["nominal_k"])."'," 
			    
			    
		?>    
	        gridjs.html(`<a href='https://adiva.click/manajemen/jurnalumum/read/<?php echo $row['id_jurnalumum'] ; ?>'>Lihat </a> &nbsp;&nbsp; <a href='https://adiva.click/manajemen/jurnalumum/update/<?php echo $row['id_jurnalumum']; ?>'>Edit </a>`)
		<?php
			    
			echo "]," ;
			    }
			}    
        ?>
        
      ]
      
    }).render(document.getElementById("table-gridjs2"));
  </script>
  
  
		<!--// Tampil Data Satuan -->    
