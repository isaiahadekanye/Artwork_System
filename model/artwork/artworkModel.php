<?php
$sql = "SELECT 
       Artwork.ArtworkID, 
       Artwork.Artwork_Name, 
       Artist.FirstName, 
       Artist.LastName, 
       Genre.Name AS Genre, 
       Artwork.Type,
       Artwork.Dimension,  
       Location.City, 
       Location.Country, 
       Artwork.Price, 
       Artwork.DateOfProduction,
       Image.Small, Image.Large
       FROM
       ((((Artwork INNER JOIN Artist ON Artwork.ArtistID = Artist.ArtistID)
                   INNER JOIN Genre ON Artwork.GenreID = Genre.GenreID)
                   INNER JOIN Location ON Artwork.LocationID = Location.LocationID)
                   INNER JOIN Image ON Artwork.ImageID = Image.ImageID) ORDER BY ArtworkID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
        echo '<td>' . $row["Artwork_Name"] . '</td>';
        echo '<td>' . $row["FirstName"] . " " . $row["LastName"] . '</td>';
        echo '<td>' . $row["Genre"] . '</td>';
        echo '<td>' . $row["Type"] . '</td>';
        echo '<td>' . $row["Dimension"] . '</td>';
        echo '<td>' . $row["City"] . '</td>';
        echo '<td>' . $row["Price"] . '</td>';
        echo '<td>' . $row["DateOfProduction"] . '</td>';
        echo '<td><img src=' . $row["Large"] . '></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "<h2>Empty Table</h2>";
}

if (!(mysqli_query($conn, $sql))) {
    echo "Error viewing table. " . mysqli_error($conn);
}

mysqli_close($conn);

?>