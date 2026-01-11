<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Green                                   */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        Green
        <small>Automated Checklist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Menampilkan Data Mahasiswa -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<h2 style="margin-top:0px">Rekap Hasil Analisa</h2>
				</div>
				<div class="col-md-4 text-center">
					<div style="margin-top: 4px"  id="message">
						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
					</div>
				</div>
			</div>
			
			<form action="https://imam.restujati.com/script/laporan.php" method="POST">
			
			    <button type="submit" class="btn btn-primary">Lihat Laporan</button>
		    </form>
			