<html>
 <head>
  <title>Art Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </head>
 <body>
<?php
   include_once "./sqlConnection.php";
   include_once './introComponent.php';
   $option = intval($_GET['artworkid']);
   $stmt = $conn->prepare("SELECT Artwork.ArtworkID, 
                                 Artwork.Artwork_Name, 
                                 Artwork.DateOfProduction, 
                                 Artwork.Type, 
                                 Artwork.Dimension, 
                                 Artwork.LocationID, 
                                 Artwork.ArtistID,
                                 Artwork.GenreID,
                                 Artwork.Price,
                                 Genre.Name AS Genre,
                                 Artist.FirstName, 
                                 Artist.LastName, 
                                 Location.City,
                                 Location.Country,
                                 Artwork.ImageID,
                                 Image.Large, 
                                 Image.Small
                                 FROM Artwork INNER JOIN Genre ON Artwork.GenreID = Genre.GenreID 
                                             INNER JOIN Artist ON Artwork.ArtistID = Artist.ArtistID
                                             INNER JOIN Location ON Artwork.LocationID = Location.LocationID 
                                             INNER JOIN Image ON Artwork.ImageID = Image.ImageID 
                                             WHERE Artwork.ArtworkID = ? ");
    $stmt->bind_param("s",$option);
    $stmt->execute();
    $result = $stmt->get_result();
    $artwork = $result->fetch_assoc();
    
    if($artwork > 1){
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col">';
        echo '<img src= "' .$artwork["Small"] . '"class="img-fluid" alt="Artwork image" >';
        echo '</div>';
        echo '<div class="col">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ArtworkID</th>';
        echo '<th>Name</th>';
        echo '<th>Artist</th>';
        echo '<th>Genre</th>';
        echo '<th>Type</th>';
        echo '<th>Dimension</th>';
        echo '<th>Location</th>';
        echo '<th>Price</th>';
        echo '<th>Date Of Production</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $artwork["ArtworkID"] . '</td>';
        echo '<td>' . $artwork["Artwork_Name"] . '</td>';
        echo '<td>' . $artwork["FirstName"] . " " . $artwork["LastName"] . '</td>';
        echo '<td>' . $artwork["Genre"] . '</td>';
        echo '<td>' . $artwork["Type"] . '</td>';
        echo '<td>' . $artwork["Dimension"] . '</td>';
        echo '<td>' . $artwork["City"] . ", " . $artwork["Country"] . '</td>';
        echo '<td>' . $artwork["Price"] . '</td>';
        echo '<td>' . $artwork["DateOfProduction"] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "<h2 class='text-danger'>No Artwork matching criteria in Database</h2>";
    }
   
   mysqli_close($conn);  
?>
</body>
</html>                 
                
                                 