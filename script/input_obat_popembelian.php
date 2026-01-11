<?php
    
    $id_obat = $_POST['id_obat'];
    $id_penganggaranobat = $_POST['id_penganggaranobat'];
    $id_supplier = $_POST['id_supplier'];
    $satuan = $_POST['satuan'];
    $jumlah = $_POST['jumlah'];
    $harga_satuan = $_POST['harga_satuan'];
    $total = $jumlah * $harga_satuan ;
    $inv_no = $_POST['inv_no'];
    $pembayaran = $_POST['pembayaran'];
    $id_pembelianobat = "SPO".mt_rand(1000, 9999);
    $id_jurnal = $id_pembelianobat ;
    $inputer = $_POST['inputer'] ;
    $tanggal = date('Y-m-d');
    
    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
    
    $data2=mysqli_query($connect, "select * from tb_obat where id_obat = '$id_obat' ");
    while($result2=mysqli_fetch_array($data2)){
        $nama_obat = $result2["nama_obat"];
        }
    
    
    mysqli_query($connect,"INSERT INTO tb_pembelianobat 
    (id_pembelianobat, id_obat, nama_obat, tanggal, id_penganggaranobat, id_supplier, satuan, jumlah, harga_satuan, total, pembayaran, inv_no, inputer, id_jurnal) VALUES 
    ('$id_pembelianobat', '$id_obat', '$nama_obat', '$tanggal', '$id_penganggaranobat', '$id_supplier', '$satuan', '$jumlah', '$harga_satuan', '$total', '$pembayaran', '$inv_no', '$inputer', '$id_jurnal' ) ");
    
    mysqli_query($connect,"UPDATE tb_penganggaranobat SET 

        status = 'Diorder'

        WHERE id_penganggaranobat ='$id_penganggaranobat' ");
?>

<script type="text/javascript">
    window.location.replace("https://simo.adiva.click/popembelian/read/<?php echo $inv_no ; ?>");
</script>