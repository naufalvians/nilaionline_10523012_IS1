<?php
include ('../koneksi/koneksi.php');

?>
<h3>TAMBAH DATA NILAI</h3>
<br /><hr /><br />
<p>
<?php
if (!isset($_POST['submit']))
 {
?>
    <form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
    <tr>
     <td width="27%">NAMA MAHASISWA</td>
     <td width="4%">:</td>
     <td>
        <label>
            <select name="mhs" class='form-control'>
            <option value="">-=PILIH=-</option>
            <?php
            $queryMhs   = "SELECT nim, nama FROM mahasiswa";
            $resultmhs  = mysqli_query ($koneksi, $queryMhs);
            while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)){
                echo  "<option value = '$datamhs[0]'> $datamhs[1]</option>";
            }
            ?>
            </select>
        </label>
        <br>
     </td>
    </tr>
    <tr>
    <td>NAMA DOSEN</td>
    <td>:</td>
    <td>
    <label>
            <select name="dosen" class='form-control'>
            <option value="">-=PILIH=-</option>
            <?php
            $querydsn  = "select nip, nama from dosen";
            $resultdsn  = mysqli_query ($koneksi, $querydsn);
            while ($datadsn = mysqli_fetch_array($resultdsn, MYSQLI_NUM)){
                echo  "<option value = '$datadsn[0]'> $datadsn[1]</option>";
            }
            ?>
            </select>
        </label>
    </tr>
    <tr>
    <td>NILAI TUGAS</td>
    <td>:</td>
    <td><input type="text" name="tugas" size="30" placeholder="TUGAS"/></td>
    </td>
    </tr>
    <tr>
    <td>NILAI UTS</td>
    <td>:</td>
    <td><input type="text" name="uts" size="30" placeholder="UTS"/></td>
    </tr>
    <tr>
    <td>NILAI UAS</td>
    <td>:</td>
    <td><input type="text" name="uas" size="30" placeholder="UAS"/></td>
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
    $mhs        =$_POST["mhs"];
    $dosen      =$_POST["dosen"];
    $tugas      =$_POST["tugas"];
    $uts        =$_POST["uts"];
    $uas        =$_POST["uas"];

    $insertnilai ="INSERT INTO nilai (nim, nip, ni_tugas, ni_uts, ni_uas) values ('$mhs', '$dosen', '$tugas', '$uts' , '$uas')";
    $querynilai = mysqli_query($koneksi, $insertnilai);

    if ($querynilai){
     echo"<script> alert('Data Berhasil Ditambah !') </script>";
     echo"<script type='text/javascript'>window.location ='./?adm=nilai'</script>";
    }
    else {
        echo"<script>alert('Data gagal Ditambah !')</script>";
        echo"<script type='text/javascript'>window.location ='./?adm=nilai'</script>";
    }
}
?>
