<?php
    $tanggal = $_POST['tanggal'];
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $id_puskesmas = $_POST['id_puskesmas'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga_satuan = $_POST['harga_satuan'];
    $total = $jumlah * $harga_satuan ;
    $kadarluasa = $_POST['kadarluasa'];
    $inv_no = $_POST['inv_no'];
    $inputer = $_POST['inputer'] ;
    $status_obat = $_POST['status_obat'];
    $id_pembelianobat = $_POST['id_pembelianobat'];
    
    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
    
    mysqli_query($connect,"INSERT INTO tb_persediaanobat 
    (tanggal, id_obat, nama_obat, id_puskesmas, jumlah, satuan, harga_satuan, total, kadarluasa, inv_no, inputer, status_obat) VALUES 
    ('$tanggal', '$id_obat', '$nama_obat', '$id_puskesmas', '$jumlah', '$satuan', '$harga_satuan', '$total', '$kadarluasa', '$inv_no', '$inputer', '$status_obat' ) ");
    
    
     mysqli_query($connect,"UPDATE tb_pembelianobat SET 

        status = 'Diterima'

        WHERE id_pembelianobat ='$id_pembelianobat' ");
    
    
    $data2=mysqli_query($connect, "select * from tb_pembelianobat where id_pembelianobat = '$id_pembelianobat' ");

    while($result2=mysqli_fetch_array($data2)){

	$id_penganggaranobat = $result2["id_penganggaranobat"];
	
    }
    
    mysqli_query($connect,"UPDATE tb_penganggaranobat SET 

        status = 'Diterima'

        WHERE id_penganggaranobat ='$id_penganggaranobat' ");
?>

<script type="text/javascript">
    window.location.replace("https://simo.adiva.click/persediaan.html");
</script>