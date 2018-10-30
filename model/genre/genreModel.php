<?php
$sql = "SELECT 
        GenreID,
        Name 
        FROM Genre ORDER BY GenreID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>GenreID</th>';
    echo '<th>Name</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["GenreID"] . '</td>';
        echo '<td>' . $row["Name"] . '</td>';
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