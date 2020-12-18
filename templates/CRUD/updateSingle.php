<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$artists = \Itb\Artist::getAll();
$albums = \Itb\Album::getAll();
?>
<br>
<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=adminSingle'>Edit Singles</a>
        <span class="breadcrumb-item active">Update Single Details</span>
    </nav>
    <div id="spaceOf10">
    <h2>Edit Single</h2>
    <form action="index.php?action=updateSingle"
          method="POST" enctype="multipart/form-data">
        <input type="hidden" name="songID" value="<?=$song->getSongID() ?>">
        <div class="form-group">
            <label><b>Single Name</b></label>
            <input type="text" class="form-control" id="songName" value="<?=$song->getSongName() ?>" name="songName" required="required">
        </div>
        <div class="form-group">
            <label><b>Writer(s)</b></label>
            <input type="text" class="form-control" id="songWriter" value="<?=$song->getSongWriter() ?>" name="songWriter" required="required">
        </div>
        <div>
            <label><b>Single Image</b></label>
        </div>
        <img src="<?=$song->getSongImage() ?>" width="240" height="240" class="img-responsive">
        <br>
        <br>
        <div class="form-group">
            <label><b>Upload New Image</b></label>
            <br>
            <input type="hidden" name="id">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input name="uploadedfile" type="file" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg">
            <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload song image of type .png, .jpg, .jpeg.</small>
        </div>
        <div class="form-group">
            <label><b>Price</b></label>
            <input type="number" min="0.00" max="10000.00" step="any" class="form-control" id="songPrice" value="<?=$song->getSongPrice() ?>" name="songPrice" required="required">
        </div>
        <div class="form-group">
            <label><b>Length</b></label>
            <input type="time" class="form-control" id="songLength" value="<?=$song->getSongLength() ?>" name="songLength" required="required">
        </div>
        <div class="form-group">
            <label><b>Category</b></label>
            <input type="text" class="form-control" id="songCat" value="<?=$song->getSongCat() ?>" name="songCat" required="required">
        </div>
        <div class="form-group">
            <label><b>Track Number</b></label>
            <input type="number" class="form-control" id="songTrackNo" value="<?=$song->getSongTrackNo() ?>" name="songTrackNo" required="required">
        </div>

        <label><b>List of Artist ID's</b></label>
        <div class="dropup">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Artist ID's
                <span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><b>ID   Artist Name</b></li>
                <?php foreach($artists as $artist) {?>
                    <li><?=$artist->getArtistID() ?> |  <?=$artist->getArtistName() ?></li>
                <?php } ?>
            </ul>
        </div>

        <br>
        <div class="form-group">
            <label><b>Artist ID</b></label>
            <input type="number" min="1" max="<?= sizeof($artists)?>" class="form-control" id="artistID" value="<?=$song->getArtistID() ?>" name="artistID" required="required">
        </div>
        <br>
        <label><b>List of Album ID's</b></label>
        <div class="dropup">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Album ID's
                <span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><b>ID   Album Name</b></li>
                <?php foreach($albums as $album) {?>
                    <li><?=$album->getAlbumID() ?> |  <?=$album->getAlbumName() ?></li>
                <?php } ?>
            </ul>
        </div>
        <br>
        <div class="form-group">
            <label><b>Album ID</b></label>
            <input type="number" min="1" max="<?= sizeof($albums)?>" class="form-control" id="albumID" value="<?=$song->getAlbumID() ?>" name="albumID" required="required">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?action=adminSingle" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
    </form>
    </div>
</div>
    <br>
    <br>
<style>
    .scrollable-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }
</style>
<?php require_once __DIR__ . '/../_footer.php'; ?>