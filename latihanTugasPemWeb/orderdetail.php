<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDERDETAILS</title>
</head>
<?php
    $ord=$_GET['ord'];
    $mysqli=new mysqli('localhost','root','','nwindtugas');
?>

<body>
    <table border="1">
        <tr>
            <td>Order ID</td>
            <td>Product Name</td>
            <td>Unit Price</td>
            <td>Quantity</td>
            <td>Discount</td>
            <td>Sub Total</td>
        </tr>
        <?php
        $sql="SELECT * FROM orderdetails o,products p
              WHERE p.ProductID=o.ProductID
              AND o.OrderID=$ord";
        $detail=$mysqli->query($sql);
        $total=0;
        while($det=$detail->fetch_object()){
            $normal=$det->UnitPrice*$det->Quantity;
            $subtotal=$normal-($normal*$det->Discount);
            $total=$total+$subtotal;
        ?>
        <tr>
            <td><?=$det->OrderID ?></td>
            <td><?=$det->ProductName?></td>
            <td><?=$det->UnitPrice?></td>
            <td><?=$det->Quantity?></td>
            <td><?=$det->Discount?></td>
            <td><?=$subtotal?></td>            
        </tr>
            <?php 
            }
        ?>
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?=$total?></td>
        </tr>
    </table>
    
</body>
</html>