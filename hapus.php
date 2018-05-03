<?php

include "koneksi.php";
$koneksiObj=new Koneksi();
$koneksi= $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
	die("Konesi Gagal : " . $koneksi->connect_error);
}else{
	echo "Koneksi ke basis data sukses!";
}



$query = "delete from data_mahasiswa where Nim = " . 
        $_GET["Nim"];
        


if($koneksi->query($query)==true){
    echo "<br>Data dengan Nim " . $_GET["Nim"] . 
    " sudah DIHAPUS. Data bisa dilihat " . 
    '<a href="main.php">disini</a>';
}else {
    echo "error : ".$query." -> ".$koneksi->error;
}

$koneksi->close();
?>