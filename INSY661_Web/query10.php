<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query10</title>
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

    $sql = "SELECT
    e.event_name,
    e.event_category,
    SUM(ec.payment_to_client) AS revenue_to_clients,
    SUM(ec.payment_to_ticketmaster) AS revenue_to_ticketmaster,
    (SUM(ec.payment_to_client) / (SUM(ec.payment_to_client) + SUM(ec.payment_to_ticketmaster))) * 100 AS client_percentage,
    (SUM(ec.payment_to_ticketmaster) / (SUM(ec.payment_to_client) + SUM(ec.payment_to_ticketmaster))) * 100 AS ticketmaster_percentage

FROM
    events e
JOIN
    events_has_clients ec ON e.event_ID = ec.event_ID
GROUP BY
    e.event_ID
ORDER BY
    client_percentage DESC;
";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query calculates the revenue distribution by percentage between clients and Ticketmaster for each event, considering the payments made to clients and Ticketmaster for each event. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT
    e.event_name,
    e.event_category,
    SUM(ec.payment_to_client) AS revenue_to_clients,
    SUM(ec.payment_to_ticketmaster) AS revenue_to_ticketmaster,
    (SUM(ec.payment_to_client) / (SUM(ec.payment_to_client) + SUM(ec.payment_to_ticketmaster))) * 100 AS client_percentage,
    (SUM(ec.payment_to_ticketmaster) / (SUM(ec.payment_to_client) + SUM(ec.payment_to_ticketmaster))) * 100 AS ticketmaster_percentage

FROM
    events e
JOIN
    events_has_clients ec ON e.event_ID = ec.event_ID
GROUP BY
    e.event_ID
ORDER BY
    client_percentage DESC;
 </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Event Category</th><th>Clients Revenue</th><th>Business Revenue</th><th>Clients Percentage</th><th>Business Percentage</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["event_category"]."</td><td>".$row["revenue_to_clients"]."</td><td>".$row["revenue_to_ticketmaster"]."</td><td>".$row["client_percentage"]."</td><td>".$row["ticketmaster_percentage"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>