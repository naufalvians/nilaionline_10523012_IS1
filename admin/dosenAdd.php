<?php
include ('../koneksi/koneksi.php');
?>

<style>
    select {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #000; /* Menetapkan warna teks */
    }

    option {
        color: #000; /* Menetapkan warna teks dalam opsi */
        background-color: #fff; /* Menetapkan warna latar belakang */
    }
</style>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />
<p>
<?php 
if (!isset($_POST['submit'])) {
?>
    <form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
     <td width="27%">NIP</td>
     <td width="4%">:</td>
     <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP"/></td>
    </tr>
    <tr>
    <td>NAMA DOSEN</td>
    <td>:</td>
    <td><input type="text" name="nama" size="30" placeholder="NAMA DOSEN"/></td>
    </tr>
    <tr>
    <td>KODE MATAKULIAH</td>
    <td>:</td>
    <td>
    <label>
        <select name="kode_mtkul" class='form-control'>
        <option value="">-=PILIH=-</option>
        <?php
        $querymtk = "SELECT kode_mtkul FROM matakuliah";
        $resultmtk = mysqli_query($koneksi, $querymtk);
        while ($datamhs = mysqli_fetch_array($resultmtk, MYSQLI_NUM)){
            echo "<option value='$datamhs[0]'>$datamhs[0]</option>";
        }
        ?>
        </select>
    </label>
    </td>
    </tr>
    <tr>
    <td>PASSWORD</td>
    <td>:</td>
    <td><input type="text" name="password" size="30" placeholder="PASSWORD"/></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <input id="submit" name="submit" type="submit" value="TAMBAH">
    </td>
    </tr>
    </table>
</form>
<?php
} 
else {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $kode = $_POST["kode_mtkul"];
    $password = md5($_POST["password"]);

    $insertdsn = "INSERT INTO dosen VALUE ('$nip', '$nama', '$kode', '$password')";
    $querydsn = mysqli_query($koneksi, $insertdsn);

    if ($querydsn) {
        echo "<script> alert('Data Berhasil Ditambah !') </script>";
        echo "<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    } else {
        echo "<script>alert('Data gagal Ditambah !')</script>";
        echo "<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    }
}
?>
<a href="./?adm=dosen">&raquo; KEMBALI </a>
