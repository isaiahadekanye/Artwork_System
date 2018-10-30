<html>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://artwork-system.000webhostapp.com/index.php">Art Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="https://artwork-system.000webhostapp.com/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://artwork-system.000webhostapp.com/components/cart.php">Cart</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SQL Tables
        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/artist.php">Artists</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/artwork.php">Artworks</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/museum.php">Museum</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/location.php">Location</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/genre.php">Genre</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/review.php">Review</a>
                    <a class="dropdown-item" href="https://artwork-system.000webhostapp.com/view/image.php">Image</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search for Artwork" aria-label="Search" onkeyup="showResult(this.value)" onBlur= "showResult(this.value)" onChange= "showResult(this.value)">
        </form>
    </div>
</nav>
<script>
    function showResult(str){
        if (str.trim().length==0) { 
            document.getElementById("livesearch").innerHTML="";
            return;
        }
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
        xmlhttp.open("GET","https://artwork-system.000webhostapp.com/components/search.php?keyword="+str,true);
        xmlhttp.send();
    }
</script>
</html>