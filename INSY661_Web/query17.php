<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query17</title>
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

    $sql = "SELECT e.event_category, COUNT(t.ticket_ID) AS num_tickets_sold, MIN(t.ticket_price) AS min_ticket_price, MAX(t.ticket_price) AS max_ticket_price, ROUND(AVG(t.ticket_price), 2) AS avg_ticket_price FROM events e JOIN tickets t ON e.event_ID = t.event_ID GROUP BY e.event_category ORDER BY num_tickets_sold DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query analyzes the distribution of ticket prices across event categories, providing insights into pricing strategies for different types of events. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT e.event_category, COUNT(t.ticket_ID) AS num_tickets_sold, MIN(t.ticket_price) AS min_ticket_price, MAX(t.ticket_price) AS max_ticket_price, ROUND(AVG(t.ticket_price), 2) AS avg_ticket_price FROM events e JOIN tickets t ON e.event_ID = t.event_ID GROUP BY e.event_category ORDER BY num_tickets_sold DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Category</th><th>Number of Tickets Sold</th><th>Min Ticket Price</th><th>Max Ticket Price</th><th>Avg Ticket Price</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_category"]."</td><td>".$row["num_tickets_sold"]."</td><td>".$row["min_ticket_price"]."</td><td>".$row["max_ticket_price"]."</td><td>".$row["avg_ticket_price"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>