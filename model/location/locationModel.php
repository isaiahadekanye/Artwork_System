<?php
$sql = "SELECT 
        LocationID, 
        Address1, 
        City,
        Province,
        PostalCode, 
        Country 
        FROM 
        Location ORDER BY LocationID ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>LocationID</th>';
    echo '<th>Address</th>';
    echo '<th>City</th>';
    echo '<th>Province</th>';
    echo '<th>PostalCode</th>';
    echo '<th>Country</th>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["LocationID"] . '</td>';
        echo '<td>' . $row["Address1"] . '</td>';
        echo '<td>' . $row["City"] . '</td>';
        echo '<td>' . $row["Province"] . '</td>';
        echo '<td>' . $row["PostalCode"] . '</td>';
        echo '<td>' . $row["Country"] . '</td>';
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