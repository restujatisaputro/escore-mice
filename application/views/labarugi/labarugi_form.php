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
        <li><a href="<?php echo $back ?>">Laba Rugi</a></li>
        <li class="active">Laba Rugi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		   <!-- Form input dan edit Setoran-->
		   <legend>Laba Rugi</legend>	
		   
		   <?php
		        $bulan = $_POST['bulan'];
		        $tahun = $_POST['tahun'];
		        $tgl_awal = $tahun."-".$bulan."-01" ;
		        $tgl_akhir = $tahun."-".$bulan."-31";
		   ?>
		   
		   <h4><center>Laporan Laba/Rugi</center></h4>
		   <h4><center>Periode : <?php echo $bulan."-".$tahun ; ?></center></h4>
		   
		   <table class="table table-bordered table-striped" id="mytable">
		       <tr>
		           <td colspan='5'><b>PENDAPATAN</b></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>17.01.01</td>
		           <td>Pendapatan Jasa</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data1 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d1 FROM tb_jurnalumum WHERE account_d = '17.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result1=mysqli_fetch_array($data1)){	
                                if($result1["total_d1"]==''){
                                    $total_d1 = 0 ;
                                }else{$total_d1 = $result1["total_d1"];}
                            }
                            $data2 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k2 FROM tb_jurnalumum WHERE account_k = '17.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result2=mysqli_fetch_array($data2)){	
                                $total_k2 = $result2["total_k2"];
                                if($result2["total_k2"]==''){
                                    $total_k2 = 0 ;
                                }else{$total_k2 = $result2["total_k2"];}
                            }
                            $pendapatan_jasa = $total_k2 - $total_d1 ;
                        echo number_format($total_k2 - $total_d1);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>17.01.02</td>
		           <td>Pendapatan</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data3 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d3 FROM tb_jurnalumum WHERE account_d = '17.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result3=mysqli_fetch_array($data3)){	
                                if($result3["total_d3"]==''){
                                    $total_d3 = 0 ;
                                }else{$total_d3 = $result3["total_d3"];}
                            }
                            $data4 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k4 FROM tb_jurnalumum WHERE account_k = '17.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result4=mysqli_fetch_array($data4)){	
                                $total_k4 = $result4["total_k4"];
                                if($result4["total_k4"]==''){
                                    $total_k4 = 0 ;
                                }else{$total_k4 = $result4["total_k4"];}
                            }
                            $pendapatan = $total_k4 - $total_d3 ;
                        echo number_format($total_k4 - $total_d3);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>17.01.03</td>
		           <td>Pendapatan Lainnya</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data5 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d5 FROM tb_jurnalumum WHERE account_d = '17.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result5=mysqli_fetch_array($data5)){	
                                if($result5["total_d5"]==''){
                                    $total_d5 = 0 ;
                                }else{$total_d5 = $result5["total_d5"];}
                            }
                            $data6 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k6 FROM tb_jurnalumum WHERE account_k = '17.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result6=mysqli_fetch_array($data6)){	
                                $total_k6 = $result6["total_k6"];
                                if($result6["total_k6"]==''){
                                    $total_k6 = 0 ;
                                }else{$total_k6 = $result6["total_k6"];}
                            }
                            $pendapatan_lainnya = $total_k6 - $total_d5 ;
                        echo number_format($total_k6 - $total_d5);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td colspan='4'><b>TOTAL PENDAPATAN</b></td>
		           <td align='right'>
		               <b>
		                   <?php echo number_format($pendapatan_jasa + $pendapatan + $pendapatan_lainnya ) ; ?>
		               </b>
		           </td>
		       </tr>
		       <tr>
		           <td colspan='5'><b>BIAYA OPERASIONAL</b></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.01</td>
		           <td>Biaya Bahan Bakar</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data7 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d7 FROM tb_jurnalumum WHERE account_d = '18.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result7=mysqli_fetch_array($data7)){	
                                if($result7["total_d7"]==''){
                                    $total_d7 = 0 ;
                                }else{$total_d7 = $result7["total_d7"];}
                            }
                            $data8 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k8 FROM tb_jurnalumum WHERE account_k = '18.01.01' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result8=mysqli_fetch_array($data8)){	
                                $total_k8 = $result8["total_k8"];
                                if($result8["total_k8"]==''){
                                    $total_k8 = 0 ;
                                }else{$total_k8 = $result8["total_k8"];}
                            }
                            $biaya_bahan_bakar = $total_d7 - $total_k8 ;
                        echo number_format($total_d7 - $total_k8);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.02</td>
		           <td>Biaya Listrik PLN</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data9 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d9 FROM tb_jurnalumum WHERE account_d = '18.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result9=mysqli_fetch_array($data9)){	
                                if($result9["total_d9"]==''){
                                    $total_d9 = 0 ;
                                }else{$total_d9 = $result9["total_d9"];}
                            }
                            $data10 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k10 FROM tb_jurnalumum WHERE account_k = '18.01.02' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result10=mysqli_fetch_array($data10)){	
                                $total_k10 = $result10["total_k10"];
                                if($result10["total_k10"]==''){
                                    $total_k10 = 0 ;
                                }else{$total_k10 = $result10["total_k10"];}
                            }
                            $biaya_listrik_pln = $total_d9 - $total_k10 ;
                        echo number_format($total_d9 - $total_k10);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.03</td>
		           <td>Biaya Telekomunikasi</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data11 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d11 FROM tb_jurnalumum WHERE account_d = '18.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result11=mysqli_fetch_array($data11)){	
                                if($result11["total_d11"]==''){
                                    $total_d11 = 0 ;
                                }else{$total_d11 = $result11["total_d11"];}
                            }
                            $data12 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k12 FROM tb_jurnalumum WHERE account_k = '18.01.03' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result12=mysqli_fetch_array($data12)){	
                                $total_k12 = $result12["total_k12"];
                                if($result12["total_k12"]==''){
                                    $total_k12 = 0 ;
                                }else{$total_k12 = $result12["total_k12"];}
                            }
                            $biaya_telekomunikasi = $total_d11 - $total_k12 ;
                        echo number_format($total_d11 - $total_k12);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.04</td>
		           <td>Biaya Internet</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data13 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d13 FROM tb_jurnalumum WHERE account_d = '18.01.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result13=mysqli_fetch_array($data13)){	
                                if($result13["total_d13"]==''){
                                    $total_d13 = 0 ;
                                }else{$total_d13 = $result13["total_d13"];}
                            }
                            $data14 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k14 FROM tb_jurnalumum WHERE account_k = '18.01.04' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result14=mysqli_fetch_array($data14)){	
                                $total_k14 = $result14["total_k14"];
                                if($result14["total_k14"]==''){
                                    $total_k14 = 0 ;
                                }else{$total_k14 = $result14["total_k14"];}
                            }
                            $biaya_internet = $total_d13 - $total_k14 ;
                        echo number_format($total_d13 - $total_k14);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.05</td>
		           <td>Biaya Alat Tulis Kantor</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data15 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d15 FROM tb_jurnalumum WHERE account_d = '18.01.05' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result15=mysqli_fetch_array($data15)){	
                                if($result15["total_d15"]==''){
                                    $total_d15 = 0 ;
                                }else{$total_d15 = $result15["total_d15"];}
                            }
                            $data16 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k16 FROM tb_jurnalumum WHERE account_k = '18.01.05' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result16=mysqli_fetch_array($data16)){	
                                $total_k16 = $result16["total_k16"];
                                if($result16["total_k16"]==''){
                                    $total_k16 = 0 ;
                                }else{$total_k16 = $result16["total_k16"];}
                            }
                            $biaya_alat_tulis_kantor = $total_d15 - $total_k16 ;
                        echo number_format($total_d15 - $total_k16);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.06</td>
		           <td>Biaya Pemeliharaan Kendaraan</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data17 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d17 FROM tb_jurnalumum WHERE account_d = '18.01.06' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result17=mysqli_fetch_array($data17)){	
                                if($result17["total_d17"]==''){
                                    $total_d17 = 0 ;
                                }else{$total_d17 = $result17["total_d17"];}
                            }
                            $data18 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k18 FROM tb_jurnalumum WHERE account_k = '18.01.06' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result18=mysqli_fetch_array($data18)){	
                                $total_k18 = $result18["total_k18"];
                                if($result18["total_k18"]==''){
                                    $total_k18 = 0 ;
                                }else{$total_k18 = $result18["total_k18"];}
                            }
                            $biaya_pemeliharaan_kendaraan = $total_d17 - $total_k18 ;
                        echo number_format($total_d17 - $total_k18);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.07</td>
		           <td>Biaya Pegawai</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data19 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d19 FROM tb_jurnalumum WHERE account_d = '18.01.07' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result19=mysqli_fetch_array($data19)){	
                                if($result19["total_d19"]==''){
                                    $total_d19 = 0 ;
                                }else{$total_d19 = $result19["total_d19"];}
                            }
                            $data20 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k20 FROM tb_jurnalumum WHERE account_k = '18.01.07' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result20 = mysqli_fetch_array($data20)){	
                                $total_k20 = $result20["total_k20"];
                                if($result20["total_k20"]==''){
                                    $total_k20 = 0 ;
                                }else{$total_k20 = $result20["total_k20"];}
                            }
                            $biaya_pegawai = $total_d19 - $total_k20 ;
                        echo number_format($total_d19 - $total_k20);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>18.01.08</td>
		           <td>Biaya Operasional Lainnya</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data21 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d21 FROM tb_jurnalumum WHERE account_d = '18.01.08' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result21=mysqli_fetch_array($data21)){	
                                if($result21["total_d21"]==''){
                                    $total_d21 = 0 ;
                                }else{$total_d21 = $result21["total_d21"];}
                            }
                            $data22 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k22 FROM tb_jurnalumum WHERE account_k = '18.01.08' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result22 = mysqli_fetch_array($data22)){	
                                $total_k22 = $result22["total_k22"];
                                if($result22["total_k22"]==''){
                                    $total_k22 = 0 ;
                                }else{$total_k22 = $result22["total_k22"];}
                            }
                            $biaya_operasional_lainnya = $total_d21 - $total_k22 ;
                        echo number_format($total_d21 - $total_k22);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td colspan='4'><b>TOTAL BIAYA OPERASIONAL</b></td>
		           <td align='right'><b><?php echo number_format($biaya_bahan_bakar + $biaya_listrik_pln + $biaya_telekomunikasi + $biaya_internet + $biaya_alat_tulis_kantor + $biaya_pemeliharaan_kendaraan + $biaya_pegawai + $biaya_operasional_lainnya ) ; ?></b></td>
		       </tr>
		       <tr>
		           <td colspan='5'><b>BIAYA NON OPERASIONAL</b></td>
		       </tr>
		       <tr>
		           <td width='3%'></td>
		           <td width='5%'>19.01.09</td>
		           <td>Biaya Non Operasional</td>
		           <td align='right'>
		               <?php
		                    $connect=mysqli_connect("localhost", "u197914754_manajemen", "Andri13021980", "u197914754_manajemen");
		                    $data23 = mysqli_query($connect, "SELECT SUM(nominal_d) AS total_d23 FROM tb_jurnalumum WHERE account_d = '19.01.09' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result23=mysqli_fetch_array($data23)){	
                                if($result23["total_d23"]==''){
                                    $total_d23 = 0 ;
                                }else{$total_d23 = $result23["total_d23"];}
                            }
                            $data24 = mysqli_query($connect, "SELECT SUM(nominal_k) AS total_k24 FROM tb_jurnalumum WHERE account_k = '19.01.09' and tanggal between $tgl_awal and '$tgl_akhir' ");
                            while($result24 = mysqli_fetch_array($data24)){	
                                $total_k24 = $result24["total_k24"];
                                if($result24["total_k24"]==''){
                                    $total_k24 = 0 ;
                                }else{$total_k24 = $result24["total_k24"];}
                            }
                            $biaya_non_operasional = $total_d23 - $total_k24 ;
                        echo number_format($total_d23 - $total_k24);
		               ?>
		           </td>
		           <td></td>
		       </tr>
		       <tr>
		           <td colspan='4'><b>TOTAL BIAYA NON OPERASIONAL</b></td>
		           <td align='right'><b><?php echo number_format($biaya_non_operasional ) ; ?></b></td>
		       </tr>
		       <tr>
		           <td colspan='4'><b>LABA / RUGI</b></td>
		           <td align='right'><b><?php echo number_format(($pendapatan_jasa + $pendapatan + $pendapatan_lainnya) - ($biaya_bahan_bakar + $biaya_listrik_pln + $biaya_telekomunikasi + $biaya_internet + $biaya_alat_tulis_kantor + $biaya_pemeliharaan_kendaraan + $biaya_pegawai + $biaya_operasional_lainnya + $biaya_non_operasional) ) ; ?></b></td>
		       </tr>
		       
		       
		       
		       
		       
		       
		       
		   </table>