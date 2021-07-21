<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Game Of Geo </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- compiled Leaflet -->
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />



<!-- affichage du navbar -->
<script>     $(function(){    $("#header").load("header.php");});

</script>

<!--Balise contenant le navbar -->
<div id="header"></div>
</head>

<!--Balise contenant le body -->
    <body>
      <div class="row">
      <form class="col-md-6 col-md-offset-3" method="POST" >
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Text</label>
        <div class="col-10">
          <input class="form-control" type="text" value="Artisanal kale" id="text">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Cordonnées</label>
        <div class="col-10">
          <input class="form-control" type="text" value="****.*****" id="val">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Description</label>
        <div class="col-10">
          <input class="form-control" type="text" value="" id="descr">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">URL image</label>
        <div class="col-10">
          <input class="form-control" type="text" id="img">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-10">
          <!--Appel a la fonction d'insertion dans la base de données -->
          <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
      </div>
</form>
</div>



    </body>
  <script>
  $(document).ready(function() {

      // process the form
      $('form').submit(function(event) {

        event.preventDefault();
            var  text=              $('#text').val();
            var  point=             $('#val').val();
            var  descrip   =$('#descr').val();
            var  url   =$('#img').val();
            alert(descrip);

          // process the form
          $.post("process.php", //on envoie à process.php le resultat
            { // les informations à envoyer
                text:text,
                point:point,
                descrip:descrip,
                url:url
              },
              //Un test pour voir le resultat
              function(response){
  alert(" received "+response);//on renvoie ce qui se trouve à l'interrieur du données s

  });

  });
  });


          // stop the form from submitting the normal way and refreshing the page





  </script>
</html>
