<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query20</title>
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

    $sql = "SELECT e.event_name, e.event_category, STDDEV(r.rating) AS review_rating_variance FROM events e JOIN reviews r ON e.event_ID = r.event_ID GROUP BY e.event_ID HAVING review_rating_variance > 1 ORDER BY review_rating_variance DESC;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query identifies events that have a high variance in their review ratings, indicating events that have mixed or polarized audience opinions. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT e.event_name, e.event_category, STDDEV(r.rating) AS review_rating_variance FROM events e JOIN reviews r ON e.event_ID = r.event_ID GROUP BY e.event_ID HAVING review_rating_variance > 1 ORDER BY review_rating_variance DESC; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Event Category</th><th>Review Rating Variance</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["event_category"]."</td><td>".$row["review_rating_variance"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>