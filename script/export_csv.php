<?php 
include "conn.php";


        // fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");
         
        // membuat nama file ekspor "export-to-excel.xls"
        header("Content-Disposition: attachment; filename=export_csv.xls");
        
        $connect=mysqli_connect($host, $user, $password, $database);
        
		$id_website = $_POST['id_website'];
		$alamat_website = $_POST['alamat_website'];
?>
<body>
    <table class="table table-striped table-bordered">
	    <tr><td>Alamat Website</td><td><?php echo $alamat_website ; ?></td></tr>
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

</body>