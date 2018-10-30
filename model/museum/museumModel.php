<?php
$sql = "SELECT 
        Museum.MuseumID, 
        Museum.Name, 
        Museum.Founded, 
        Museum.Attractions, 
        Location.City, 
        Location.Country,
        Image.Small, 
        Image.Large 
        FROM 
        ((Museum INNER JOIN Location ON Museum.LocationID = Location.LocationID)
                 INNER JOIN Image ON Museum.ImageID = Image.ImageID)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>MuseumID</th>';
    echo '<th>Name</th>';
    echo '<th>Founded</th>';
    echo '<th>Attractions</th>';
    echo '<th>Location</th>';
    echo '<th>Image</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["MuseumID"] . '</td>';
        echo '<td>' . $row["Name"] . '</td>';
        echo '<td>' . $row["Founded"] . '</td>';
        echo '<td>' . $row["Attractions"] . '</td>';
        echo '<td>' . $row["City"] . ', ' . $row["Country"] . '</td>';
        echo '<td><img src =' . $row["Large"] . '></td>';
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