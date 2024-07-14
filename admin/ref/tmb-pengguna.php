<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id_akses = $_POST["id_akses"];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users VALUES ('', $id_akses ,'$nama_lengkap', '$no_hp', '$email', '$username', '$password') ";
    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
                alert('Pengguna baru berhasil di tambahkan!');
                document.location.href = 'dpengguna.php'
            </script>";
    } else {
        echo "<script>
                alert('Pengguna baru gagal di tambahkan!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepeda Air Danau Kelapa Gading Admin-TP_page.com</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 350px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
                0px 0px 0px 5px #ecf0f3,
                8px 8px 15px #a7aaa7,
                -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #03A9F4;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #039BE5;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4;
        }

        .wrapper a:hover {
            color: #039BE5;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }

        .lg{
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

            
        
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="../../assets/img/stmik.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Register
        </div>
        <form class="p-3 mt-3" method="post" action="">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nama_lengkap" id="" placeholder="Nama Lengkap">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="no_hp" id="pwd" placeholder="No Hp">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="" placeholder="Email">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="username" id="pwd" placeholder="Username">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label mt-2" for="id_akses ">Akses</label>
                <select name="id_akses" id="id_akses" class="form-select ms-2" >
                    <option selected disabled value="0">Sebagai</option>
                    <option value="1">Admin</option>
                    <option value="2">Pelanggan</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn mt-3">Tambah Pengguna</button>
        </form>
        <div class="text-center fs-6">
            <a class="lg" href="login.php">Sudah Memiliki Akun!</a>
        </div>
    </div>
</body>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>