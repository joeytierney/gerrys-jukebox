<?php
require_once __DIR__ . '/../_head.php';
require_once __DIR__ . '/../_nav.php';
$singles = \Itb\Single::getAll()

?>
<br>
    <div class="container">
        <div class="row">
            <h3>Edit Single Details</h3>
        </div>
    <div class="row">
        <label>Add a New Single</label>
    </div>
    <div class="row">
        <a href="index.php?action=showNewSingle" class="btn btn-outline-primary btn-lg">Create</a>
    </div>
        <br>
        <div class="row">

            <div class="table-responsive">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="hideCol">Track No</th>
                        <th class="hideCol">Writers</th>
                        <th class="hideCol">Length</th>
                        <th class="hideCol">Price</th>
                        <th class="hideCol">Category</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($singles as $single) {
                        ?>
                        <tr>
                            <td><?=$single->getSongName()?></td>
                            <td class="hideCol"><?=$single->getSongTrackNo()?></td>
                            <td class="hideCol" width="25%"><?=$single->getSongWriter()?></td>
                            <td class="hideCol"><?=$single->getSongLength()?></td>
                            <td class="hideCol">€<?=$single->getSongPrice()?></td>
                            <td class="hideCol"><?=$single->getSongCat()?></td>
                            <td><a class="btn btn-success" href="index.php?action=singleUpdate&songID=<?=$single->getSongID()?>">Update</a></td>
                            <td><a class="btn btn-danger" href="index.php?action=deleteSingle&id=<?=$single->getSongID() ?>" onclick="myFunction()">Delete</a></td>
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
            alert("Single Deleted Successfully");
        }
    </script>
    <style>
        .table-responsive {
            display: table;
        }
    </style>
<?php require_once __DIR__ . '/../_footer.php'; ?>