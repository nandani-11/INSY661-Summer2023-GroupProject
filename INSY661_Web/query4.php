<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query4</title>
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

    $sql = "SELECT C.name, C.email, SUM(O.total_amount) AS total, COUNT(order_ID) AS num_orders FROM orders O, customers C WHERE payment_status = 'Paid' AND O.customer_ID = C.customer_ID GROUP BY O.customer_ID ORDER BY total DESC, num_orders DESC LIMIT 10;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: Find names and emails of the top 10 customers who have made the highest total payments with their number of orders across all orders on our platform, helping to find loyal and active customers, and send promotional offers. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT C.name, C.email, SUM(O.total_amount) AS total, COUNT(order_ID) AS num_orders FROM orders O, customers C WHERE payment_status = 'Paid' AND O.customer_ID = C.customer_ID GROUP BY O.customer_ID ORDER BY total DESC, num_orders DESC LIMIT 10; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Name</th><th>Email</th><th>Total Payment</th><th>Number of Orders</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["total"]."</td><td>".$row["num_orders"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>