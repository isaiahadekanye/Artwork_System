<form>
<?php
$sql = "Select ArtworkID, Artwork_Name from Artwork";
$result = mysqli_query($conn, $sql);
echo "<select class = 'form-control form-control-lg' onchange= 'getData(this.value)' name= 'Artworks'>";
echo "<option value='' disabled selected>Choose Artworks</option>";
while ($row = mysqli_fetch_array($result)) {

    echo "<option value='" . $row['ArtworkID'] . "'> " . $row['Artwork_Name'] . "</option>";

}
echo "</select>";
?>
</form>