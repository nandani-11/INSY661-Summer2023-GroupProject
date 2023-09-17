<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query19</title>
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

    $sql = "SELECT c.client_name, ec.payment_to_client, ec.payment_to_ticketmaster, (ec.payment_to_client - ec.payment_to_ticketmaster) AS payment_discrepancy FROM clients c JOIN events_has_clients ec ON c.client_ID = ec.client_ID HAVING payment_discrepancy > 1000 ORDER BY payment_discrepancy DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query identifies clients whose payments to Ticketmaster significantly differ from their payments to clients, suggesting potential discrepancies in financial agreements. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT c.client_name, ec.payment_to_client, ec.payment_to_ticketmaster, (ec.payment_to_client - ec.payment_to_ticketmaster) AS payment_discrepancy FROM clients c JOIN events_has_clients ec ON c.client_ID = ec.client_ID HAVING payment_discrepancy > 1000 ORDER BY payment_discrepancy DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Client Name</th><th>Payment to Client</th><th>Payment to Business</th><th>Payment Discrepancy </th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["client_name"]."</td><td>".$row["payment_to_client"]."</td><td>".$row["payment_to_ticketmaster"]."</td><td>".$row["payment_discrepancy"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>