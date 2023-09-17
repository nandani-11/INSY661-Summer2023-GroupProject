<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query16</title>
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

    $sql = "SELECT event_name, event_start, event_end, TIMESTAMPDIFF(MINUTE, event_start, event_end) AS event_duration_minutes FROM events ORDER BY event_duration_minutes ASC LIMIT 5;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query is to retrieve events and calculate their duration provides valuable business insights in the context of event management and scheduling optimisation. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT event_name, event_start, event_end, TIMESTAMPDIFF(MINUTE, event_start, event_end) AS event_duration_minutes FROM events ORDER BY event_duration_minutes ASC LIMIT 5; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Start Time</th><th>End Time</th><th>Duration</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["event_start"]."</td><td>".$row["event_end"]."</td><td>".$row["event_duration_minutes"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>