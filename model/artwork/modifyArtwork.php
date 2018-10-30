<form method="post" name="input1" onSubmit= "return modifyFormValidator()">
   <input type="hidden" name="formtype" value="modify"/>
   <p class="text-danger">Select Artwork Name For the Data you want to Modify</p>
   <p class="text-danger">You cannot Modify the five main Artwork Records</p>
   <label>Artwork:</label><br>
   <?php 
      $sql = "Select ArtworkID,Artwork_Name from Artwork";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='artwork'>";
                     echo "<option value='' disabled selected>Choose Artwork</option>";
                      while ($row = mysqli_fetch_array($result)) {
                          if($row['ArtworkID'] > 5) {
                  echo "<option value='" .$row['ArtworkID']."'> ".$row['Artwork_Name'] ."</option>"; 
                  }
                      }
                  echo "</select>";
      ?>
   <br><br>
   <label>Artwork Name:</label><br>
   <input type="text" name="artworkName1" placeholder="Name of Artwork" value=""><br>
   <label>Artist:</label><br>
   <?php 
      $sql = "Select ArtistID,FirstName, LastName from Artist";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='artist1'>";
                     echo "<option value='' disabled selected>Choose Artist</option>";
                      while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" .$row['ArtistID']."'> ".$row['FirstName'] ." ".$row['LastName']. "</option>"; 
                  }
                  echo "</select>";
      ?>
   <br><br>
   <label>Genre:</label><br>
   <?php 
      $sql = "Select GenreID,Name from Genre";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='genre1'>";
                     echo "<option value='' disabled selected>Choose Genre</option>";
                      while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" .$row['GenreID']."'> ".$row['Name'] . "</option>"; 
                  }
                  echo "</select>";
      ?>
   <br><br>
   <label>Year Of Production:</label><br>
   <input type="text" name="dateOfProduction1" placeholder="Year Of Production" value=""><br>
   <label>Type Of Painting:</label><br>
   <input type="text" name="type1" placeholder="Type Of Painting" value=""><br>
   <label>Dimensions of Painting:</label><br>
   <input type="text" name="dimension1" placeholder="Dimensions of Painting" value=""><br>
   <label>Location:</label><br>
   <?php 
      $sql = "Select LocationID, Address1 from Location";
                     $result = mysqli_query($conn, $sql);
                     echo "<select name='location1'>";
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
                     echo "<select name='image1'>";
                     echo "<option value='' disabled selected>Choose Image</option>";
                      while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" .$row['ImageID']."'>".$row['ImageID'] . "</option>"; 
                  }
                  echo "</select>";
      ?>
   <br><br>
   <label>Price Of Painting:</label><br>
   <input type="text" name="price1" placeholder="Price Of Painting" value="">
   <br><br>
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>