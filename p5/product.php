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
        $sql = "select * from categories";
        $categories = $mysqli->query($sql);
        while($ca=$categories->fetch_object()){
            ?>
            
            [<a href="product.php?cid=<?=$ca->CategoryID?>"><?=$ca->CategoryName?></a>]


            <?php
        }
    ?>
    <table>
    <?php
        
        //var_dump($mysqli);
        $cid = $_GET['cid'];
        $sql = "select * from products where CategoryID=$cid";
        $products = $mysqli->query($sql);
        // var_dump($products->fetch_object());
        // var_dump($products->fetch_object());

        while($p=$products->fetch_object()){
            // print $p->ProductID;
            // print " ";
            // print $p->ProductName;
            // print " ";
            // print $p->UnitPrice;
            // print "<br>";
            ?>

            <tr>
                <td><?=$p->ProductID?></td>
                <td> <a href="detail.php?pid=<?=$p->ProductID?>" ><?=$p->ProductName?></a> </td>
                <td><?=$p->UnitPrice?></td>
            </tr>

            <?php
        }
    ?>
    </table>
</body>
</html>