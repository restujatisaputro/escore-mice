<?php
    
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $no_handphone = $_POST['no_handphone'];
    $email = $_POST['email'];
    $kontak_person = $_POST['kontak_person'];
    
    $connect=mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");
    
    mysqli_query($connect,"INSERT INTO tb_supplier 
    (id_supplier, nama_supplier, alamat_supplier, no_handphone, email, kontak_person) VALUES 
    ('$id_supplier', '$nama_supplier', '$alamat_supplier', '$no_handphone', '$email', '$kontak_person' ) ");
?>

<script type="text/javascript">
    window.location.replace("https://simo.adiva.click/popembelian/create/");

</script>