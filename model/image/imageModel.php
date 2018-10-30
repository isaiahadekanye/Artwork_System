<?php
$sql = "SELECT 
        ImageID, 
        Large, 
        Small 
        FROM Image 
        ORDER BY ImageID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ImageID</th>';
    echo '<th>Large</th>';
    echo '<th>Thumbnail</th>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["ImageID"] . '</td>';
        echo '<td>' . $row["Small"] . '</td>';
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