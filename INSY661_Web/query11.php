<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query11</title>
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

    $sql = "SELECT v.name, COUNT(ev.event_ID) AS num_events, v.capacity, (COUNT(ev.event_ID) / v.capacity) * 100 AS utilization_rate FROM venues v LEFT JOIN events_has_venues ev ON v.venue_ID = ev.venue_ID GROUP BY v.venue_ID ORDER BY utilization_rate DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query calculates the utilization rate of each venue by analyzing the number of events hosted compared to the venue's capacity. It helps assess the efficiency of venue usage. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT v.name, COUNT(ev.event_ID) AS num_events, v.capacity, (COUNT(ev.event_ID) / v.capacity) * 100 AS utilization_rate FROM venues v LEFT JOIN events_has_venues ev ON v.venue_ID = ev.venue_ID GROUP BY v.venue_ID ORDER BY utilization_rate DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Vanue Name</th><th>Number of Events Held</th><th>Capacity</th><th>Utilization Rate</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["name"]."</td><td>".$row["num_events"]."</td><td>".$row["capacity"]."</td><td>".$row["utilization_rate"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>