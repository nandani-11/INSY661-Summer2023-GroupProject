<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query15</title>
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

    $sql = "SELECT v.venue_ID, v.name AS venue_name, v.capacity, AVG(t.ticket_price / v.capacity) AS avg_revenue_per_seat FROM venues v JOIN seats s ON v.venue_ID = s.venue_ID JOIN tickets t ON s.seat_ID = t.seat_ID GROUP BY v.venue_ID, v.name, v.capacity ORDER BY avg_revenue_per_seat DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query compares the average revenue generated per seat for events held in venues with different capacities, helping to understand the revenue efficiency of venues. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT v.venue_ID, v.name AS venue_name, v.capacity, AVG(t.ticket_price / v.capacity) AS avg_revenue_per_seat FROM venues v JOIN seats s ON v.venue_ID = s.venue_ID JOIN tickets t ON s.seat_ID = t.seat_ID GROUP BY v.venue_ID, v.name, v.capacity ORDER BY avg_revenue_per_seat DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Venue ID</th><th>Venue Name</th><th>Capacity</th><th>Avg Revenue Per Seat</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["venue_ID"]."</td><td>".$row["venue_name"]."</td><td>".$row["capacity"]."</td><td>".$row["avg_revenue_per_seat"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>