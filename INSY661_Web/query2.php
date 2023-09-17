<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query2</title>
    <link rel="stylesheet" href="style.css">

    <!-- css google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
</head>

<body>

<?php
include 'connectDB.php';
?>

<header>
    <!-- If need image here <img src="/A6/vaccine.jpg" alt="vaccine" id="image"> -->
    <div id="page-title"> <a href="MainPage.html"> Ticketdabbler </a> </div>
</header>

<main>
    <?php

    $sql = "SELECT * FROM orders WHERE customer_ID IN(SELECT customer_ID FROM customers WHERE name = 'Jane Smith')";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: Find all order information (ID, date, total amount, payment status, customer ID) by a customer named ‘Jane Smith’ </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT * FROM orders WHERE customer_ID IN( SELECT customer_ID FROM customers WHERE name = ‘Jane Smith’ ); </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Order ID</th><th>Order Date</th><th>Total Payment</th><th>Payment Status</th><th>Customer ID</tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["order_ID"]."</td><td>".$row["order_date"]."</td><td>".$row["total_amount"]."</td><td>".$row["payment_status"]."</td><td>".$row["customer_ID"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>