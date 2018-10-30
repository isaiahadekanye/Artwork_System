<form method="post" name="input" onSubmit= "return addFormValidator()">
   <input type="hidden" name="formtype" value="add"/>
   <label>First Name:</label><br>
   <input type="text" name="FirstName" placeholder="First Name of Artist" value="" required><br>
   <label>Last Name:</label><br>
   <input type="text" name="LastName" placeholder="Last Name of Artist" value="" required><br>
   <label>Date Of Birth:</label><br>
   <input type="date" name="DOB" placeholder="yyyy-mm-dd" value="" required><br>
   <label>Date Of Death [If Applicable]:</label><br>
   <input type="date" name="DOD" placeholder="yyyy-mm-dd" value=""><br>
   <label>Residence:</label><br>
   <input type="text" name="Residence" placeholder="Artist's Residence" value="" required><br>
   <label>Genre:</label><br>
   <?php
      $sql = "Select GenreID,Name from Genre";
      $result = mysqli_query($conn, $sql);
      echo "<select name='genre'>";
      echo "<option value='' disabled selected>Choose Genre</option>";
      while ($row = mysqli_fetch_array($result)) {
          echo "<option value='" . $row['GenreID'] . "'> " . $row['Name'] . "</option>";
      }
      echo "</select>";
      ?>
   <br><br>
   <label>FamousWorks:</label><br>
   <input type="text" name="FamousWorks" placeholder="Artist's Famous Works" value="" required><br>
   <label>ImageID:</label><br>
   <?php
      $sql = "Select ImageID from Image";
      $result = mysqli_query($conn, $sql);
      echo "<select name='image'>";
      echo "<option value='' disabled selected>Choose Image</option>";
      while ($row = mysqli_fetch_array($result)) {
          echo "<option value='" . $row['ImageID'] . "'>" . $row['ImageID'] . "</option>";
      }
      echo "</select>";
      ?>
   <br><br>
   <input type="submit" value="Submit">
   <input type="reset" value="Reset">
</form>