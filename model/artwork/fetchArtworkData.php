<?php
   include_once "../../components/sqlConnection.php";
   $option = intval($_GET['option']);
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
    echo '<th>Image</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["ArtworkID"] . '</td>';
        echo '<td><a href="https://artwork-system.000webhostapp.com/components/individualArtwork.php?artworkid=' . $row["ArtworkID"] .'">' . $row["Artwork_Name"] . '</a></td>';
        echo '<td><a href="https://artwork-system.000webhostapp.com/components/individualArtist.php?artistname='. $row["FirstName"] .'" href="#">' . $row["FirstName"] . " " . $row["LastName"] . '</a></td>';
        echo '<td>' . $row["Genre"] . '</td>';
        echo '<td>' . $row["Type"] . '</td>';
        echo '<td>' . $row["Dimension"] . '</td>';
        echo '<td>' . $row["City"] . ", " . $row["Country"] . '</td>';
        echo '<td>' . $row["Price"] . '</td>';
        echo '<td>' . $row["DateOfProduction"] . '</td>';
        echo '<td><img src=' . $row["Large"] . '></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
   mysqli_close($conn);  
?>

                  
                
                                 