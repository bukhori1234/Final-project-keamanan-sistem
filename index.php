<?php
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion House - Keamanan Sistem</title>
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

    <!--category-->
        <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                    <a href="produk.php?kat=<?php echo $k ['category_id'] ?>">
                    <div class="col-5">
                        <img src="img/list.png" width="50px" style="margin-bottom:5px">
                        <p><?php echo $k['category_name'] ?> </p>
                    </div>
                    </a>
                <?php }} else{ ?>
                    <p>Kategori Tidak Ada</p>
                <?php } ?>
                
            </div>
        </div>
    </div>

    <!--Produk-->
        <div class="section">
            <div class="container">
                <h3>Produk Terbaru</h3>
                <div class="box">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                     <a href="detail-produk.php?id=<?php echo $p ['product_id'] ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?> ">
                        <p class="nama"><?php echo $p['product_name'] ?> </p>
                        <p class="harga">Rp.<?php echo $p['product_price'] ?> </p>
                    </div>
                    </a>
                <?php }} else{ ?>
                    <p>Kategori Tidak Ada</p>
                <?php } ?>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="footer">
            <div class="container">
                <img src="img/logotb.png" alt="Logo" width="10px" height="10px">
                <small>Copyright &copy; 2022 - Fashion House</small>
            </div>
        </div>
            
</body>
</html>