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
    <table>

        <tr>
            <th>PID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'nwind');
        $pid=$_GET["pid"];
        $jumlah=$_GET["jumlah"];
        $_SESSION["belanja"][$pid]=$jumlah;
        $total=0;
        foreach($_SESSION["belanja"] as $pid => $jumlah){
            $sql="select * from products where ProductID=$pid";
            $products = $mysqli->query($sql);
            $p=$products->fetch_object();
            // print "product id: $pid,$p->ProductName,$p->UnitPrice, jumlah dibeli: $jumlah <br>";
            $subTotal=$p->UnitPrice*$jumlah;
            $total=$total+$subTotal;
            ?>
            <tr>
                <td><?= $pid?></td>
                <td><?= $p->ProductName?></td>
                <td><?= $p->UnitPrice?></td>
                <td><?= $jumlah?></td>
                <td><?= $subTotal?></td>
            </tr>
            <?php
        }

    ?>
    <tr>
        <td></td>
        <td>Total</td>
        <td></td>
        <td></td>
        <td><?=$total?></td>
    </tr>
    </table>
    <form action="bayar.php" method="GET">
        <input type="hidden" name="customerID" value="VINET">
        <button type="submit">Bayar</button>
    </form>
</body>
</html>