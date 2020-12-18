<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';

?>
<br>
<div class="container">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href='index.php'>Home</a>
        <a class="breadcrumb-item" href='index.php?action=adminArtist'>Edit Artist's</a>
        <span class="breadcrumb-item active">Add New Artist</span>
    </nav>
    <div id="spaceOf10">
    <h2>Add New Artist</h2>
    <form action="index.php?action=newArtist"
          method="POST" enctype="multipart/form-data">
        <input type="hidden" name="artistID">
        <div class="form-group">
            <label><b>Artist(s) Name</b></label>
            <input type="text" class="form-control" id="artistName" placeholder="Enter Artist Name" name="artistName" required="required">
        </div>
        <div class="form-group">
            <label><b>Artist Record Label</b></label>
            <input type="text" class="form-control" id="artistLabel" placeholder="Enter Artist Record Label" name="artistLabel" required="required">
        </div>
        <div class="form-group">
            <label><b>Artist Music Category</b></label>
            <input type="text" class="form-control" id="artistCat" placeholder="Enter Artist Music Category" name="artistCat" aria-describedby="fileHelp" required="required">
            <small id="fileHelp" class="form-text text-muted">Artist music category e.g. Rock, Rap, Heavy Metal etc.</small>
        </div>
        <div class="form-group">
            <label><b>Upload Artist Image</b></label>
            <br>
            <input type="hidden" name="id">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input name="uploadedfile" type="file" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg" required="required">
            <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload album image of type .png, .jpg, .jpeg and of size 800x300px.</small>
        </div>
        <div class="form-group">
            <label><b>Artist Biography</b></label>
            <textarea class="form-control" rows="8" name="artistBio" id="artistBio" placeholder="Enter Artist Bio" required="required"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?action=adminArtist" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
    </form>
        </div>
    </div>
    <br>
    <br>
<?php require_once __DIR__ . '/../_footer.php'; ?>