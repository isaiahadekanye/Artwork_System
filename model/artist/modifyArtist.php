<form method="post" name="input1" onSubmit= "return modifyFormValidator()">
   <input type="hidden" name="formtype" value="modify"/>
   <p class="text-danger">Select Artist Name For the Data you want to Modify</p>
   <p class="text-danger">You cannot Modify the five main Artist Records</p>
   <label>Artist:</label><br>
   <?php
      $sql = "Select ArtistID,FirstName, LastName from Artist";
      $result = mysqli_query($conn, $sql);
      echo "<select name='artist'>";
      echo "<option value='' disabled selected>Choose Artist</option>";
      while ($row = mysqli_fetch_array($result)) {
          if ($row['ArtistID'] > 5) {
              echo "<option value='" . $row['ArtistID'] . "'> " . $row['FirstName'] . " " . $row['LastName'] . "</option>";
          }
      }
      echo "</select>";
      ?>
   <br><br>
   <label>First Name:</label><br>
   <input type="text" name="FirstName1" placeholder="First Name of Artist" value=""><br>
   <label>Last Name:</label><br>
   <input type="text" name="LastName1" placeholder="Last Name of Artist" value=""><br>
   <label>Date Of Birth:</label><br>
   <input type="date" name="DOB1" placeholder="yyyy-mm-dd" value=""><br>
   <label>Date Of Death [If Applicable]:</label><br>
   <input type="date" name="DOD1" placeholder="yyyy-mm-dd" value=""><br>
   <label>Residence:</label><br>
   <input type="text" name="Residence1" placeholder="Artist's Residence" value=""><br>
   <label>Genre:</label><br>
   <?php
      $sql = "Select GenreID,Name from Genre";
      $result = mysqli_query($conn, $sql);
      echo "<select name='genre1'>";
      echo "<option value='' disabled selected>Choose Genre</option>";
      while ($row = mysqli_fetch_array($result)) {
          echo "<option value='" . $row['GenreID'] . "'> " . $row['Name'] . "</option>";
      }
      echo "</select>";
      ?>
   <br><br>
   <label>FamousWorks:</label><br>
   <input type="text" name="FamousWorks1" placeholder="Artist's Famous Works" value=""><br>
   <label>ImageID:</label><br>
   <?php
      $sql = "Select ImageID from Image";
      $result = mysqli_query($conn, $sql);
      echo "<select name='image1'>";
      echo "<option value='' disabled selected>Choose ImageID</option>";
      while ($row = mysqli_fetch_array($result)) {
          echo "<option value='" . $row['ImageID'] . "'>" . $row['ImageID'] . "</option>";
      }
      echo "</select>";
      ?>
   <br><br>
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>