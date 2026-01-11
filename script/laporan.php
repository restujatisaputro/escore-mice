<?php
// $host = "localhost";
// $user = "escore-mice";
// $password = "uVHAxf9lPFsOShSnSnjWfZ6Bt";
// $database = "escore_mice";
include "conn.php";

?>
<head>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>

<h4>OFFICIAL LEISURE TOURISM WEBSITE (GREEN D WEB VARIABLES)</h4>
    <table cellspacing='0'>
		<thead>
			<tr>
	    		<th rowspan='2'>No</th>
				<th rowspan='2'>Indicators</th>
				
				<?php 
				$connect=mysqli_connect($host, $user, $password, $database);
				$sql = "SELECT COUNT(*) AS total_rows FROM tb_website";  // Ganti 'your_table' dengan nama tabel Anda
				$result = $connect->query($sql);
				if ($result->num_rows > 0) {
				    $row = $result->fetch_assoc();
				    $total_rows = $row['total_rows'];
				}else{
				}

				for ($i=1; $i <= $total_rows; $i++) { 
					echo "<th> Web $i </th>";
				}
				?>
			</tr>
				<tr>
					<?php
					for ($i=1; $i <= $total_rows ; $i++) { 
						echo "<th align='center'>";
						$data1 = mysqli_query($connect, "select * from tb_website where id_website = '$i' ");
                                while($result1 = mysqli_fetch_array($data1)){
	                                echo $result1["alamat_website"];
	                    echo "</br>";
	                    echo $result1["negara"];

	                        }
	                    echo "</th>";

					}                    
                        ?>   
				</tr>
			</thead>
			<tbody>
			    <?php
                    $data11 = mysqli_query($connect, "select * from tb_indikator where kelompok = 'GREEN D WEB VARIABLES' ORDER BY id_indikator ASC ");
			        $no=1; // Nomor urut dalam menampilkan data		  
			        // Menampilkan data Penganggaran Obat
			        foreach($data11 as $row11)
		            {
			    ?>
			        <tr>
			            <td><?php echo $no++ ; ?></td>
			            <td><?php echo $row11['indikator'] ; ?></td>
			            
			                <?php
			                for ($i=1; $i <= $total_rows; $i++) { 
			                echo "<td>";
			                    $data11 = mysqli_query($connect, "SELECT nilai_indikator AS nilai_key1 FROM tb_analisakeyword WHERE id_website = '$i' and id_indikator ='$row11[id_indikator]' ");
                                    while($result11=mysqli_fetch_array($data11)){	
                                    $nilai_key_1 = $result11["nilai_key1"];
                                    if($nilai_key_1 > 0){
                                        echo 1 ;
                                    }else{ echo 0 ; }
									// $totals = $totals+$nilai_key_1;
                            }
                            echo "</td>";
		                    }
			                ?>
			            
			        </tr>
			    <?php
		            }
					echo "<td></td>";
					echo "<td><b>Total</b></td>";
					for ($i=1; $i <= $total_rows; $i++) { 
						echo "<td><b>";
							$data11 = mysqli_query($connect, "SELECT sum(nilai_indikator) AS nilai_key1 FROM tb_analisakeyword WHERE id_website = '$i' and kelompok='GREEN D WEB VARIABLES'; ");
								while($result11=mysqli_fetch_array($data11)){	
								$nilai_key_1 = $result11["nilai_key1"];
								
									echo $nilai_key_1;
						}
						echo "</b></td>";
						}
		        ?>
			</tbody>
			</table>
</br>

<h4>OFFICIAL Website (MICE or CVB)</h4>
    <table cellspacing='0'>
		<thead>
			<tr>
	    		<th rowspan='2'>No</th>
				<th rowspan='2'>Indicators</th>
				<?php
				for ($i=1; $i <= $total_rows; $i++) { 
					echo "<th> Web $i </th>";
				}
				?>
			</tr>
		
				<tr>
				    <?php
					for ($i=1; $i <= $total_rows ; $i++) { 
						echo "<th align='center'>";
						$data1 = mysqli_query($connect, "select * from tb_website where id_website = '$i' ");
                                while($result1 = mysqli_fetch_array($data1)){
	                                echo $result1["alamat_website"];
	                    echo "</br>";
	                    echo $result1["negara"];

	                        }
	                    echo "</th>";

					}                    
                        ?>  
				</tr>
			</thead>
			<tbody>
			    <?php
                    $data11 = mysqli_query($connect, "select * from tb_indikator where kelompok = 'MICE or CVB' ORDER BY id_indikator ASC ");
                    
			        $no=1; // Nomor urut dalam menampilkan data
				  
			        // Menampilkan data Penganggaran Obat
			        foreach($data11 as $row11)
		            {
			    ?>
			        <tr>
			            <td><?php echo $no++ ; ?></td>
			            <td><?php echo $row11['indikator'] ; ?></td>
			            
			                <?php
			                
			                for ($i=1; $i <= $total_rows; $i++) { 
		                	echo "<td>";
			                    $data11 = mysqli_query($connect, "SELECT nilai_indikator AS nilai_key1 FROM tb_analisakeyword WHERE id_website = '$i' and id_indikator ='$row11[id_indikator]' ");
                                    while($result11=mysqli_fetch_array($data11)){	
                                    $nilai_key_1 = $result11["nilai_key1"];
                                    if($nilai_key_1 > 0){
                                        echo 1 ;
                                    }else{ echo 0 ; }
                            }
                            echo "</td>";
		                    }
			                ?>
			            
			            
			        </tr>
			    <?php
		            }
					echo "<td></td>";
					echo "<td><b>Total</b></td>";
					for ($i=1; $i <= $total_rows; $i++) { 
						echo "<td><b>";
							$data11 = mysqli_query($connect, "SELECT sum(nilai_indikator) AS nilai_key1 FROM tb_analisakeyword WHERE id_website = '$i' and kelompok='MICE or CVB'; ");
								while($result11=mysqli_fetch_array($data11)){	
								$nilai_key_1 = $result11["nilai_key1"];
								
									echo $nilai_key_1;
						}
						echo "</b></td>";
						}
		        ?>
			</tbody>
			</table>

</br>
<center>
    <form action="<?php echo 'https://'.$baseur.'/script/export_laporan.php'?>" method="POST">
			
			    <button type="submit" class="btn btn-primary">Export CSV</button>
		    </form>
</center>