<html>
<head>
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
include_once '../components/introComponent.php';
include_once '../components/sqlConnection.php';
?>
<div class="row justify-content-center">
    <h1 class="display-4">Artist Table</h1>
    <div class="dropdown mt-3 ml-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Interact with Table
  </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="modal" data-target="#addModal">Add</a>
            <a class="dropdown-item pointer" data-toggle="modal" data-target="#deleteModal">Delete</a>
            <a class="dropdown-item pointer" data-toggle="modal" data-target="#modifyModal">Modify</a>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add An Artist To Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artist/addArtist.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete An Artist from Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artist/deleteArtist.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modify Modal -->
    <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify An Artist from Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artist/modifyArtist.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="data"></div>
<?php
include '../model/artist/artistModel.php';
?>
<script>
    function addFormValidator(){
        var firstName = document.forms["input"]["FirstName"].value;
        var lastName = document.forms["input"]["LastName"].value;
        var dateOfBirth = document.forms["input"]["DOB"].value; 
        var dateOfDeath = document.forms["input"]["DOD"].value; 
        var residence = document.forms["input"]["Residence"].value;
        var genre = document.forms["input"]["genre"].value;  
        var famousWorks = document.forms["input"]["FamousWorks"].value;   
        var image = document.forms["input"]["image"].value;   
        if(firstName == "" || lastName == "" || dateOfBirth == "" || residence == "" || genre == "" || famousWorks == "" || image == ""  ){
            alert("All Input fields must be filled out");
        } else {
            var dataString = 'firstName='+ firstName + 
                             '&lastName=' + lastName + 
                             '&dateOfBirth=' + dateOfBirth +
                             '&dateOfDeath=' + dateOfDeath +
                             '&residence=' + residence +
                             '&genre=' + genre +
                             '&famousWorks=' + famousWorks +
                             '&image=' + image;
            $.ajax({
                type: 'POST',
                url: '../model/artist/addArtistModel.php',
                data: dataString,
                success: function (data) {
                }
            });
                
        } 
    }

    function modifyFormValidator(){
        var artistid = document.forms["input1"]["artist"].value;
        var firstName = document.forms["input1"]["FirstName1"].value;
        var lastName = document.forms["input1"]["LastName1"].value;
        var dateOfBirth = document.forms["input1"]["DOB1"].value; 
        var dateOfDeath = document.forms["input1"]["DOD1"].value; 
        var residence = document.forms["input1"]["Residence1"].value;
        var genre = document.forms["input1"]["genre1"].value;  
        var famousWorks = document.forms["input1"]["FamousWorks1"].value;   
        var image = document.forms["input1"]["image1"].value;   
        
        var dataString = 'artistid=' + artistid +
                         '&firstName='+ firstName + 
                         '&lastName=' + lastName + 
                         '&dateOfBirth=' + dateOfBirth +
                         '&dateOfDeath=' + dateOfDeath +
                         '&residence=' + residence +
                         '&genre=' + genre +
                         '&famousWorks=' + famousWorks +
                         '&image=' + image;
        $.ajax({
            type: 'POST',
            url: '../model/artist/modifyArtistModel.php',
            data: dataString,
            success: function (data) {
            }
        });
                
    } 
    
    function deleteFormValidator(){
        var artistid = document.forms["input2"]["artist"].value;
        
        var dataString = 'artistid=' + artistid;
                         
        $.ajax({
            type: 'POST',
            url: '../model/artist/deleteArtistModel.php',
            data: dataString,
            success: function (data) {
            }
        });
    }
</script>
</body>
</html>
