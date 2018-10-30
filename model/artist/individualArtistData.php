<?php
class Artist{
    public function getArtistData($artist){
      include_once '../../components/sqlConnection.php';
        
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
                                                   WHERE Artist.ArtistID = ? ");
        $stmt->bind_param("s",$artist);
        $stmt->execute();
        $result = $stmt->get_result();
        $artist = $result->fetch_assoc();
        return $artist;
        mysqli_close($conn);
    }
}
                  
?>