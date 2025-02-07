<?php include ('../koneksi/koneksi.php');
$nip=$_GET["nip"]; 
$deldsn ="DELETE FROM dosen WHERE nip='$nip'"; 
$resultdsn =mysqli_query($koneksi, $deldsn); 
if($resultdsn) 
{
    echo"<script>alert('Data Dosen Berhasil Dihapus') </script>";
    echo"<script type='text/javascript'>window.location ='./?adm=dosen'</script>";
    }
    else 
    {   echo"<sript>alert('Data Dosen gagal Dihapus') </script>"; 
        echo"<script type='text/javascript'>window.location='./?adm=dosen'</script>"; } 
?>