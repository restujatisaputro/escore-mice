<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Manajemen                               */
/*-------------------------------------------------------->
	<section class="content-header">
      <h1>
        CV Adiva
        <small>Manajemen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Neraca</a></li>
        <li class="active">Neraca</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
	        <!-- Form input dan edit Setoran-->
		    <legend>Neraca</legend>	
		    
		    <?php
		        $bulan = $_POST['bulan'];
		        $tahun = $_POST['tahun'];
		        $tgl_awal = "2024-01-01" ;
		        $tgl_akhir = $tahun."-".$bulan."-31";
		    ?>
		    
		    <h4><center>N E R A C A</center></h4>
		    <h4><center><?php echo $bulan."-".$tahun ; ?></center></h4>
		    
            <table class="table table-bordered table-striped" id="mytable">
		        <tr>
		            <td colspan='8'><b>AKTIVA</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td colspan='7'><b>Aktiva Lancar</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='6'><b>Kas</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.01.01</td>
		            <td>Kas</td>
		            <td align='right'>
		                <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data1 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d1 FROM tb_jurnalumum WHERE account_d = '11.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result1=mysqli_fetch_array($data1)){	
                                if($result1["total_d1"]==''){
                                    $total_d1 = 0 ;
                                }else{$total_d1 = $result1["total_d1"];}
                            }
                        
                            $data2 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k2 FROM tb_jurnalumum WHERE account_k = '11.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result2=mysqli_fetch_array($data2)){	
                                $total_k2 = $result2["total_k2"];
                                if($result2["total_k2"]==''){
                                    $total_k2 = 0 ;
                                }else{$total_k2 = $result2["total_k2"];}
                            }
                            
                            $kas = $total_d1 - $total_k2 ;
                        
                        echo number_format($total_d1 - $total_k2);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.01.02</td>
		            <td>Rekening Bank</td>
		            <td align='right'>
		                <?php
		                    $data3 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d3 FROM tb_jurnalumum WHERE account_d = '11.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result3=mysqli_fetch_array($data3)){	
                                if($result3["total_d3"]==''){
                                    $total_d3 = 0 ;
                                }else{$total_d3 = $result3["total_d3"];}
                            }
                        
                            $data4 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k4 FROM tb_jurnalumum WHERE account_k = '11.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result4=mysqli_fetch_array($data4)){	
                                $total_k4 = $result4["total_k4"];
                                if($result4["total_k4"]==''){
                                    $total_k4 = 0 ;
                                }else{$total_k4 = $result4["total_k4"];}
                            }
                            
                            $rekening_bank = $total_d3 - $total_k4 ;
                        
                        echo number_format($total_d3 - $total_k4);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.01.03</td>
		            <td>Kas Kecil</td>
		            <td align='right'>
		                <?php
		                    $data5 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d5 FROM tb_jurnalumum WHERE account_d = '11.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result5=mysqli_fetch_array($data5)){	
                                if($result5["total_d5"]==''){
                                    $total_d5 = 0 ;
                                }else{$total_d5 = $result5["total_d5"];}
                            }
                        
                            $data6 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k6 FROM tb_jurnalumum WHERE account_k = '11.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result6=mysqli_fetch_array($data6)){	
                                $total_k6 = $result6["total_k6"];
                                if($result6["total_k6"]==''){
                                    $total_k6 = 0 ;
                                }else{$total_k6 = $result6["total_k6"];}
                            }
                            
                            $kas_kecil = $total_d5 - $total_k6 ;
                        
                        echo number_format($total_d5 - $total_k6);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.01.04</td>
		            <td>Panjar</td>
		            <td align='right'>
		                <?php
		                    $data7 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d7 FROM tb_jurnalumum WHERE account_d = '11.01.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result7=mysqli_fetch_array($data7)){	
                                if($result7["total_d7"]==''){
                                    $total_d7 = 0 ;
                                }else{$total_d7 = $result7["total_d7"];}
                            }
                        
                            $data8 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k8 FROM tb_jurnalumum WHERE account_k = '11.01.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result8=mysqli_fetch_array($data8)){	
                                $total_k8 = $result8["total_k8"];
                                if($result8["total_k8"]==''){
                                    $total_k8 = 0 ;
                                }else{$total_k8 = $result8["total_k8"];}
                            }
                            
                            $panjar = $total_d7 - $total_k8 ;
                        
                        echo number_format($total_d7 - $total_k8);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='4'><b>Total Kas</b></td>
		            <td align='right'><b><?php echo number_format($kas + $rekening_bank + $kas_kecil + $panjar) ; ?></b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='6'><b>Piutang</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.02.01</td>
		            <td>Piutang Lancar</td>
		            <td align='right'>
		                <?php
		                    $data9 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d9 FROM tb_jurnalumum WHERE account_d = '11.02.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result9=mysqli_fetch_array($data9)){	
                                if($result9["total_d9"]==''){
                                    $total_d9 = 0 ;
                                }else{$total_d9 = $result9["total_d9"];}
                            }
                        
                            $data10 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k10 FROM tb_jurnalumum WHERE account_k = '11.02.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result10=mysqli_fetch_array($data10)){	
                                $total_k10 = $result10["total_k10"];
                                if($result10["total_k10"]==''){
                                    $total_k10 = 0 ;
                                }else{$total_k10 = $result10["total_k10"];}
                            }
                            
                            $piutang_lancar = $total_d9 - $total_k10 ;
                        
                        echo number_format($total_d9 - $total_k10);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.02.02</td>
		            <td>Piutang Jangka Panjang</td>
		            <td align='right'>
		                <?php
		                    $data11 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d11 FROM tb_jurnalumum WHERE account_d = '11.02.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result11=mysqli_fetch_array($data11)){	
                                if($result11["total_d11"]==''){
                                    $total_d11 = 0 ;
                                }else{$total_d11 = $result11["total_d11"];}
                            }
                        
                            $data12 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k12 FROM tb_jurnalumum WHERE account_k = '11.02.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result12=mysqli_fetch_array($data12)){	
                                $total_k12 = $result12["total_k12"];
                                if($result12["total_k12"]==''){
                                    $total_k12 = 0 ;
                                }else{$total_k12 = $result12["total_k12"];}
                            }
                            
                            $piutang_jangka_panjang = $total_d11 - $total_k12 ;
                        
                        echo number_format($total_d11 - $total_k12);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.02.03</td>
		            <td>Piutang Lainnya</td>
		            <td align='right'>
		                <?php
		                    $data13 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d13 FROM tb_jurnalumum WHERE account_d = '11.02.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result13=mysqli_fetch_array($data13)){	
                                if($result13["total_d13"]==''){
                                    $total_d13 = 0 ;
                                }else{$total_d13 = $result13["total_d13"];}
                            }
                        
                            $data14 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k14 FROM tb_jurnalumum WHERE account_k = '11.02.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result14=mysqli_fetch_array($data14)){	
                                $total_k14 = $result14["total_k14"];
                                if($result14["total_k14"]==''){
                                    $total_k14 = 0 ;
                                }else{$total_k14 = $result14["total_k14"];}
                            }
                            
                            $piutang_lainnya = $total_d13 - $total_k14 ;
                        
                        echo number_format($total_d13 - $total_k14);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='4'><b>Total Piutang</b></td>
		            <td align='right'><b><?php echo number_format($piutang_lancar + $piutang_jangka_panjang + $piutang_lainnya) ; ?></b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='6'><b>Persediaan</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.03.02</td>
		            <td>Persediaan Bahan Habis Pakai</td>
		            <td align='right'>
		                <?php
		                    $data15 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d15 FROM tb_jurnalumum WHERE account_d = '11.03.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result15=mysqli_fetch_array($data15)){	
                                if($result15["total_d15"]==''){
                                    $total_d15 = 0 ;
                                }else{$total_d15 = $result15["total_d15"];}
                            }
                        
                            $data16 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k16 FROM tb_jurnalumum WHERE account_k = '11.03.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result16=mysqli_fetch_array($data16)){	
                                $total_k16 = $result16["total_k16"];
                                if($result16["total_k16"]==''){
                                    $total_k16 = 0 ;
                                }else{$total_k16 = $result16["total_k16"];}
                            }
                            
                            $persediaan_bahan_habis_pakai = $total_d15 - $total_k16 ;
                        
                        echo number_format($total_d15 - $total_k16);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.03.04</td>
		            <td>Persediaan Alat Tulis dan Cetakan</td>
		            <td align='right'>
		                <?php
		                    $data17 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d17 FROM tb_jurnalumum WHERE account_d = '11.03.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result17=mysqli_fetch_array($data17)){	
                                if($result17["total_d17"]==''){
                                    $total_d17 = 0 ;
                                }else{$total_d17 = $result17["total_d17"];}
                            }
                        
                            $data18 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k18 FROM tb_jurnalumum WHERE account_k = '11.03.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result18=mysqli_fetch_array($data18)){	
                                $total_k18 = $result18["total_k18"];
                                if($result18["total_k18"]==''){
                                    $total_k18 = 0 ;
                                }else{$total_k18 = $result18["total_k18"];}
                            }
                            
                            $persediaan_alat_tulis_dan_cetakan = $total_d17 - $total_k18 ;
                        
                        echo number_format($total_d17 - $total_k18);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.03.05</td>
		            <td>Persediaan Lainnya</td>
		            <td align='right'>
		                <?php
		                    $data19 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d19 FROM tb_jurnalumum WHERE account_d = '11.03.05' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result19=mysqli_fetch_array($data19)){	
                                if($result19["total_d19"]==''){
                                    $total_d19 = 0 ;
                                }else{$total_d19 = $result19["total_d19"];}
                            }
                        
                            $data20 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k20 FROM tb_jurnalumum WHERE account_k = '11.03.05' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result20=mysqli_fetch_array($data20)){	
                                $total_k20 = $result20["total_k20"];
                                if($result20["total_k20"]==''){
                                    $total_k20 = 0 ;
                                }else{$total_k20 = $result20["total_k20"];}
                            }
                            
                            $persediaan_lainnya = $total_d19 - $total_k20 ;
                        
                        echo number_format($total_d19 - $total_k20);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='4'><b>Total Persediaan</b></td>
		            <td align='right'><b><?php echo number_format($persediaan_bahan_habis_pakai + $persediaan_alat_tulis_dan_cetakan + $persediaan_lainnya) ; ?></b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='6'><b>Perlengkapan</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td>11.05.06</td>
		            <td>Perlengkapan</td>
		            <td align='right'>
		                <?php
		                    $data21 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d21 FROM tb_jurnalumum WHERE account_d = '11.05.06' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result21=mysqli_fetch_array($data21)){	
                                if($result21["total_d21"]==''){
                                    $total_d21 = 0 ;
                                }else{$total_d21 = $result21["total_d21"];}
                            }
                        
                            $data22 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k22 FROM tb_jurnalumum WHERE account_k = '11.05.06' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result22=mysqli_fetch_array($data22)){	
                                $total_k22 = $result22["total_k22"];
                                if($result22["total_k22"]==''){
                                    $total_k22 = 0 ;
                                }else{$total_k22 = $result22["total_k22"];}
                            }
                            
                            $perlengkapan = $total_d21 - $total_k22 ;
                        
                        echo number_format($total_d21 - $total_k22);
		               ?>
		           </td>
		           <td></td>
		           <td></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='4'><b>Total Perlengkapan</b></td>
		            <td align='right'><b><?php echo number_format($perlengkapan) ; ?></b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td colspan='6'><b>Total Aktiva Lancar</b></td>
		            <td align='right'><b><?php echo number_format($kas + $rekening_bank + $kas_kecil + $panjar + $piutang_lancar + $piutang_jangka_panjang + $piutang_lainnya     + $persediaan_bahan_habis_pakai + $persediaan_alat_tulis_dan_cetakan + $persediaan_lainnya + $perlengkapan);?></b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td colspan='7'><b>Aktiva Tetap</b></td>
		        </tr>
		        <tr>
		            <td width='3%'></td>
		            <td width='3%'></td>
		            <td colspan='6'><b>Tanah dan Bangunan</b></td>
		        </tr>
		        
		        
		        
		        $kas + $rekening_bank + $kas_kecil + $panjar  $piutang_lancar + $piutang_jangka_panjang + $piutang_lainnya     $persediaan_bahan_habis_pakai + $persediaan_alat_tulis_dan_cetakan + $persediaan_lainnya    $perlengkapan
		       
		    </table>
			