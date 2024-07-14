
<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
    header("Location: ../Log_System/login.php");
    exit;
  }

require "../koneksi.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_costumers WHERE id = $id");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
            <script>
                alert('Aduan costumer berhasil di hapus!');
                document.location.href = 'costumerS.php';
            </script>
        ";
  }else {
    echo mysqli_error($koneksi);
  }
?> 