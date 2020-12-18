<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$artist = \Itb\Artist::getArtistByArtistID($artist->getArtistID());

?>
<br>
<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=adminArtist'>Edit Artist's</a>
        <span class="breadcrumb-item active">Update Artist Details</span>
    </nav>
    <div id="spaceOf10">
    <h2>Edit <?=$artist->getArtistName() ?>'s Details</h2>
    <form action="index.php?action=updateArtist"
          method="POST" enctype="multipart/form-data">
        <input type="hidden" name="artistID" value="<?= $artist->getArtistID() ?>">
        <div class="form-group">
            <label><b>Artist(s) Name</b></label>
            <input type="text" class="form-control" id="artistName" value="<?= $artist->getArtistName() ?>" name="artistName" required="required">
        </div>
        <div class="form-group">
            <label><b>Artist Record Label</b></label>
            <input type="text" class="form-control" id="artistLabel" value="<?= $artist->getArtistLabel() ?>" name="artistLabel" required="required">
        </div>
        <div class="form-group">
            <label><b>Artist Music Category</b></label>
            <input type="text" class="form-control" id="artistCat" value="<?= $artist->getArtistCat() ?>" name="artistCat" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Artist music category e.g. Rock, Rap, Heavy Metal etc.</small>
        </div>
        <div>
            <label><b>Artist Image</b></label>
        </div>
        <img src="<?= $artist->getArtistImage() ?>" width="360" height="160" class="img-responsive">
        <br>
        <br>
        <div class="form-group">
            <label><b>Upload New Image</b></label>
            <br>
            <input type="hidden" name="id">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input name="uploadedfile" type="file" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg">
            <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload album image of type .png, .jpg, .jpeg.</small>
        </div>
        <div class="form-group">
            <label><b>Artist Biography</b></label>
            <textarea class="form-control" rows="8" name="artistBio" id="artistBio" required="required"><?= $artist->getArtistBio() ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?action=adminArtist" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
    </form>
    </div>
</div>
    <br>
    <br>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<?php require_once __DIR__ . '/../_footer.php'; ?>