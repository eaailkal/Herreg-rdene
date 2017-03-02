<?php

require_once( "common.inc.php" );
require_once( "../config.php" );
require_once( "classes/Manor.class.php" );

$start = isset( $_GET["start"] ) ? (int)$_GET["start"] : 0;
$order = isset( $_GET["order"] ) ? preg_replace( "/[^ a-zA-Z]/", "", $_GET["order"] ) : "title";
list( $manors, $totalRows ) = Manor::getManors( $start, PAGE_SIZE, $order );

displayPageHeader( "Herregårdene" );

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
            <li><a href="#tf-home" class="page-scroll">Hjem</a></li>
            <li><a href="#tf-about" class="page-scroll">Om</a></li>
            <li><a href="#tf-services" class="page-scroll">Events</a></li>
            <li><a href="#tf-manors" class="page-scroll">Herregårde</a></li>
            <li><a href="#tf-reviews" class="page-scroll">Anmeldelser</a></li>
            <li><a href="#tf-newsletter" class="page-scroll">Nyhedsbrev</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1>Velkommen til <strong><span class="color">HERREGÅRDENE</span></strong></h1>
                <p class="lead">Tidsrejser <strong>for </strong>hele <strong>familien!</strong></p>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

    <!-- About Us Page
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02.png" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h4>Besøg de danske herregåde og slotte.</h4>
                            <h2>Tag på besøg på danske slotte og herregårde og få tidsrejser for  <strong>hele familien.</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">De danske slotte og herregårde er en vigtig del af vores historie, og har gennem de sidste mange hundrede år spillet en stor rolle i historiens gang.
I forbindelse med Aarhus kulturhovedstad 2017 har en lang række af slotte og herregårde i Midtjylland åbnet deres døre for spændende arrangementer, som løbende vil komme af stablen. Med denne hjemmeside vil det være muligt at finde arrangementerne, deres placering og hvornår de finder sted.
Så velkommen til Aarhus Kulturhovedstad 2017, vi håber det bliver et spændende år i tidsrejserne og den danske histories ånd.
</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Services Section
    ==========================================-->
    <div id="tf-services" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Aktiviteter og <strong>Events</strong> på herregårdene</h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>I løbet af året vil der være mange forskellige aktiviteter, der vil løbende ske opdateringer, så hold øje med hjemmesiden. Du kan blandt andet opleve:</em></small>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-music"></i>
                    <h4><strong>Koncerter</strong></h4>
                    <p>En lang række forskellige kunstnere vil komme og give koncerter på slotte og herregårde i området. Se mere.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-camera"></i>
                    <h4><strong>Udstillinger</strong></h4>
                    <p>I løbet af året vil der løbende være udstillinger af meget forskellige karakter. I kortere og længere tid. Se mere.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-flag"></i>
                    <h4><strong>Markeder</strong></h4>
                    <p>Mange kender de klassiske julemarkeder vi alle elsker, men i løbet af året kommer en række af herregårdene til at åbne deres døre for offentligheden, også på andre tidspunkt end bare til jul. Se mere.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-futbol-o"></i>
                    <h4><strong>Sportsbegivenheder</strong></h4>
                    <p>På flere og flere herregårde begynder man at se sports stævner og andre begivenheder i forbindelse med sport. Se mere.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Section
    ==========================================-->
    <div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2>En del af</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                
                    <div class="item largeecc">
                        <a href="http://www.aarhus2017.dk/da/" class="eccimg">
                        <img src="img/ecc.jpg" alt="Aarhus 2017 - European Capital Culture">
						</a>
                    </div>
                    
                

            </div>
        </div>
    </div>

    <!-- Manors Section
    ==========================================-->
    <div id="tf-manors">
        <div class="container"> <!-- Container -->
            <div class="section-title text-center center">
                <h2>Besøg <strong>herregårdene</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>Her er en liste over nogen af spændende slotte og herregårde der holder åben for offentligheden i løbet af Aarhus Kulturhovedstad 2017.</em></small>
            </div>
            <div class="space"></div>

            <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filtrér efter type</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">Alle</a></li>
                            <li><a href="#" data-filter=".giftshop">Shop</a></li>
                            <li><a href="#" data-filter=".exhibitions">Udstillinger</a></li>
                            <li><a href="#" data-filter=".events">Events</a></li>
                            <li><a href="#" data-filter=".manor">Herregårde</a></li>
                            <li><a href="#" data-filter=".castle">Slotte</a></li>
                            <li><a href="#" data-filter=".view" >Natur</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div id="lightbox" class="row">

                <!-- Request from database -->

                <?php

$rowCount = 0;
foreach ( $manors as $manor ) {
  $rowCount++;
?>
<!--                <div class="col-sm-6 col-md-3 col-lg-3 branding"> -->
                <div class="col-sm-6 col-md-3 col-lg-3 <?php echo $manor->getValueEncoded( "keywords" ) ?>">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="view_manor.php?manor_id=<?php echo $manor->getValueEncoded( "manor_id" ) ?>">
                                <div class="hover-text">
                                    <h4><?php echo $manor->getValueEncoded( "title" ) ?></h4>
                                    <small><?php echo $manor->getValueEncoded( "address" ) ?></small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?php echo $manor->getValueEncoded( "thumbnail" ) ?>" class="img-responsive" alt="<?php echo $manor->getValueEncoded( "description_short" ) ?>.">
                            </a>
                        </div>
                    </div>
                </div>

<?php
}
?>

            </div>
        </div>
    </div>

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

    <!-- Newsletter Section
    ==========================================-->
    <div id="tf-newsletter" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Meld dig til vores <strong>nyhedsbrev</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Meld dig til vores nyhedsbrev og få de opdateringer om alle de spændende begivenheder der kommer til at foregå i løbet af året. .</em></small>            
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Navn</label>
                                    <input type="input" class="form-control" id="exampleInputEmail1" placeholder="Navn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div> -->
                        
                        <button type="submit" class="btn tf-btn btn-default">Tilmeld</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    
<?php
displayPageFooter();
?>