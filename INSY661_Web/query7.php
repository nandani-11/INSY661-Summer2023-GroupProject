<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query7</title>
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

    $sql = "SELECT E.event_name, E.event_start, E.event_category, COUNT(T.ticket_ID) AS num_of_tickets FROM events E JOIN tickets T ON E.event_ID = T.event_ID WHERE E.event_start > NOW() AND E.event_genre = ( SELECT event_genre FROM events WHERE event_name = 'Music Festival' ) GROUP BY T.event_ID ORDER BY num_of_tickets DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: This query retrieves information about the event with the highest number of tickets among events with genre as the 'Music Festival', and whose start date is in the future. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT E.event_name, E.event_start, E.event_category, COUNT(T.ticket_ID) AS num_of_tickets FROM events E JOIN tickets T ON E.event_ID = T.event_ID WHERE E.event_start > NOW() AND E.event_genre = ( SELECT event_genre FROM events WHERE event_name = 'Music Festival' ) GROUP BY T.event_ID ORDER BY num_of_tickets DESC LIMIT 1; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Event Start Time</th><th>Event Category</th><th>Number of Tickets</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["event_start"]."</td><td>".$row["event_category"]."</td><td>".$row["num_of_tickets"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>