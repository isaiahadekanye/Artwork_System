<?php
include_once '../../components/sqlConnection.php';

$firstname = $_POST['firstName'];
$lastname =  $_POST['lastName'] ;
$born = date('Y-m-d', strtotime($_POST['dateOfBirth']));
$died = date('Y-m-d', strtotime($_POST['dateOfDeath']));
$residence = $_POST['residence'];
$genreid = $_POST['genre'];
$famousworks =  $_POST['famousWorks'];
$imageid = $_POST['image'];
   
$sql = "Insert INTO Artist(FirstName, LastName, Born, Died, Residence, GenreID, FamousWorks, ImageID) VALUES('$firstname', '$lastname', '$born', '$died', '$residence', '$genreid', '$famousworks', '$imageid')";

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);

?>