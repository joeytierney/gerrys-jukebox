<?PHP
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/../templates/_nav.php';

$artist = \Itb\Artist::getOneByArtist($artistName);
$albums = \Itb\Album::getAlbumsByArtistID($artist->getArtistID());
;?>
<br>

<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=artist'>Artists</a>
        <span class="breadcrumb-item active"><?= $artist->getArtistName() ?></span>
    </nav>
    <div id="spaceOf10">
        <div class="text-center">
            <img src="<?= $artist->getArtistImage() ?>" class="img-fluid" width="800" height="300" alt="<?= $artist->getArtistName() ?>">
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12"">
                <h3>BIOGRAPHY</h3>
                <p><?= $artist->getArtistBio() ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-7 col-sm-6 col-lg-12"">
                <h3>DISCOGRAPHY</h3>
                <div class="artistDisc">
                    <?php if ($albums != null) { ?>
                        <?php foreach($albums as $album) {?>
                               <a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>"><img src="<?= $album->getAlbumImage() ?> "class="img-responsive" width="200" height="200" border=2 style="float: left; margin-right: 1%; margin-bottom: 0.5em;"></a>
                        <?php } ?>
                    <?php } else {?>
                    <p>No Albums to display</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/_footer.php'; ?>