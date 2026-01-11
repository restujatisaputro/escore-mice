<!-------------------------------------------------------*/
/* Copyright   : CV Adiva                                */
/* Publish     : Dinkes Kabupaten Indragiri Hilir        */
/*-------------------------------------------------------->

<script>
    function sum() {
    var txtFirstNumberValue = document.getElementById('jumlah').value;
    var txtSecondNumberValue = document.getElementById('harga_satuan').value;
    var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
            }
    }
</script>


<section class="content-header">
      <h1>
        SIMO
        <small>System Informasi Manajemen Obat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Purchase Order</a></li>
        <li class="active"><?php echo $button ?> Pembelian Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		    <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Pembelian Obat-->
			<legend><?php echo $button ?> Pembelian Obat</legend>	
            <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		        <input type="hidden"  class="form-control" name="id_pembelianobat" id="id_pembelianobat" value="<?php echo $id_pembelianobat; ?>" />
		        <input type="hidden"  class="form-control" name="id_obat" id="id_obat" value="<?php echo $id_obat; ?>" />
		        <input type="hidden"  class="form-control" name="id_penganggaranobat" id="id_penganggaranobat" value="<?php echo $id_penganggaranobat; ?>" />
		        <input type="hidden"  class="form-control" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier; ?>" />
		        <input type="hidden"  class="form-control" name="inv_no" id="inv_no" value="<?php echo $inv_no; ?>" />
		        <input type="hidden"  class="form-control" name="inputer" id="inputer" value="<?php echo $username; ?>" />
		        <input type="hidden"  class="form-control" name="id_jurnal" id="id_jurnal" value="<?php echo $id_jurnal; ?>" />
		
	    
	            <div class="form-group">
                    <label for="varchar">Obat </label>
                        <?php
                            $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
                            $data=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");

                            while($result=mysqli_fetch_array($data)){

	                        $nama_obat = $result["nama_obat"];

                            }
                        ?>
                    <input type="text" class="form-control" name="nama_obat" id="nama_obat"  value="<?php echo $nama_obat; ?>" readonly />
                    
                </div>
                <div class="form-group">
                    <label for="varchar">Pembayaran <?php echo form_error('pembayaran') ?></label>
                    <input type="text" class="form-control" name="pembayaran" id="pembayaran" placeholder="Pembayaran" value="<?php echo $pembayaran; ?>" readonly />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Supplier </label>
                        <?php
                            $data2=mysqli_query($connect, "select * from tb_supplier where id_supplier = '$id_supplier' ");
                            while($result2=mysqli_fetch_array($data2)){
	                        $nama_supplier = $result2["nama_supplier"];
                            }
                        ?>
                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"  value="<?php echo $nama_supplier; ?>" readonly />
                    
                </div>
	           
		        <div class="form-group">
                    <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
                        <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
                </div>
	            
	            <div class="form-group">
                    <label for="varchar">Jumlah <?php echo form_error('jumlah') ?></label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="sum();" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Harga Satuan <?php echo form_error('harga_satuan') ?></label>
                    <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" onkeyup="sum();" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" />
                </div>
                
                <div class="form-group">
                    <label for="varchar">Total <?php echo form_error('total') ?></label>
                    <input type="text" class="form-control" name="total" id="total" onkeyup="sum();" placeholder="Total" value="<?php echo $total; ?>" />
                </div>
                
                
		
				
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('popembelian/read/'.$inv_no) ?>" class="btn btn-default">Cancel</a>
	</form>