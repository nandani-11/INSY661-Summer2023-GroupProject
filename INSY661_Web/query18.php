<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query18</title>
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

    $sql = "SELECT a.city, COUNT(e.event_ID) AS event_count FROM address a JOIN venues v ON a.address_ID = v.address_ID JOIN events_has_venues ev ON v.venue_ID = ev.venue_ID JOIN events e ON ev.event_ID = e.event_ID GROUP BY a.city ORDER BY event_count DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query finds the cities with the highest number of events. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT a.city, COUNT(e.event_ID) AS event_count FROM address a JOIN venues v ON a.address_ID = v.address_ID JOIN events_has_venues ev ON v.venue_ID = ev.venue_ID JOIN events e ON ev.event_ID = e.event_ID GROUP BY a.city ORDER BY event_count DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>City</th><th>Number of Events Hold</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["city"]."</td><td>".$row["event_count"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>