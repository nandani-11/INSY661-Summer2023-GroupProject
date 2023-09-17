<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query13</title>
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

    $sql = "SELECT e.event_name, SUM(t.ticket_price) AS total_revenue, COUNT(t.ticket_ID) AS attendance FROM events e JOIN tickets t ON e.event_ID = t.event_ID GROUP BY e.event_ID HAVING total_revenue > 100 AND attendance < 50 ORDER BY total_revenue DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query identifies events that have high revenue but relatively low attendance, which might indicate an opportunity to improve marketing efforts. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT e.event_name, SUM(t.ticket_price) AS total_revenue, COUNT(t.ticket_ID) AS attendance FROM events e JOIN tickets t ON e.event_ID = t.event_ID GROUP BY e.event_ID HAVING total_revenue > 100 AND attendance < 50 ORDER BY total_revenue DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Total Revenue</th><th>Attendance</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["total_revenue"]."</td><td>".$row["attendance"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>