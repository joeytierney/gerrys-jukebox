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
        <span class="breadcrumb-item active">Add New Single</span>
    </nav>
    <div id="spaceOf10">
    <h2>Add New Single</h2>
    <form action="index.php?action=newSingle"
          method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label><b>Single Name</b></label>
            <input type="text" class="form-control" id="songName" placeholder="Enter single name" name="songName" required="required">
        </div>
        <div class="form-group">
            <label><b>Writer(s)</b></label>
            <input type="text" class="form-control" id="songWriter" placeholder="Enter single writer(s)" name="songWriter" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">If theres more than one writer seperate name by a comma e.g. Paul Deitel,‎ Harvey Deitel etc.</small>
        </div>
        <div>
        </div>
        <div class="form-group">
            <label><b>Upload Single Image</b></label>
            <br>
            <input type="hidden" name="id">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input name="uploadedfile" type="file" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg" required="required">
            <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload song image of type .png, .jpg, .jpeg.</small>
        </div>
        <div class="form-group">
            <label><b>Price</b></label>
            <input type="number" min="0.00" max="10000.00" step="any" class="form-control" id="songPrice" placeholder="Enter the singles price" name="songPrice" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Price needs to be in float format e.g 1.99, 10.00, 1.50 etc.</small>
        </div>
        <div class="form-group">
            <label><b>Length</b></label>
            <input type="time" class="form-control" id="songLength" placeholder="Enter the singles play length" name="songLength" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Length needs to be in the type double format e.g 3.47, 5.10, 1.36 etc.</small>
        </div>
        <div class="form-group">
            <label><b>Category</b></label>
            <input type="text" class="form-control" id="songCat" placeholder="Enter the music category of the single" name="songCat" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Music category e.g. Rock, Rap, Heavy Metal etc.</small>
        </div>
        <div class="form-group">
            <label><b>Track Number</b></label>
            <input type="number" class="form-control" id="songTrackNo" placeholder="Enter track number" name="songTrackNo" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Track number needs to be of type integer.</small>
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
            <input type="number" min="1" max="<?= sizeof($artists)?>" class="form-control" id="artistID" placeholder="Enter the Artist ID" name="artistID" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">If the Artist is not displayed in the drop down above, you need to add the Artist before adding the Single</small>

        </div>

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
            <input type="number" min="1" max="<?= sizeof($albums)?>" class="form-control" id="albumID" placeholder="Enter Album ID" name="albumID" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">If the Album artist is not displayed in the drop down above, you need to add the Artist before adding the Album</small>

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