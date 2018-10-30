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
   <h1 class="display-4">Artwork Table</h1>
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
</div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add An Artwork To Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artwork/addArtwork.php'; ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete An Artwork from Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artwork/deleteArtwork.php'; ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modify An Artwork from Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php include '../model/artwork/modifyArtwork.php'; ?>
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
include '../model/artwork/artworkModel.php';
?>
<script>
    function addFormValidator(){
        var artworkName = document.forms["input"]["artworkName"].value;
        var artist = document.forms["input"]["artist"].value;
        var genre = document.forms["input"]["genre"].value; 
        var dateOfProduction = document.forms["input"]["dateOfProduction"].value;
        var type = document.forms["input"]["type"].value;  
        var dimension = document.forms["input"]["dimension"].value;   
        var location = document.forms["input"]["location"].value;  
        var image = document.forms["input"]["image"].value;   
        var price = document.forms["input"]["price"].value;  
        
        if(artworkName == "" || artist == "" || genre == "" || dateOfProduction == "" || type == "" || dimension == "" || location == "" || image == "" || price == "" ){
            alert("All Input fields must be filled out");
        } else {
            var dataString = 'artworkName='+ artworkName + 
                             '&artist=' + artist + 
                             '&genre=' + genre +
                             '&dateOfProduction=' + dateOfProduction +
                             '&type=' + type +
                             '&dimension=' + dimension +
                             '&location=' + location +
                             '&image=' + image + 
                             '&price=' + price;
            $.ajax({
                type: 'POST',
                url: '../model/artwork/addArtworkModel.php',
                data: dataString,
                success: function (data) {
                }
            });
                
        } 
    }

    function modifyFormValidator(){
        var artworkid =  document.forms["input1"]["artwork"].value;
        var artworkName = document.forms["input1"]["artworkName1"].value;
        var artist = document.forms["input1"]["artist1"].value;
        var genre = document.forms["input1"]["genre1"].value; 
        var dateOfProduction = document.forms["input1"]["dateOfProduction1"].value;
        var type = document.forms["input1"]["type1"].value;  
        var dimension = document.forms["input1"]["dimension1"].value;   
        var location = document.forms["input1"]["location1"].value;  
        var image = document.forms["input1"]["image1"].value;   
        var price = document.forms["input1"]["price1"].value;  
        
        var dataString = 'artworkid=' + artworkid +
                         '&artworkName='+ artworkName + 
                         '&artist=' + artist + 
                         '&genre=' + genre +
                         '&dateOfProduction=' + dateOfProduction +
                         '&type=' + type +
                         '&dimension=' + dimension +
                         '&location=' + location +
                         '&image=' + image + 
                         '&price=' + price; 
        $.ajax({
            type: 'POST',
            url: '../model/artwork/modifyArtworkModel.php',
            data: dataString,
            success: function (data) {
            }
        });
                
    } 
    
    function deleteFormValidator(){
        var artworkid = document.forms["input2"]["artwork"].value;
        var dataString = 'artworkid=' + artworkid;
                         
        $.ajax({
            type: 'POST',
            url: '../model/artwork/deleteArtworkModel.php',
            data: dataString,
            success: function (data) {
            }
        });
    }
</script>
</body>
</html>