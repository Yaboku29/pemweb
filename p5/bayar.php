<?php
    session_name("keranjang");
    session_start();
    $sid=$_GET['customerID'];
    $mysqli = new mysqli('localhost', 'root', '', 'nwind');
    //membuat order baru
    $sql="INSERT INTO orders (CustomerID,EmployeeID,OrderDate) values 
         ('$sid',5,now())";
    //print $sql;
    $mysqli->query($sql);
    //dapat nomor order baru
    $orderID=$mysqli->insert_id;
    //memasukkan barang yang dibeli ke orderDetail
    //print $orderID;

    foreach($_SESSION["belanja"] as $pid => $jumlah){
            $sql="select * from products where ProductID=$pid";
            $products = $mysqli->query($sql);
            $p=$products->fetch_object();
            $sqlInsert="insert into orderdetails (OrderID,ProductID,UnitPrice,
                        Quantity,Discount) values ($orderID,$pid,$p->UnitPrice,
                        $jumlah,0)";
            $mysqli->query($sqlInsert);
    }
?>