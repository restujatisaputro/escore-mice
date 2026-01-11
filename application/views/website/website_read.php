<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Green                                   */
/*-------------------------------------------------------->
<section class="content-header">
	<?php
	$host = "localhost";
    $user = "rest6794_imam";
    $password = "R3m3mb3rm3!";
    $database = "rest6794_imam";
	 ?>
      <h1>
        Green
        <small>Automated Checklist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Website </a></li>
        <li class="active"><?php echo $button ?> Website</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Mahasiswa -->  
			<legend><?php echo $button ?> Website</legend>
			
			<form action="https://imam.restujati.com/script/export_csv.php" method="POST">
			    <input type="hidden" class="form-control" name="id_website" id="id_website" value="<?php echo $id_website ; ?>" />
			    <input type="hidden" class="form-control" name="alamat_website" id="alamat_website" value="<?php echo $alamat_website ; ?>" />
			
			    <button type="submit" class="btn btn-primary">Export CSV</button>
		    </form>	
		
			<p></p>
			 <!-- Menampilkan data website secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>Id Website</td><td><?php echo $id_website; ?></td></tr>
				<tr><td>Alamat Website</td><td><?php echo $alamat_website ; ?></td></tr>
				<tr><td>Negara</td><td><?php echo $negara ; ?></td></tr>
			 </table>
			 
			 </br>
			 <h4>OFFICIAL LEISURE TOURISM WEBSITE (GREEN D WEB VARIABLES)</h4>
			 <table class="table table-striped table-bordered">
			    <tr>
			        <th>No</th>
			        <th>Keyword</th>
			        <th>Hasil</th>
			    </tr>
			    <?php
			        $connect=mysqli_connect($host, $user, $password, $database);
                    $data = mysqli_query($connect, "select * from tb_indikator where kelompok = 'GREEN D WEB VARIABLES' ");
                    
			        $no=1; // Nomor urut dalam menampilkan data
				  
			        // Menampilkan data Penganggaran Obat
			        foreach($data as $row)
		            {
			    ?>
			        <tr>
			            <td><?php echo $no++ ; ?></td>
			            <td><?php echo $row['indikator'] ; ?></td>
			            <td>
			                <?php
			                    $result2 = mysqli_query($connect, "SELECT nilai_indikator AS value_sum from tb_analisakeyword WHERE id_website = '$id_website' and id_indikator = '$row[id_indikator]'  "); 
                                $row2 = mysqli_fetch_assoc($result2); 
                                $sum = $row2['value_sum'];
                                if($sum > 0){
                                    echo 1 ;
                                }else{ echo 0 ;}
		                        
			                ?>
			            
			            </td>
			        </tr>
	            <?php
		            }
	            ?>
    		 </table>
    		 
    		 </br>
			 <h4>OFFICIAL Website (MICE or CVB)</h4>
			 <table class="table table-striped table-bordered">
			    <tr>
			        <th>No</th>
			        <th>Keyword</th>
			        <th>Hasil</th>
			    </tr>
			    <?php
			        $connect=mysqli_connect($host, $user, $password, $database);
                    $data3 = mysqli_query($connect, "select * from tb_indikator where kelompok = 'MICE or CVB'  ");
                    
			        $no=1; // Nomor urut dalam menampilkan data
				  
			        // Menampilkan data Penganggaran Obat
			        foreach($data3 as $row3)
		            {
			    ?>
			        <tr>
			            <td><?php echo $no++ ; ?></td>
			            <td><?php echo $row3['indikator'] ; ?></td>
			            <td>
			                <?php
			                    $result3 = mysqli_query($connect, "SELECT nilai_indikator AS value_sum from tb_analisakeyword WHERE id_website = '$id_website' and id_indikator = '$row3[id_indikator]'  "); 
                                $row3 = mysqli_fetch_assoc($result3); 
                                $sum3 = $row3['value_sum'];
                                if($sum3 > 0){
                                    echo 1 ;
                                }else{ echo 0 ;}
		                        
			                ?>
			            
			            </td>
			        </tr>
	            <?php
		            }
	            ?>
    		 </table>
			 
			 
