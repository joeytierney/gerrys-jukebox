<?PHP
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/../templates/_nav.php';

$album = \Itb\Album::getOneByAlbum($albumName);
$artist = \Itb\Artist::getArtistById($album->getArtistID());
$songs = \Itb\Single::getSinglesByAlbum($album->getAlbumID());
;?>
    <br>
    <div class="container">
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href='index.php'>Home</a>
            <a class="breadcrumb-item" href='index.php?action=albums'>Albums</a>
            <a class="breadcrumb-item" href="index.php?action=show&artistName=<?= $artist->getArtistName() ?>"><?= $artist->getArtistName() ?></a>
            <span class="breadcrumb-item active"><?= $album->getAlbumName() ?></span>
        </nav>
        <div id="spaceOf10">
        <h4>RELEASE DETAILS</h4>
        <div class="row">
            <div class="col-sm-4">
                 <img src="<?= $album->getAlbumImage() ?>" width="240" height="240">
                    <p class="lead"><b>Artist: </b><a href="index.php?action=show&artistName=<?= $artist->getArtistName() ?>"><?= $artist->getArtistName() ?></a>
                    <br>
                    <b>Album: </b><?= $album->getAlbumName() ?>
                    <br>
                    <b>Released: </b><?= $album->getAlbumRelease() ?>
                    <br>
                        <?php if ($isLoggedIn) {?>
                    <b>Price: €</b><?= $album->getAlbumPrice() ?> <a href="index.php?action=addToCart&id=<?= $album->getAlbumID() ?>&type=Album" data-toggle="tooltip" title="Add to Cart" data-placement="right"><i class="fas fa-cart-plus"></i></a></p>
                        <?php } else {?>
                <p>Price: €<?= $album->getAlbumPrice() ?> <a href="#" data-toggle="modal" data-target="#id01"><span data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus"></i></span></a></p>

                <?php } ?></p>
            </div>
            <div class="col-sm-8">
                <div align="left" class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" align="right" src="<?= $album->getAlbumVideo()?>" frameborder="2" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
<br>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Writer(s)</th>
        <th scope="col">Length</th>
        <th scope="col">Price</th>
        <th scope="col">Purchase</th>
    </tr>
    </thead>
    <tbody>
<?php if($songs != null) {
    foreach ($songs as $song) { ?>
        <tr>
            <th scope="row"><?= $song->getSongTrackNo() ?></th>
            <td><a href="index.php?action=showSong&songID=<?= $song->getSongID() ?>"><?= $song->getSongName() ?></a>
            </td>
            <td><?= $song->getSongWriter() ?></td>
            <td><?= $song->getSongLength() ?></td>
            <td>€ <?= $song->getSongPrice() ?></td>
            <td><?php if ($isLoggedIn) {
                    ?>
                    <a href="index.php?action=addAlbumSongToCart&id=<?= $song->getSongID() ?>&type=Single&albumName=<?= $album->getAlbumName() ?>"
                       data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus fa-1x"></i></a>
                    <?php
                } else { ?>
                    <a href="#" data-toggle="modal" data-target="#id01"><span data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus fa-1x"></i></span></a>
                    <?php
                }
                ?></td>
        </tr>
    <?php }
    }?>
    </tbody>
</table>
<div class="modal fade" id="id01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Not Logged In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>You need to be logged in in order to purchase music.</h2>
                <br>
                <small><b>Not A Member</b></small>
                <small>You can simply sign up for free account by clicking on the sign-up button in the top right corner of the page.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
    </div>
</div>
<br><br>
<?php require_once __DIR__ . '/_footer.php'; ?>
