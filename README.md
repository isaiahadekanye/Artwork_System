# Artwork_System

Artwork System showing how PHP, SQL, HTML, CSS AND JAVSCRIPT.The System is easily updatable with the SQL Database. It also shows how to connect various SQL Tables and users can modufy various data in the database and see how the tables interact. 

[The System is Located Here](https://artwork-system.000webhostapp.com/index.php)

## Relation between SQL Tables 
        
![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/relation.png)

## SQL Queries 

* Add new Data: 
`Insert INTO Artist(FirstName, LastName, Born, Died, Residence, GenreID, FamousWorks, ImageID) VALUES('$firstname', '$lastname', '$born', '$died', '$residence', '$genreid', '$famousworks', '$imageid')`

* Delete Data:
`DELETE FROM Artist WHERE ArtistID = '$artistid'`

* Modify Data:
`UPDATE Artist SET 
  FirstName = '$firstname1',
  LastName = '$lastname1', 
  Born  = '$born1', 
  Died = '$died1', 
  Residence = '$residence1', 
  GenreID  = '$genreid1', 
  FamousWorks  = '$famousworks1', 
  ImageID = '$imageid1'
  WHERE ArtistID = '$artistid'"`

* Joining Tables:
`SELECT Artist.ArtistID, Artist.FirstName, Artist.LastName, Artist.Born, Artist.Died, Artist.Residence, Artist.GenreID,Artist.FamousWorks, Genre.Name,Artist.ImageID,Image.Large, Image.Small FROM Artist 
INNER JOIN Genre ON Artist.GenreID = Genre.GenreID 
INNER JOIN Image ON Artist.ImageID = Image.ImageID 
WHERE Artist.ArtistID = ?`

* Search Database:
`SELECT Artwork.ArtworkID, Artwork.Artwork_Name, Artwork.ArtistID, Artist.ArtistID, Artist.FirstName, Artist.LastName, Location.City, Location.Country, Artwork.Price, Artwork.DateOfProduction,Image.Large FROM Artwork
                  INNER JOIN Artist ON Artwork.ArtistID = Artist.ArtistID
                  INNER JOIN Location ON Artwork.LocationID = Location.LocationID
                  INNER JOIN Image ON Artwork.ImageID = Image.ImageID
                  WHERE Artwork_Name LIKE '%{$keyword}%' `

## SQL Tables

* Artist Table, with ArtistID as Primary Key and foreign keys GenreID and ImageID.

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/artist.png)

* Artwork Table, with ArtworkID as Primary Key and foreign keys GenreID,ImageID, ArtistID and LocationID.

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/artwork.png)

* Customer Table, with CustomerID as Primary Key and foreign key LocationID.

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/customer.png)

* Genre Table, With GenreID as Primary Key

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/genre.png)

* Image Table with ImageID as Primary key

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/image.png)

* Location Table with LocationID as Primary key

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/location.png)

* Museum Table with MuseumID as Primary key and foreign keys ImageID and LocationID.

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/museum.png)

* Review Table with ReviewID as Primary key and foreign key ArtworkID.

![alt text](https://github.com/isaiahadekanye/Artwork_System/blob/master/tables%20sql/review.png)

