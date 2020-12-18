<?php
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/../templates/_nav.php';

$artists = \Itb\Artist::getAll();
?>
<br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Artist</th>
                <th class="hideCol">Label</th>
            </thead>
            <tbody>
            <?php foreach($artists as $artist) {?>
            <tr>
                <td id="tdFont"><a href="index.php?action=show&artistName=<?= $artist->getArtistName() ?>"><img src="<?= $artist->getArtistImage() ?>" width="220" height="120"  class="img-fluid"></a></td>
                <td id="tdFont"><a href="index.php?action=show&artistName=<?= $artist->getArtistName() ?>"><?= $artist->getArtistName() ?></a></td>
                <td id="tdFont" class="hideCol"><?= $artist->getArtistLabel()?></td>
            </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/_footer.php'; ?>
