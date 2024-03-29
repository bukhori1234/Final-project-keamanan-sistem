<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
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
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </div>
    </header>
    
    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username?>"required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp?>"required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_addres?>"required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $user = $_POST['user'];
                        $hp = $_POST['hp'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE admin SET
                                    admin_name = '".$nama."',
                                    username = '".$user."',
                                    admin_telp = '".$hp."',
                                    admin_addres = '".$alamat."'
                                    WHERE admin_id = '".$d->admin_id."' ");
                            if ($update) {
                                echo '<script>alert("Berhasil Update Data")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            } else {
                                echo 'Gagal Update Data' .mysqli_error($conn);                           
                             }
                         }
                ?>
            </div>
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control"required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control"required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){
                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];
                        $password = password_hash($pass1, PASSWORD_DEFAULT, ['cost' => 15]);

                        if($pass2 != $pass1){
                            echo '<script>alert("konfirmasi Password Tidak Sesuai")</script>';
                        }else {
                            $u_pass = mysqli_query($conn, "UPDATE admin SET
                                    password = '".$password."'
                                    WHERE admin_id = '".$d->admin_id."' ");
                            if($u_pass){
                                echo '<script>alert("Berhasil Update Data")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else {
                                echo 'Gagal Update Data' .mysqli_error($conn); 
                            }
                        }
                         }
                ?>
            </div>
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