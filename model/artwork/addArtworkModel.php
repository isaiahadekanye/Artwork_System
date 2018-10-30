<?php
include_once '../../components/sqlConnection.php';

$name = $_POST['artworkName'];
$artist = $_POST['artist'];
$genre= $_POST['genre']; 
$production = $_POST['dateOfProduction'];
$type = $_POST['type'];  
$dimension = $_POST['dimension'];  
$location = $_POST['location'];
$image = $_POST['image']; 
$price = $_POST['price']; 

$sql = "Insert INTO Artwork(Artwork_Name, ArtistID, GenreID, DateOfProduction, Type, Dimension, LocationId, ImageID, Price) VALUES('$name', '$artist', '$genre', '$production', '$type', '$dimension', '$location','$image', '$price')";

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);
?>