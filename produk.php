<?php
    error_reporting(0);
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAR Project</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <header>
    <div class="container">
        <h1><a href="index.php">RAR Project</a></h1>
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
                <input type="hidden" name="kat" value=<?php echo $_GET['kat'] ?>>
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!--Produk-->
        <div class="section">
            <div class="container">
                <h3>Produk</h3>
                <div class="box">
                <?php
                    if($_GET['search'] != '' || $_GET['kat'] !=''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM product WHERE product_status = 1 $where ORDER BY product_id DESC");
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
                    <p>Produk Tidak Ada</p>
                <?php } ?>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="footer">
            <div class="container">
                <h4>Muhammad Adrian Maulana</h4>
                <p>1910631170103</p>

                <h4>Muhammad Ardana</h4>
                <p>1910631170103</p>

                <h4>Rio Adam</h4>
                <p>1910631170103</p>
                <small>Copyright &copy; 2021 - RAR Project</small>
            </div>
        </div>
            
</body>
</html>