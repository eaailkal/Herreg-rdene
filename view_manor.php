<?php

require_once( "common.inc.php" );
require_once( "../config.php" );
require_once( "classes/Manor.class.php" );

$manor_id = isset( $_GET["manor_id"] ) ? (int)$_GET["manor_id"] : 0;

if ( !$manor = Manor::getManor( $manor_id ) ) {
  displayPageHeader( "Error" );
  echo "<div>Manor not found.</div>";
  displayPageFooter();
  exit;
}

displayPageHeader( $manor->getValueEncoded( "title" ) . ": " . $manor->getValueEncoded( "description_short" ) );

$desc_seo = $manor->getValueEncoded( "description_short" );
// $kw_seo = $manor->getValueEncoded( "keywords_seo" );

?>

    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="index.php"><img src="img/herregaardene.png" alt="Herregårdene - Tidsrejser for hele familien" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:history.go(-1)" class="page-scroll">Back</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1>Welcome to <strong><span class="color"><?php echo $manor->getValueEncoded( "title" ) ?></span></strong></h1>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

<!-- View manor
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $manor->getValueEncoded( "thumbnail" ) ?>" alt="<?php echo $manor->getValueEncoded( "description_short" ) ?>" class="img-responsive">
                </div>
                <div class="col-md-6">
<div class="about-text">
                        <div class="section-title">
                            <h4><?php echo $manor->getValueEncoded( "title" ) ?></h4>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro"><?php echo $manor->getValueEncoded( "description" ) ?></p>

<dl style="width: 30em;">
      <dt>Address</dt>
      <dd><?php echo $manor->getValueEncoded( "address" ) ?></dd>
      <dt>Phone</dt>
      <dd><?php echo $manor->getValueEncoded( "phone" ) ?></dd>
      <dt>Email</dt>
      <dd><?php echo $manor->getValueEncoded( "email" ) ?></dd>
      <dt>Admission</dt>
      <dd><?php echo $manor->getValueEncoded( "admission" ) ?></dd>
      <dt>Parking</dt>
      <dd><?php echo $manor->getValueEncoded( "parking" ) ?></dd>
      
</dl>

<form>
    <button type="submit" class="btn tf-btn btn-default">Do the tour</button>
</form>

                    
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Services Section
    ==========================================-->
    

    <!-- Clients Section
    ==========================================-->
    

    <!-- Reviews Section
    ==========================================-->
    <div id="tf-reviews" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Hvad <strong>siger</strong> vores gæster?</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>"Det var meget et meget informativt besøg på Ny Kobbervang. Appen gjorde det let at finde rundt, og var utrolig informativ, selv for os det kender til tingene på forhånd var det muligt at lære noget nyt. Kan varmt anbefales hvis man ønsker at vidde mere om den anden Karl Gustav krig."</h5>
                                <p><strong>Henrik, 40, Harlev </strong>besøgte: Ny Kobbervang, 01/04/2017</p>
                            </div>

                            <div class="item">
                                <h5>"Havde en super tur til Gammel Estrup med alle mine drenge. Selvom det var svært at trække ungerne væk fra playstationen var de rigtigt imponerede når det kom til stykket. Hjemmesiden ghorde det super let at finde vej og hvornår der var åbent. Vi fandt også det hemmelige sted og krydser fingre for at vinde den syv retters menu"</h5>
                                <p><strong>Carina, ingen alder valgt, Trøjborg</strong>besøgte: Gammel Estrup, 22/05/2017</p>
                            </div>

                            <div class="item">
                                <h5>"Had a great time at Kalø. Eventhough it was cold, it was great! Can recommend it if your interesret in old buildings, or like me taking pictures. Got some great photos of the place. Pretty sure I saw a puf of smoke from the dragon, or could just have been a hippie."</h5>
                                <p><strong>Veronica, 26, Brabrand</strong>besøgte: Kalø slotsruin, 05/03/2017</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section
    ==========================================-->
    <div id="map"></div>
    <script>

function initMap() {
  var chicago = new google.maps.LatLng(<?php echo $manor->getValueEncoded( "latitude" ) ?>, <?php echo $manor->getValueEncoded( "longitude" ) ?>);

  var map = new google.maps.Map(document.getElementById('map'), {
    center: chicago,
    zoom: 17
  });

  var coordInfoWindow = new google.maps.InfoWindow();
  coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
  coordInfoWindow.setPosition(chicago);
  coordInfoWindow.open(map);

  map.addListener('zoom_changed', function() {
    coordInfoWindow.setContent(createInfoWindowContent(chicago, map.getZoom()));
    coordInfoWindow.open(map);
  });
}

var TILE_SIZE = 256;

function createInfoWindowContent(latLng, zoom) {
  var scale = 1 << zoom;

  var worldCoordinate = project(latLng);

  var pixelCoordinate = new google.maps.Point(
      Math.floor(worldCoordinate.x * scale),
      Math.floor(worldCoordinate.y * scale));

  var tileCoordinate = new google.maps.Point(
      Math.floor(worldCoordinate.x * scale / TILE_SIZE),
      Math.floor(worldCoordinate.y * scale / TILE_SIZE));

  return [
    'Chicago, IL',
    'LatLng: ' + latLng,
    'Zoom level: ' + zoom,
    'World Coordinate: ' + worldCoordinate,
    'Pixel Coordinate: ' + pixelCoordinate,
    'Tile Coordinate: ' + tileCoordinate
  ].join('<br>');
}

// The mapping between latitude, longitude and pixels is defined by the web
// mercator projection.
function project(latLng) {
  var siny = Math.sin(latLng.lat() * Math.PI / 180);

  // Truncating to 0.9999 effectively limits latitude to 89.189. This is
  // about a third of a tile past the edge of the world tile.
  siny = Math.min(Math.max(siny, -0.9999), 0.9999);

  return new google.maps.Point(
      TILE_SIZE * (0.5 + latLng.lng() / 360),
      TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI)));
}

    </script>

<?php
displayPageFooter();
?>