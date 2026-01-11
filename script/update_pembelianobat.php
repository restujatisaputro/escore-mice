<?php

    $connect = mysqli_connect("localhost", "u197914754_simo", "Andri13021980", "u197914754_simo");

    $id_pembelianobat = $_POST["id_pembelianobat"];
    $id_obat = $_POST["id_obat"];
    $id_penganggaranobat = $_POST["id_penganggaranobat"];
    $id_supplier = $_POST["id_supplier"];
    $satuan = $_POST["satuan"];
    $jumlah = $_POST["jumlah"];
    $harga_satuan = $_POST["harga_satuan"];
    $total = $jumlah * $harga_satuan;
    $pembayaran = $_POST["pembayaran"];
    $inv_no = $_POST["inv_no"];
    $inputer = $_POST["inputer"];
    $id_jurnal = $_POST["id_jurnal"];
    
    
   date_default_timezone_set('Asia/Jakarta');
   
   mysqli_query($connect,"UPDATE tb_pelanggan SET 

        no_kk = '$no_kk',
        noktp = '$noktp',
        tempat_lahir  = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        no_handphone = '$no_handphone',
        agama = '$agama',
        alamat = '$alamat',
        rt_rw = '$rt_rw',
        kelurahan  = '$kelurahan',
        kecamatan = '$kecamatan',
        jenis_pekerjaan = '$jenis_pekerjaan',
        status = '$status',
        nama_pasangan = '$nama_pasangan',
        no_ktp_pasangan = '$no_ktp_pasangan',
        tempat_lahir_pasangan = '$tempat_lahir_pasangan',
        tanggal_lahir_pasangan = '$tanggal_lahir_pasangan',
        photo = '$photo'

        WHERE no_cif ='$no_cif' ");
    
    
    mysqli_query($connect,"UPDATE tb_rekening SET 

        no_sambung = '$no_sambung',
        alamat_sambung = '$alamat_sambung',
        rt_rw  = '$rt_rw_sambung',
        kelurahan = '$kelurahan_sambung',
        kecamatan = '$kecamatan_sambung',
        photo_rumah = '$photo_rumah',
        lat_sambung = '$lat_sambung',
        lng_sambung = '$lng_sambung'

        WHERE no_rekening ='$no_rekening' ");

?>













