<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$albums = \Itb\Album::getAll()

?>
<br>
<div class="container">
    <div class="row">
        <h3>Edit Album Details</h3>
    </div>
    <div class="row">
        <label>Add a New Album</label>
    </div>
    <div class="row"><a href="index.php?action=showNewAlbum" class="btn btn-outline-primary btn-lg">Create</a></div>
        <br>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Album Name</th>
                        <th class="hideCol">Album Release</th>
                        <th class="hideCol">Album Price</th>
                        <th class="hideCol">Album Image</th>
                        <th class="hideCol">Artist ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($albums as $album) {
                    ?>
                    <tr>
                        <td width="25%"><?=$album->getAlbumName()?></td>
                        <td class="hideCol"><?=$album->getAlbumRelease()?></td>
                        <td class="hideCol">€<?= $album->getAlbumPrice()?></td>
                        <td class="hideCol"><img src="<?= $album->getAlbumImage() ?>" alt=""  class="img-responsive" width="60" height="60"></td>
                        <td class="hideCol"><?= $album->getArtistID()?></td>
                        <td>
                        <a class="btn btn-success" href="index.php?action=albumUpdate&albumID=<?=$album->getAlbumID()?>">Update</a>
                        <a class="btn btn-danger" href="index.php?action=deleteAlbum&id=<?=$album->getAlbumID() ?>" onclick="myFunction()">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- /container -->
    <script>
        function myFunction() {
            alert("Album Deleted Successfully");
        }
    </script>
    <style>
        .table-responsive {
            display: table;
        }
    </style>
<?php require_once __DIR__ . '/../_footer.php'; ?>