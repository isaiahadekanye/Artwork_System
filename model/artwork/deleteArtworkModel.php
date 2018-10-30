<?php
include_once '../../components/sqlConnection.php';
$artworkid = $_POST['artworkid'];

$sql = "DELETE FROM Artwork WHERE ArtworkID = '$artworkid'";

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);
?>