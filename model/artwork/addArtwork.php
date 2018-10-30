<form method="post" name="input" onSubmit= "return addFormValidator()">
   <input type="hidden" name="formtype" value="add"/>
   <label>Artwork Name:</label><br>
   <input type="text" name="artworkName" placeholder="Name of Artwork" value=""required><br>
   <label>Artist:</label><br>
   <?php 
      	$sql = "Select ArtistID,FirstName, LastName from Artist";
                      $result = mysqli_query($conn, $sql);
                      echo "<select name='artist'>";
                      echo "<option value='' disabled selected>Choose Artist</option>";
                       while ($row = mysqli_fetch_array($result)) {
                   echo "<option value='" .$row['ArtistID']."'> ".$row['FirstName'] . " ". $row['LastName']. "</option>"; 
                   }
                   echo "</select>";
      	?>
   <br><br>
   <label>Genre:</label><br>
   <?php 
      $sql = "Select GenreID,Name from Genre";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='genre'>";
                     echo "<option value='' disabled selected>Choose Genre</option>";
                      while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" .$row['GenreID']."'> ".$row['Name'] . "</option>"; 
                  }
                  echo "</select>";
      ?>
   <br><br>
   <label>Year Of Production:</label><br>
   <input type="text" name="dateOfProduction" placeholder="Year Of Production" value="" required><br>
   <label>Type Of Painting:</label><br>
   <input type="text" name="type" placeholder="Type Of Painting" value="" required><br>
   <label>Dimensions of Painting:</label><br>
   <input type="text" name="dimension" placeholder="Dimensions of Painting" value="" required><br>
   <label>Location:</label><br>
   <?php 
      $sql = "Select LocationID, Address1 from Location";
       $result = mysqli_query($conn, $sql);
       echo "<select name='location'>";
       echo "<option value='' disabled selected>Choose Location</option>";
        while ($row = mysqli_fetch_array($result)) {
      echo "<option value='" .$row['LocationID']."'>".$row['Address1'] . "</option>"; 
      }
      echo "</select>";
      ?>
   <br><br>
   <label>ImageID:</label><br>
   <?php 
      $sql = "Select ImageID from Image";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='image'>";
                     echo "<option value='' disabled selected>Choose Image</option>";
                      while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" .$row['ImageID']."'>".$row['ImageID'] . "</option>"; 
                  }
                  echo "</select>";
      ?>
   <br><br>
   <label>Price Of Painting:</label><br>
   <input type="text" name="price" placeholder="Price Of Painting" value="" required>
   <br><br>
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>