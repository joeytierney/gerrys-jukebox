<?PHP
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/../templates/_nav.php';

;?>
<br>
<div class="well well-lg"><h1>Shopping Cart</h1></div>
<div class="container">
<table class="table table-striped">
    <tr>
        <th>Album</th>
        <th>Price</th>
        <th>Quantity</th>
        <th class="hideCol">Sub Total</th>
        <th width="10%">Remove Album</th>
    </tr>
<?php
//-----------------------------
$total = 0;

foreach($albumCart as $cartItem):
    $album = $cartItem->getAlbum();
    $subTotal = $album->getALbumPrice() * $cartItem->getQuantity();
    $total += $subTotal;
//-----------------------------
?>
    <tr>
        <td><?= $album->getAlbumName() ?></td>
        <td>&euro;<?= $album->getAlbumPrice() ?></td>
        <td><?= $cartItem->getQuantity() ?></td>
        <td class="hideCol">€ <?= $subTotal ?></td>
        <td width="10%"><a href="index.php?action=removeAlbumFromCart&id=<?= $album->getAlbumID() ?>"class="btn btn-warning">Remove</a></td>
    </tr>

<?php
//-----------------------------
endforeach;
//-----------------------------
?>

</table>
<table class="table table-striped">
    <tr>
        <th>Song</th>
        <th>Price</th>
        <th>Quantity</th>
        <th class="hideCol">Sub Total</th>
        <th width="10%">Remove Song</th>
    </tr>
    <?php
    //-----------------------------
   // $total = 0;

    foreach($songCart as $cartItem):
        $song = $cartItem->getSong();
        $subTotal = $song->getSongPrice() * $cartItem->getQuantity();
        $total += $subTotal;
//-----------------------------
        ?>
        <tr>
            <td><?= $song->getSongName() ?></td>
            <td>&euro;<?= $song->getSongPrice() ?></td>
            <td><?= $cartItem->getQuantity() ?></td>
            <td class="hideCol">€ <?= $subTotal ?></td>
            <td width="10%"><a href="index.php?action=removeSongFromCart&id=<?= $song->getSongID() ?>" class="btn btn-warning">Remove</a></td>

        </tr>

        <?php
//-----------------------------
    endforeach;
    //-----------------------------
    ?>
    <tr class="success">
        <td colspan="3"><b>Total</td>
        <td><b>&euro; <?= $total ?></td>
    </tr>
</table>
<a href="index.php?action=emptyCart"  class="btn btn-danger">EMPTY CART</a>
<?php if ($total != 0) { ?>
    <a href="index.php?action=checkOut&total=<?= $total ?>"  class="btn btn-success">CHECK OUT</a>
<?php } ?>
</div>
<br><br>
<?php require_once __DIR__ . '/_footer.php'; ?>
