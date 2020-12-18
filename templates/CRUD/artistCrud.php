<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$artists = \Itb\Artist::getAll()

?>
<br>
<div class="container">
    <div class="row">
        <h3>Edit Artists Details</h3>
    </div>
    <div class="row">
        <label>Add a New Artist</label>
    </div>
    <div class="row">
        <a href="index.php?action=showNewArtist" class="btn btn-outline-primary btn-lg">Create</a>
    </div>
    <br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Artist Name</th>
                        <th class="hideCol">Artist Image</th>
                        <th class="hideCol">Artist Label</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($artists as $artist) {
                        ?>
                        <tr>
                            <td><?=$artist->getArtistName()?></td>
                            <td class="hideCol"><img src="<?= $artist->getArtistImage() ?>" alt=""  class="img-responsive" width="120" height="60"></td>
                            <td class="hideCol"><?= $artist->getArtistLabel()?></td>
                            <td>
                                <a class="btn btn-success" href="index.php?action=artistUpdate&artistID=<?=$artist->getArtistID()?>">Update</a>
                                <a class="btn btn-danger" href="index.php?action=deleteArtist&id=<?=$artist->getArtistID() ?>" onclick="myFunction()">Delete</a>
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
</div>
    <script>
        function myFunction() {
            alert("Artist Deleted Successfully");
        }
    </script>
    <style>
        .table-responsive {
            display: table;
        }
    </style>

<?php require_once __DIR__ . '/../_footer.php'; ?>