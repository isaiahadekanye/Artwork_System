<form method="post" name="input2" onSubmit= "return deleteFormValidator()">
   <input type="hidden" name="formtype" value="delete"/>
   <p class="text-danger">You cannot Delete the five main Artwork Records</p>
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
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>