<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    $mysqli = new mysqli('localhost', 'root', '', 'nwind');
?>
<body>
    <?php
        $pid=$_GET["pid"];
        $sql="select * from products p,suppliers s, categories c 
              where p.ProductID = $pid and s.SupplierID = p.SupplierID
              and c.CategoryID=p.CategoryID";

        $products = $mysqli->query($sql);
        // var_dump($products->fetch_object());
        $p=$products->fetch_object();
    ?>
    <table>
        <tr>
            <td>Product ID</td>
            <td>:</td>
            <td><?=$p->ProductID?></td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td>:</td>
            <td><?=$p->ProductName?></td>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td>:</td>
            <td><?=$p->CompanyName?></td>
        </tr>
        <tr>
            <td>Category Name</td>
            <td>:</td>
            <td><?=$p->CategoryName?></td>
        </tr>
        <tr>
            <td>Quantity Per Unit</td>
            <td>:</td>
            <td><?=$p->QuantityPerUnit?></td>
        </tr>
        <tr>
            <td>Unit Price</td>
            <td>:</td>
            <td><?=$p->UnitPrice?></td>
        </tr>
        <form action="cart.php" method="get">
            <input type="hidden" name="pid" value="<?=$p->ProductID?>">
            <tr>
                <td>Jumlah dibeli</td>
                <td>:</td>
                <td> <input type="text" name="jumlah"> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Beli"></td>
            </tr>
        </form>
    </table>

</body>
</html>