<html>
 <head>
  <title>Art Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </head>
 <body>
<?php
    include_once "./sqlConnection.php";
    include_once './introComponent.php';
    $name = $_GET['artistname'];
    $stmt = $conn->prepare("SELECT Artist.ArtistID, 
                                   Artist.FirstName, 
                                   Artist.LastName, 
                                   Artist.Born, 
                                   Artist.Died, 
                                   Artist.Residence, 
                                   Artist.GenreID,
                                   Artist.FamousWorks, 
                                   Genre.Name,
                                   Artist.ImageID,
                                   Image.Large, 
                                   Image.Small
                                   FROM Artist INNER JOIN Genre ON Artist.GenreID = Genre.GenreID 
                                               INNER JOIN Image ON Artist.ImageID = Image.ImageID 
                                               WHERE Artist.FirstName = ? ");
    $stmt->bind_param("s",$name);
    $stmt->execute();
    $result = $stmt->get_result();
    $artist = $result->fetch_assoc();
   
    if($artist > 1){
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col">';
        echo '<img src= "' .$artist["Small"] . '"class="img-fluid" alt="Artwork image" >';
        echo '</div>';
        echo '<div class="col">';
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
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $artist["ArtistID"] . '</td>';
        echo '<td>' . $artist["FirstName"] . " " . $artist["LastName"] . '</td>';
        echo '<td>' . $artist["Born"] . '</td>';
        echo '<td>' . $artist["Died"] . '</td>';
        echo '<td>' . $artist["Residence"] . '</td>';
        echo '<td>' . $artist["Name"] . '</td>';
        echo '<td>' . $artist["FamousWorks"] . '</td>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "<h2 class='text-danger'>No Artist matching criteria in Database</h2>";
    }
    mysqli_close($conn);
?>
</body>
</html>                 
    
    
    
                
                                 