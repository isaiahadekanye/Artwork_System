<?php
$sql = "SELECT 
        Review.ReviewID, 
        Review.Review, 
        Review.ArtworkID, 
        Artwork.ArtworkID, 
        Artwork.Artwork_Name  
        FROM Review INNER JOIN Artwork ON Review.ArtworkID = Artwork.ArtworkID
                    ORDER BY ReviewID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ReviewID</th>';
    echo '<th>Review</th>';
    echo '<th>Artwork Name</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["ReviewID"] . '</td>';
        echo '<td>' . $row["Review"] . '</td>';
        echo '<td>' . $row["Artwork_Name"] . '</td>';
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