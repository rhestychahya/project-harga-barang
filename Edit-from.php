<h2>Formulir Edit data mahasiswa</h2>
<hr>
<form action="update.php" method="post"> 


<?php
include "koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
    die("koneksi gagal : " . $koneksi->connect_error);
}

$qry ="select * from Data_Mahasiswa where Nim='".
    $_GET["Nim"] . "'";
$data = $koneksi ->query($qry);

if ($data->num_rows <= 0) {
    echo "Mas/Mba isi datanya sesuai prosedur ya!";
}else{
    while($hasil = $data->fetch_assoc()){
        global $Nama;
        global $Jurusan;
        $Nama = $hasil["Nama"];
        $Jurusan = $hasil["Jurusan"];
    }
}
?>

<table>
<tr>
    <td>KODE</td>
    <td>: <input type = "text" name="Nim" readonly="true"
        value=<?php echo $_GET["Nim"]; ?>></td>
</tr>
<tr>
    <td>NAMA </td>
    <td>: <input type="text" name="Nama"
        value=<?php echo $Nama; ?>></td>

</tr>
<tr>
    <td>Jurusan</td>
    <td>: <input type="text" name="Jurusan"
        value=<?php echo $Jurusan; ?>></td>
</tr>
<tr>
    <td><input type="submit" value="simpan"></td>

</tr>
</table>
</form>