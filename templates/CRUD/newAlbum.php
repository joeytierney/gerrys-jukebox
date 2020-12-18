<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$allArtists = \Itb\Artist::getAll();
?>
<br>

<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=adminAlbum'>Edit Albums</a>
        <span class="breadcrumb-item active">Add New Album</span>
    </nav>
    <div id="spaceOf10">
    <h2>Add New Album</h2>
    <form action="index.php?action=newAlbum"
          method="POST" enctype="multipart/form-data">
        <input type="hidden" name="albumID" value="">
        <div class="form-group">
            <label><b>Album Name</b></label>
            <input type="text" class="form-control" id="albumName" placeholder="Enter Album Name" name="albumName" required="required">
        </div>
        <div class="form-group">
            <label><b>Album Release</b></label>
            <input type="date" class="form-control" id="albumRelease" placeholder="Enter Album Release Date" name="albumRelease" required="required">
        </div>
        <div class="form-group">
            <label><b>Album Category</b></label>
            <input type="text" class="form-control" id="albumCat" placeholder="Enter Album Category" name="albumCat" required="required">
        </div>
        <div class="form-group">
            <label><b>Album Video</b></label>
            <input type="text" class="form-control" id="albumVideo" placeholder="Enter Album Video Link" name="albumVideo" required="required">
            <small id="fileHelp" class="form-text text-muted">Add the video source section from the iframe e.g. src="abc", just the abc part</small>
        </div>
        <div class="form-group">
            <label><b>Upload Album Image</b></label>
            <br>
            <input type="hidden" name="id">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input name="uploadedfile" type="file" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg" required="required">
            <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload album image of type .png, .jpg, .jpeg and size of either 300x300 or 200x200</small>
        </div>
        <div class="form-group">
            <label><b>Album Price</b></label>
            <input type="number" min="0.00" max="10000.00" step="any" class="form-control" id="albumPrice" placeholder="Enter Album Price" name="albumPrice" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Price needs to be in float format e.g 9.99, 10.00, 1.50 etc.</small>
        </div>
        <br>
        <label><b>List of Artist ID's</b></label>
        <div class="dropup">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Artist ID's
                <span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu">
                <li><b>ID   Artist Name</b></li>
                <?php foreach($allArtists as $allArtist) {?>
                    <li><?= $allArtist->getArtistID() ?>  |  <?= $allArtist->getArtistName() ?></li>
                <?php } ?>
            </ul>
        </div>

        <br>
        <div class="form-group">
            <label><b>Artist ID</b></label>
            <input type="number" min="1" max="<?= sizeof($allArtists)?>" class="form-control" id="artistID" placeholder="Enter Artist ID" name="artistID" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">If the Album artist is not displayed in the drop down above, you need to add the Artist before adding the Album</small>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?action=adminAlbum" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>

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

