<?php
    include 'db.php';

    $produk = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion House</title>
    <link rel="icon" type="image/x-icon" href="img/logotb.png"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <header>
    <div class="container">
        <h1><a href="index.php">Fashion House</a></h1>
        <ul>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="login.php">Admin? Login Disini</a></li>
        </ul>
    </div>
    </header>

    <!--search-->
        <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- detail product -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width ="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?> </h4>
                    <p>
                        Deskripsi :<br>
                        <?php echo $p->product_desc ?>
                    </p>
                    <p>
                        <a href="https://api.whatsapp.com/send?phone=+6281292922916 &text=Bro, Mau order dong." target="_blank" class="btn-1">Klik Disini Untuk Order via Whatsapp</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
        <!--footer-->
        <div class="footer">
            <div class="container">
                <small>Copyright &copy; 2022 - Fashion House</small>
            </div>
        </div>
            
</body>
</html>