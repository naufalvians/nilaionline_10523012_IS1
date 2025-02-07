<?php include ('../koneksi/koneksi.php');
$kode=$_GET["kode_mtkul"]; 
$delmtk ="DELETE FROM matakuliah WHERE kode_mtkul='$kode'"; 
$resultmtk =mysqli_query($koneksi, $delmtk); 
if($resultmtk) 
{
    echo"<script>alert('Data Matakuliah Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='./?adm=matakuliah'</script>";
    }
    else 
    {   echo"<sript>alert('Data Matakuliah gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='./?adm=matakuliah'</script>"; } 
?>