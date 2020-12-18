<?php require_once __DIR__ . '/../templates/_head.php'; ?>
<?php require_once __DIR__ . '/../templates/_nav.php'; ?>
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="index.php"><img class="d-block w-100" src="images/homeslide.png" alt="Home slide"></a>
        </div>
        <div class="carousel-item">
            <a href="index.php?action=song"><img class="d-block w-100" src="images/storeslide.png" alt="Store slide"></a>
        </div>
        <div class="carousel-item">
            <a href="index.php?action=albums"><img class="d-block w-100" src="images/albumslide.png" alt="Album slide"></a>
        </div>
        <div class="carousel-item">
            <a href="index.php?action=chart"><img class="d-block w-100" src="images/chartslide.png" alt="Chart slide"></a>
        </div>
        <div class="carousel-item">
            <a href="index.php?action=contact"><img class="d-block w-100" src="images/contactslide.png" alt="Contact slide"></a>
        </div>
        <div class="carousel-item">
            <a href="index.php"><img class="d-block w-100" src="images/signupslide.png" alt="Sign up slide"></a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<br>
<!-- Page Content -->
<div class="container">
    <h2>Featured Artist</h2>
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid rounded mb-4" src="/images/artists/fozzyhomepage.png" alt="">
        </div>
        <div class="col-lg-6">
            <h2><a href="index.php?action=show&artistName=Fozzy">Fozzy</a></h2>
            <p>FOZZY has always been about a heavy groove and a good time. And when you have two high-energy performers like Rich Ward and Chris Jericho (it’s debatable on who jumps higher onstage) in the band, grooves and good times come easy; but these guys aren’t just entertainers. Ward is one of the most versatile and underrated riffers in rock and metal today, who has created his own style of heavy riffs, melodic choruses and the Duke groove...oh that crushing groove! And Jericho's singing ability and overall passion for music makes one wonder just how he is able to find the time to excel in pretty much everything he does. It was these qualities that pushed the band to become one of the hottest up and coming rock acts of the past five years.</p>
        </div>
    </div>

    <h2>Featured Albums</h2>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="/images/albums/fozzyjudas.png" alt="">
                <div class="card-body">
                    <h4 class="card-title"><a href="index.php?action=showAlbum&albumName=Judas">JUDAS</a></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><a href="index.php?action=show&artistName=Fozzy">Fozzy</a></h6>
                    <p class="card-text">Judas is the seventh studio album by the American heavy metal band Fozzy. It was released on October 13, 2017 through Century Media Records.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="/images/albums/ballad.png" alt="">
                <div class="card-body">
                    <h4 class="card-title"><a href="index.php?action=showAlbum&albumName=The Ballad of Tom and Cindy">THE BALLAD OF TOM AND CINDY</a></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><a href="index.php?action=show&artistName=Drake Bell">Drake Bell</a></h6>
                    <p class="card-text">The Ballad of Tom and Cindy is the third studio album by Drake Bell. It was released on July 27, 2012 through Universal Motown.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="/images/albums/momentum.png" alt="">
                <div class="card-body">
                    <h4 class="card-title"><a href="index.php?action=showAlbum&albumName=Momentum">MOMENTUM</a></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><a href="index.php?action=show&artistName=Jamie Cullum">Jamie Cullum</a></h6>
                    <p class="card-text">Momentum is the sixth studio album by Jamie Cullum. It was released on 20 May 2013 by Island Records and is produced by Dan the Automator and Jim Abbiss.</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Featured Singles</h2>
    <div class="row">
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=1"> <img class="img-fluid" src="/images/singles/JudasSingle.jpg" alt=""></a>
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=90"><img class="img-fluid" src="/images/singles/EdgeOfSomething.jpg" alt=""></a>
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=212"><img class="img-fluid" src="/images/singles/Iron_Maiden_Empire_of_the_Clouds.jpg" alt=""></a>
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=158"><img class="img-fluid" src="/images/singles/Bitchcraft.jpg" alt=""></a>
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=332"><img class="img-fluid" src="/images/singles/Notb.jpg" alt=""></a>
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <a href="index.php?action=showSong&songID=25"> <img class="img-fluid" src="/images/singles/Sandpaper.jpg" alt=""></a>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="/vendor/bootstrap/jquery.min.js"></script>
<script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>



<?php require_once __DIR__ . '/../templates/_footer.php'; ?>
