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
        <li class="active">Neraca</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Menampilkan Data Neraca -->       
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<h2 style="margin-top:0px">Neraca</h2>
				</div>
				<div class="col-md-4 text-center">
					<div style="margin-top: 4px"  id="message">
						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
					</div>
				</div>
			</div>
			
			<form role="form" class="form-horizontal"  action="https://manajemen.adiva.click/neraca/create/" method="post" enctype="multipart/form-data">
			
			<table class="table table-bordered table-striped" id="mytable">
			    
			    <tr>
			        <td width='10%'>
	                    <label>Pilih Bulan</label>
	                </td>
	                <td width='15%'>
	                    <select name='bulan' id='bulan' class='form-control'>
		                    <option value='01'>Januari</option>
		                    <option value='02'>Februari</option>
		                    <option value='03'>Maret</option>
		                    <option value='04'>April</option>
		                    <option value='05'>Mei</option>
		                    <option value='06'>Juni</option>
		                    <option value='07'>Juli</option>
		                    <option value='08'>Agustus</option>
		                    <option value='09'>September</option>
		                    <option value='10'>Oktober</option>
		                    <option value='11'>November</option>
		                    <option value='12'>Desember</option>
		                </select>
                	</td>
	                <td width='5%'>	
		                <label>Tahun</label>
	                </td><td width='15%'>	
		            <select name='tahun' id='tahun'  class='form-control'>
	                    <?php	$mulai= 2024 ;
		                    for($i = $mulai;$i<$mulai + 100;$i++){
		                ?>			
			                <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
		
			            <?php
		                    }
		                ?>
	
	            	</select>
	                </td width='50%'>
	                <td>
	                    &emsp;<input type='submit' name='Cari' value='Lihat' class='btn btn-primary'> 
	            	</td>
	            </tr>
	        </table>
        </form>
			
		
			