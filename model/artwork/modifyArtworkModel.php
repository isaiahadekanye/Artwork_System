<?php
include_once '../../components/sqlConnection.php';

$artworkid = $_POST['artworkid'];
$stmt = $conn->prepare("SELECT Artwork.ArtworkID, 
                               Artwork.Artwork_Name, 
                               Artwork.DateOfProduction, 
                               Artwork.Type, 
                               Artwork.Dimension, 
                               Artwork.LocationID, 
                               Artwork.ArtistID,
                               Artwork.GenreID,
                               Artwork.Price,
                               Genre.Name,
                               Artist.FirstName, 
                               Artist.LastName, 
                               Location.Address1,
                               Artwork.ImageID,
                               Image.Large, 
                               Image.Small
                               FROM Artwork INNER JOIN Genre ON Artwork.GenreID = Genre.GenreID 
                                            INNER JOIN Artist ON Artwork.ArtistID = Artist.ArtistID
                                            INNER JOIN Location ON Artwork.LocationID = Location.LocationID 
                                            INNER JOIN Image ON Artwork.ImageID = Image.ImageID 
                                            WHERE Artwork.ArtworkID = ? ");
               
$stmt->bind_param("s",$artworkid);
$stmt->execute();
$result = $stmt->get_result();
$artwork = $result->fetch_assoc();

$name = !empty($_POST["artworkName"]) ? $_POST['artworkName'] : $artwork["Artwork_Name"];
$artist = !empty($_POST["artist"]) ? $_POST['artist'] : $artwork["ArtistID"];
$genre = !empty($_POST["genre"]) ? $_POST['genre'] : $artwork["GenreID"]; 
$production = !empty($_POST["dateOfProduction"]) ? $_POST['dateOfProduction'] : $artwork["DateOfProduction"];
$type = !empty($_POST["type"]) ? $_POST['type'] : $artwork["Type"];  
$dimension = !empty($_POST["dimension"]) ?  $_POST['dimension'] : $artwork["Dimension"];  
$location = !empty($_POST ["location"]) ? $_POST['location'] : $artwork["LocationID"];
$image = !empty($_POST["image"]) ? $_POST['image'] : $artwork["ImageID"]; 
$price = !empty($_POST["price"]) ? $_POST['price'] : $artwork["Price"]; 

$sql = "UPDATE Artwork SET Artwork_Name = '$name',
                           ArtistID = '$artist',
                           GenreID = '$genre', 
                           DateOfProduction = '$production', 
                           Type = '$type', 
                           Dimension = '$dimension', 
                           LocationId = '$location', 
                           ImageID = '$image', 
                           Price = '$price'
                           WHERE ArtworkID = '$artworkid'";

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);
?>