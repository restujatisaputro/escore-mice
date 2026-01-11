<h2>Aplikasi Sederhana Menghitung Jumlah Kata Yang Sama</h2>
<?php
$teks = "Mari kita memulai belajar PHP, dengan PHP kita dapat belajar mengenai array dan fungsi lain yang dapat mempermudah pekerjaan yang dilakukan. fungsi seperti explode dapat membantu untuk mengubah string menjadi array.";
//bersihkan teks dari tanda baca
$filter = array(".",",","!","?","(",")"); //bisa ditambahkan
$teks_clean = str_replace($filter, "", $teks); //bersihkan tanda baca

$kata   = explode(" ", $teks_clean);
$hasil  = count($kata);
$data   = array_count_values($kata);

echo "<b>Teks</b> <br> $teks";
echo "<hr>";
echo "<b>Teks clean</b> <br> $teks_clean";
echo "<hr>";
echo "Jumlah Kata: $hasil buah kata";
echo "<hr>";

foreach($data as $x => $x_value) {
    echo $x." : ".$x_value;
    echo "<br>";
}
echo "<hr>";
?>