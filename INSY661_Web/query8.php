<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query8</title>
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

    $sql = "SELECT E.event_genre, AVG(T.ticket_price) AS avg_price FROM events E, tickets T WHERE E.event_ID = T.event_ID GROUP BY E.event_genre ORDER BY avg_price LIMIT 10;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: Calculate the average ticket price for events in each event genre, show the result in ascending order of price. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT E.event_genre, AVG(T.ticket_price) AS avg_price FROM events E, tickets T WHERE E.event_ID = T.event_ID GROUP BY E.event_genre ORDER BY avg_price LIMIT 10; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Genre</th><th>Average Ticket Price</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_genre"]."</td><td>".$row["avg_price"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>