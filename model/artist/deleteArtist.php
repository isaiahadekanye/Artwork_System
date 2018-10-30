<form method="post" name="input2" onSubmit= "return deleteFormValidator()">
   <input type="hidden" name="formtype" value="delete"/>
   <p class="text-danger">You cannot Delete the five main Artist Records</p>
   <?php
      $sql = "Select ArtistID,FirstName, LastName from Artist";
      $result = mysqli_query($conn, $sql);
      echo "<select name='artist'>";
      echo "<option value='' disabled selected>Choose Artist</option>";
      while ($row = mysqli_fetch_array($result)) {
          if ($row['ArtistID'] > 5) {
              echo "<option value='" . $row['ArtistID'] . "'> " . $row['FirstName'] . $row['LastName'] . "</option>";
          }
      }
      echo "</select>";
      ?>
   <br><br>
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>