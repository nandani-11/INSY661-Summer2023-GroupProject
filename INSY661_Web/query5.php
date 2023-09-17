<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query5</title>
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

    $sql = "SELECT YEAR(ev.start_date) AS year, MONTH(ev.start_date) AS month, COUNT(DISTINCT ev.venue_ID) AS num_booked_venues FROM events_has_venues ev GROUP BY YEAR(ev.start_date), MONTH(ev.start_date) ORDER BY year ASC, num_booked_venues DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query calculates the number of venues booked for events in each month, helping to identify peak booking periods. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT YEAR(ev.start_date) AS year, MONTH(ev.start_date) AS month, COUNT(DISTINCT ev.venue_ID) AS num_booked_venues FROM events_has_venues ev GROUP BY YEAR(ev.start_date), MONTH(ev.start_date) ORDER BY year ASC, num_booked_venues DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Year</th><th>Month</th><th>Numer of Booked Venues</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["year"]."</td><td>".$row["month"]."</td><td>".$row["num_booked_venues"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>