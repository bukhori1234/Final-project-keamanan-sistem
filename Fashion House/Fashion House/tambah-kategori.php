<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fashion House</title>
    <link rel="icon" type="image/x-icon" href="img/logotb.png"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <header>
    <div class="container">
        <h1><a href="dashboard.php">Fashion House</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Procuk</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    </header>
    
    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn, "INSERT INTO category VALUES (
                                            null,
                                            '".$nama."') ");

                        if($insert){
                            echo '<script>alert("Berhasil Tambah Kategori")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'Gagal' .mysqli_error($conn);
                        }
                    }
                ?>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Fashion House</small>
        </div>
    </footer>
</body>
</html>