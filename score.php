<?php
session_start();
?>

<?php include('note.php');
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
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Column heading
                            </th>
                            <th>
                                Column heading
                            </th>
                            <th>
                                Column heading
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    gl();
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Column heading
                                    </th>
                                    <th>
                                        Column heading
                                    </th>
                                    <th>
                                        Column heading
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            solo();
                                ?>
                            </tbody>
                        </table>
                    </div>

    </body>
<footer></footer>
</html>
