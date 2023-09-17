<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query12</title>
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

    $sql = "SELECT e.event_category, AVG(r.rating) AS average_rating, COUNT(r.rating) AS rating_count FROM events e LEFT JOIN reviews r ON e.event_ID = r.event_ID GROUP BY e.event_category ORDER BY average_rating DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query retrieves the average ratings for different event categories, helping to identify which event categories are more popular and better received by customers. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT e.event_category, AVG(r.rating) AS average_rating, COUNT(r.rating) AS rating_count FROM events e LEFT JOIN reviews r ON e.event_ID = r.event_ID GROUP BY e.event_category ORDER BY average_rating DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Category</th><th>Average Rating</th><th>Rating Count</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_category"]."</td><td>".$row["average_rating"]."</td><td>".$row["rating_count"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>