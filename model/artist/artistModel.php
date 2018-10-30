<?php
$sql = "SELECT Artist.ArtistID, 
           Artist.FirstName, 
           Artist.LastName, 
           Artist.Born, 
           Artist.Died, 
           Artist.Residence, 
           Artist.GenreID,
           Artist.FamousWorks, 
           Genre.Name, 
           Artist.ImageID, 
           Image.Small, 
           Image.Large 
           FROM 
           ((Artist   INNER JOIN Genre ON Artist.GenreID = Genre.GenreID) 
                      INNER JOIN Image ON Artist.ImageID = Image.ImageID)
                      ORDER BY Artist.ArtistID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ArtistID</th>';
    echo '<th>Name</th>';
    echo '<th>Date Of Birth</th>';
    echo '<th>Date Of Death</th>';
    echo '<th>Residence</th>';
    echo '<th>Genre</th>';
    echo '<th>FamousWorks</th>';
    echo '<th>Thumbnail</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["ArtistID"] . '</td>';
        echo '<td>' . $row["FirstName"] . " " . $row["LastName"] . '</td>';
        echo '<td>' . $row["Born"] . '</td>';
        echo '<td>' . $row["Died"] . '</td>';
        echo '<td>' . $row["Residence"] . '</td>';
        echo '<td>' . $row["Name"] . '</td>';
        echo '<td>' . $row["FamousWorks"] . '</td>';
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