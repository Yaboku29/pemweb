<?php
    session_name("keranjang");
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pid=$_GET["pid"];
        $jumlah=$_GET["jumlah"];
        // var_dump($pid);
        // var_dump($jumlah);
        
        $_SESSION["belanja"][$pid]=$jumlah;
        ///var_dump($_SESSION["belanja"]);
        foreach($_SESSION["belanja"] as $pid => $jumlah){
            print "product id: $pid, jumlah dibeli: $jumlah <br>";
        }
    ?>
</body>
</html>