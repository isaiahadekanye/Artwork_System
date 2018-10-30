<?php 
include_once '../../components/sqlConnection.php';

$artistid = $_POST['artistid'];

$stmt = $conn->prepare("SELECT Artist.ArtistID, 
                                       Artist.FirstName, 
                                       Artist.LastName, 
                                       Artist.Born, 
                                       Artist.Died, 
                                       Artist.Residence, 
                                       Artist.GenreID,
                                       Artist.FamousWorks, 
                                       Genre.Name,
                                       Genre.GenreID,
                                       Artist.ImageID,
                                       Image.Large, 
                                       Image.Small 
                                       FROM Artist INNER JOIN Genre ON Artist.GenreID = Genre.GenreID 
                                                   INNER JOIN Image ON Artist.ImageID = Image.ImageID 
                                                   WHERE Artist.ArtistID = ? ");
$stmt->bind_param("s",$artistid);
$stmt->execute();
$result = $stmt->get_result();
$artist = $result->fetch_assoc();

$firstname = !empty($_POST["firstName"]) ? $_POST['firstName'] : $artist["FirstName"];
$lastname =  !empty($_POST["lastName"]) ? $_POST['lastName'] : $artist["LastName"];
$born = date('Y-m-d', strtotime($_POST['dateOfBirth']));
if($born == "1970-01-01"){ $born = $artist["Born"];}
$died = date('Y-m-d', strtotime($_POST['dateOfDeath']));
if($died == "1970-01-01"){ $died = $artist["Died"];}
$residence = !empty($_POST["residence"]) ? $_POST['residence'] : $artist["Residence"];
$genreid = !empty($_POST["genre"]) ? $_POST['genre']: $artist["GenreID"];
$famousworks = !empty($_POST["famousWorks"]) ? $_POST['famousWorks'] : $artist["FamousWorks"];
$imageid = !empty($_POST["image"]) ? $_POST['image'] : $artist['ImageID'];

$sql = "UPDATE Artist SET FirstName = '$firstname',
                          LastName = '$lastname', 
                          Born  = '$born', 
                          Died = '$died', 
                          Residence = '$residence', 
                          GenreID  = '$genreid', 
                          FamousWorks  = '$famousworks', 
                          ImageID = '$imageid'
                          WHERE ArtistID = '$artistid'";    

if (!(mysqli_query($conn, $sql))) {
    echo "Error inserting data. " . mysqli_error($conn);
}

mysqli_close($conn);
?>