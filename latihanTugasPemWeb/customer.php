<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER</title>
</head>
<?php
    $mysqli=new mysqli('localhost','root','','nwindtugas');
?>

<body>
    <table border="1">
        <tr>
            <td>CustomerID</td>
            <td>CompanyName</td>
            <td>OrderList</td>
        </tr>
        <?php
        $sql="SELECT * FROM customers";
        $customers=$mysqli->query($sql);
        while($c=$customers->fetch_object()){
        ?>
        <tr>
            <td><?=$c->CustomerID ?></td>
            <td><?=$c->CompanyName?></td>
            <td><a href="orderlist.php?cid=<?=$c->CustomerID?>">Link</a></td>            
        </tr>
            <?php 
            }
        ?>
    </table>
</body>
</html>