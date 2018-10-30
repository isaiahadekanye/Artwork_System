<?php   
include_once './sqlConnection.php';
$key = $_GET['keyword'];
$keyword = htmlspecialchars($key);
$stmt = "SELECT Artwork.ArtworkID, 
                Artwork.Artwork_Name, 
                Artwork.ArtistID, 
                Artist.ArtistID,
                Artist.FirstName, 
                Artist.LastName, 
                Location.City, 
                Location.Country, 
                Artwork.Price, 
                Artwork.DateOfProduction,
                Image.Large
                FROM Artwork INNER JOIN Artist ON Artwork.ArtistID = Artist.ArtistID
                             INNER JOIN Location ON Artwork.LocationID = Location.LocationID
                             INNER JOIN Image ON Artwork.ImageID = Image.ImageID
                             WHERE Artwork_Name LIKE '%{$keyword}%' ";
    
$result = $conn->query($stmt);
    if ($result->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';           
            echo '<th>ArtworkID</th>';
            echo '<th>Artwork Name</th>';
            echo '<th>Created By</th>';
            echo '<th>Location</th>';
            echo '<th>Price</th>';
            echo '<th>Date Of Production</th>';
            echo '<th>Image</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["ArtworkID"] . '</td>';
                    echo '<td><a href="https://artwork-system.000webhostapp.com/components/individualArtwork.php?artworkid=' . $row["ArtworkID"] .'">' . $row["Artwork_Name"] . '</a></td>';
                    echo '<td><a href="https://artwork-system.000webhostapp.com/components/individualArtist.php?artistname='. $row["FirstName"] .'" href="#">' . $row["FirstName"] . " " . $row["LastName"] . '</a></td>';
                    echo '<td>' . $row["City"] .  '</td>';
                    echo '<td>' . $row["Price"] . '</td>';
                    echo '<td>' . $row["DateOfProduction"] . '</td>';
                    echo '<td><img src=' . $row["Large"] . '></td>';
                     echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';  
        } else {
            echo "<p class='text-danger'>0 results, keyword does not exist in the Artwork table</p>";
        }
mysqli_close($conn);
?> 