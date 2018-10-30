<?php
include_once '../../components/sqlConnection.php';
$artistid = $_POST['artistid'];

$sql = "DELETE FROM Artist WHERE ArtistID = '$artistid'";

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);
?>

   