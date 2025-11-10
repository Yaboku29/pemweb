<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDERS</title>
</head>
<?php
    $cid=$_GET['cid'];
    $mysqli=new mysqli('localhost','root','','nwindtugas');
?>

<body>
    <table border="1">
        <tr>
            <td>Order ID</td>
            <td>Order Date</td>
            <td>Order Detail</td>
        </tr>
        <?php
        $sql="SELECT * FROM orders WHERE CustomerID='$cid'";
        $orders=$mysqli->query($sql);
        while($ord=$orders->fetch_object()){
        ?>
        <tr>
            <td><?=$ord->OrderID ?></td>
            <td><?=$ord->OrderDate?></td>
            <td><a href="orderdetail.php?ord=<?=$ord->OrderID?>">Link</a></td>            
        </tr>
            <?php 
            }
        ?>
    </table>
</body>
</html>