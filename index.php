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
    include_once './components/introComponent.php';
    include_once './components/sqlConnection.php';
   ?>
  <div class="row justify-content-center">
      <div class="d-flex flex-column">
         <div class="p-2">
             <h1 class="text-success">Showing how the various tables in a Database interact</h1>
         </div>
         <div class="p-2">
           <?php include_once './components/dropDownOptions.php'; ?>
         </div>
       </div>
  </div>
  <div id="data"></div>

  <script>
    function getData(str){
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        } else { 
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
           if (this.readyState==4 && this.status==200) {
               document.getElementById("data").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","model/artwork/fetchArtworkData.php?option="+str,true);
        xmlhttp.send();
    }
</script>
</div>
</body>
</html>
