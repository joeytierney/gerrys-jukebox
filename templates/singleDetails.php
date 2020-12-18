<?PHP
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/../templates/_nav.php';
$song = \Itb\Single::getSingleById($songID);
$artist = \Itb\Artist::getArtistByArtistID($song->getArtistID());
$album = Itb\Album::getAlbumByAlbumID($song->getAlbumID());
$albums = \Itb\Album::getAlbumsByArtistID($artist->getArtistID());
?>

<br>
<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=song'>Singles</a>
        <span class="breadcrumb-item active"><?= $song->getSongName() ?></span>
    </nav>
    <div id="spaceOf10">
<h4>SONG DETAILS</h4>
    <div class="row">
        <div class="col-sm-6">
            <img src="<?= $song->getSongImage() ?>" width="240" height="240" class="img-responsive">
            <p class="lead">
            <br><b>Album: </b><a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>"><?= $album->getAlbumName() ?></a>
            <br><b>Track Length: </b><?= $song->getSongLength() ?>'s
            <br><b>Category: </b><?= $song->getSongCat() ?>
            <br><b>Writer(s): </b><?= $song->getSongWriter() ?></p>
            <?php if($isLoggedIn){
                ?>
                <p class="lead">Price: €<?= $song->getSongPrice() ?> <a href="index.php?action=addSongToCart&id=<?= $song->getSongID() ?>&type=Single" data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus"></i></a></p>
                <?php
            }else{?>
                <p class="lead">Price: €<?= $song->getSongPrice() ?> <a href="#" data-toggle="modal" data-target="#id01"><span data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus"></i></span></a></p>
                <?php
            }
            ?>
        </div>
        <div class="col-sm-6">
            <h4><?= $artist->getArtistName() ?>'s Details</h4>
            <img src="<?= $artist->getArtistImage() ?>" width="400" height="150" alt="$artistName"  class="img-responsive">
            <br><br>
            <p class="lead"><b>Artist: </b><a href="index.php?action=show&artistName=<?= $artist->getArtistName() ?>"><?= $artist->getArtistName() ?></a>
            <br><b>Label: <?= $artist->getArtistLabel() ?></b>
                <br><b>Genre: <?= $artist->getArtistCat() ?></b></p>
            <h5>Other Albums From <?= $artist->getArtistName() ?></h5>
            <?php foreach($albums as $album) {?>
                <a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>"><img src="<?= $album->getAlbumImage() ?>" class="img-responsive" width="100" height="100" border=2 style="float: left; margin-right: 1%; margin-bottom: 0.5em;"></a>
            <?php } ?>
        </div>
    </div>
</div>
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
<br>
<br><br>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?php require_once __DIR__ . '/_footer.php'; ?>
