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
   <h1 class="display-4">Museum Table</h1>
</div>
<div id="data"></div>
<?php 
include '../model/museum/museumModel.php';
?>
</body>
</html>