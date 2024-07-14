
<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
    header("Location: ../Log_System/login.php");
    exit;
  }

require "../koneksi.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_konten WHERE id = $id");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
            <script>
                alert('Konten berhasil di hapus!');
                document.location.href = 'dkonten.php';
            </script>
        ";
  }else {
    echo mysqli_error($koneksi);
  }
?> 