<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Group3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>query6</title>
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

    $sql = "SELECT E.event_name, E.event_category FROM events E, events_has_venues EV, venues V, address A WHERE E.event_ID = EV.event_ID AND EV.venue_ID = V.venue_ID AND V.address_ID = A.address_ID AND A.city = 'Harbor City';";
    $result = mysqli_query($conn, $sql);
    echo "<br><br>";
    echo "<div class = 'title'> Description: Find all the events happening in the city: Harbor City. Display the event names and category. </div>";
    echo "<br>";
    echo "<div class = 'title'> SQL query: SELECT E.event_name, E.event_category FROM events E, events_has_venues EV, venues V, address A WHERE E.event_ID = EV.event_ID AND EV.venue_ID = V.venue_ID AND V.address_ID = A.address_ID AND A.city = 'Harbor City'; </div>";
    echo "<br>";

   if (mysqli_num_rows($result) == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try again! </div>";
    } else{
        echo "<table><tr><th>Event Name</th><th>Event Category</th></tr>";
        //output data of each row
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["event_name"]."</td><td>".$row["event_category"]."</td></tr>";
        }
        echo "</table>";    
    }
    ?>  
</main>

</body>
</html>