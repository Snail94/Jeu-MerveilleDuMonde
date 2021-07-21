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
    <link rel="stylesheet" href="style.css" />
    <!-- affichage de menu -->
    <script>
        $(function() {
            $("#header").load("header.php");
        });
    </script>
</head>

<body style="overflow: hidden;">
    <div id="header" style="z-index:+11;position:relative;"></div>
    </div>
    <div id="mapid"></div>
    <div id="pane1" style="position: absolute;margin-left: 22%;top:10%;">
        <h1 style="font-weight: 800; color: transparent; font-size: 84px; background: url('https://phandroid.s3.amazonaws.com/wp-content/uploads/2014/05/rainbow-nebula.jpg') repeat; background-position: 40% 50%; -webkit-background-clip: text; position: relative; text-align: center; line-height: 90px; letter-spacing: -8px;">les septs merveilles du monde</h1>
    </div>
    <div id="pane6" hidden></div>
    </div>
    <div class="row">
        <div id="pane2" class="col-sm-8 col-sm-offset-2" hidden></div>
    </div>
    <div class="bs" style="position: absolute;margin-left: 70%;bottom:10%;">
        <button id="pane3" class="btnplay">
  <span class="text">Jouer</span>
</button>
    </div>
    <button class="btnplay2" id="pane5" style="position: absolute;margin-left: 70%;bottom:10%;" hidden>
  <span class="glyphicon glyphicon-repeat"></span>
</button>
    <div id="pane4" hidden>
        <h1></h1>
        <center><img src="" style="width:auto;"></center>
        <p></p>
    </div>
    <audio id="audio" src="https://www.soundjay.com/button/sounds/button-3.mp3" autostart="false" hidden></audio>

    <div id="idpoints" hidden></div>
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <script>
        //Appel aJAx du fichier GEOJSON contenant les points
        var countries = $.ajax({
            url: "file.geojson",
            dataType: "json",
            success: function(data) {
                var String;
                for (x in data) {
                    for (i = 0; i < 6; i++) String += " " + data[x].features[i].properties.name + "/.../" + data[x].features[i].geometry.coordinates.toString() + "/.../" + data[x].features[i].properties.description + "/.../" + data[x].features[i].properties.image + "/./";

                    //console.log(data[x].features[0].properties.name);	  //pour avoir le nom
                    console.log(data[x].features[0].geometry.coordinates.toString()); //afin d'avoir les coordonées
                };
                $("#idpoints").html(String);
                return data;
            },
            error: function(xhr) {
                alert(xhr.statusText)
            }
        })

        //event d'un button clickvar animateButton = function(e) {
        var $btn = document.querySelector('.btnplay');

        $btn.addEventListener('click', e => {
            window.requestAnimationFrame(() => {
                $btn.classList.remove('is-animating');

                window.requestAnimationFrame(() => {
                    $btn.classList.add('is-animating');
                });
            });
        });
        //Attente du chargement complet du fichier Json afin de continuer aux autres fonctions
        $.when(countries).done(function() {
            var Answer = new Array(4);

            // fonction aleatoire qui retourne les points inclues dans le fichier Json
            function chosetarget(min, max) {
                return Math.random() * (max - min) + min;
            }
            // Fonction initialisant le point
            function initpoint() {
                var id = parseInt(chosetarget(0, 6));
                Answer = ArrayPoints[id].toString().split("/.../");
                $("#pane2").html(Answer[0]);

            }

            function scorecalculate(lat1, lat2, long1, long2) {
                var diff;
                diff = Math.abs(lat1 - lat2) + Math.abs(long1 - long2);
                if (diff < 20) return 100;
                else if (90 > diff > 20) return 10;
                else return 0;
            }
            var score = 0;
            //initalise markers
            var ArrayPoints = $("#idpoints").html().split("/./");
            var markeruser;
            var markerplace;
            var mymap = L.map('mapid', {
                    zoom: 5,
                    zoomControl: false
                })
                .setView([30, 0], 3);

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            mymap.scrollWheelZoom.disable();
            mymap.doubleClickZoom.disable();
            //icon for user marker
            var myIcon = L.icon({
                iconUrl: 'http://www.clker.com/cliparts/R/K/r/C/f/o/red-marker-black-border-md.png',
                iconSize: [20, 30],
            });
            var PointIcon = L.icon({
                iconUrl: 'https://cdn1.iconfinder.com/data/icons/social-messaging-ui-color/254000/66-512.png',
                iconSize: [40, 40],
            });
            //when user clicks create marker and deletes the one before
            mymap.on('click', function(ev) {
                //deletes user marker when clicks
                if (typeof markeruser !== 'undefined') {
                    mymap.removeLayer(markeruser);
                    mymap.removeLayer(markerplaces);
                }
                var reponse = ev.latlng + '';
                var sliced = reponse.slice(7, reponse.length - 1);
                var coordinates = sliced.split(", "); //create an array containing lat and lng as strings
                var Cord = Answer[1].split(",");
                coordinates[0] = parseFloat(coordinates[0]); //convert lat string to number
                coordinates[1] = parseFloat(coordinates[1]);
                var scores = scorecalculate(coordinates[0], Cord[0], coordinates[1], Cord[1]);
                markeruser = L.marker(coordinates, {
                    icon: myIcon
                }).addTo(mymap);
                markerplaces = L.marker(Cord, {
                    icon: PointIcon
                }).addTo(mymap);
                // add a marker in the position choosed by the user
                console.log(Answer[3] + "" + Answer[2]);

                $("#pane4 h1").html(Answer[0]);
                $("#pane4 > p").html(Answer[2]);
                $("#pane4 img").attr("src", Answer[3]);
                $("#pane6").html("Votre score est " + scores + " points");
                $("#pane4").fadeIn();
                $("#pane5").fadeIn();
                $("#pane6").fadeIn();

            });

            //events
            $("#pane5").on("click", function() {
                $("#pane5").fadeOut();
                $("#pane4").fadeOut();
                $("#pane5").fadeOut();
                $("#pane6").fadeOut();
                mymap.removeLayer(markeruser);
                mymap.removeLayer(markerplaces);
                initpoint();
            });
            $("#pane3").on("click", function() {
                initpoint();
                var sound = document.getElementById("audio");
                sound.play();
                $("#pane3").fadeOut();
                $("#pane1").fadeOut();
                $("#pane2").html(Answer[0]);
                $("#pane2").fadeIn();
                $("#pane6").fadeIn();
            });

        });
    </script>
</body>

</html>
