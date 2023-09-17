<?php

$user='if0_34702491';   /*  in the home tab , you will find this info */
$password='DYOwZaNjn8f';  /*  in the home tab , you will find this info ; just unhide the password */

$host='sql212.infinityfree.com';    /*  click on mysql databases, then find the value in  mysqlhostname */
$port='3306';
$db='if0_34702491_insyproject'; /*  click on mysql databases, then select the name of the database that you have created */
$conn = mysqli_connect( $host, $user, $password, $db );

/*if( $conn ) echo "It Works!!";
else echo "Mysql doesn't work!";
*/
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

?>