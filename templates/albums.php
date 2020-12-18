<?php require_once __DIR__ . '/../templates/_head.php'; ?>
<?php require_once __DIR__ . '/../templates/_nav.php'; ?>
<?php $albums = \Itb\Album::getAll() ?>
<?php $counter = 1; $flag = false;
if($select != 'Filter By Category'){
    $flag = true;
}
?>
<br>
<style>
    .well form {
        text-align: right;
    }
    .well {
        margin-top: 1em;
    }
</style>
<br>
<div class="container">
    <div class="well well-sm">
        <form action="index.php?action=setCat" method="post">
            <h2 class="display-4 float-left">Albums</h2>
            <?php if($select != 'Filter By Category'){?>
            <p>Results For <?= $select ?>
                <?php }?>
                <select id="category" name="select1"">
                <option value="Filter By Category"><?php if($select != 'Filter By Category'){?>
                        All
                    <?php }
                    else{ ?>

                        <?=$select ?><?php
                    }?></option>
                <option value="Pop">Pop</option>
                <option value="Jazz">Jazz</option>
                <option value="Rap">Rap</option>
                <option value="Heavy Metal">Heavy Metal</option>
                </select>
                <input type="submit" name="submit" value="Filter"/></p>
        </form>
    </div>
    <br>
    <div class="row">
        <?php if ($flag == true){
            foreach($albums as $album) {
                if ($album->getAlbumCat() == $select) {?>
                    <?php $artist = \Itb\Artist::getArtistById($album->getArtistID()); ?>
                    <div class="col-sm-3" id="id1">
                        <div class="col-item">
                            <div class="photo">
                                <a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>"> <img src="<?= $album->getAlbumImage() ?>" width="200" height="200" class="img-responsive"></a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-12">
                                        <h6><?= $album->getAlbumName() ?></h6>
                                        <h6 class="price-text-color">€<?= $album->getAlbumPrice() ?></h6>
                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <p class="btn-add">
                                        <?php if($isLoggedIn){ ?>
                                        <a href="index.php?action=addToCart&id=<?= $album->getAlbumID() ?>&type=Album" data-toggle="tooltip" title="Add to Cart" data-placement="right"><i class="fas fa-cart-plus"></i> Add to Cart</p></a>
                                    <?php } else { ?>
                                        <a href="#" class="hidden-sm"  data-toggle="modal" data-target="#id01"><span data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus"></i> Add to cart</a></span></p>
                                    <?php } ?>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>">More details</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++ ?>
                <?php } ?>
            <?php } ?>
        <?php } else {
            foreach($albums as $album) {
                $artist = \Itb\Artist::getArtistById($album->getArtistID()); ?>
                <div class="col-sm-3" id="id1">
                    <div class="col-item">
                        <div class="photo">
                            <a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>"> <img src="<?= $album->getAlbumImage() ?>" width="200" height="200" class="img-responsive"></a>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-12">
                                    <h6><?= $album->getAlbumName() ?></h6>
                                    <h6 class="price-text-color">€<?= $album->getAlbumPrice() ?></h6>
                                </div>
                            </div>
                            <div class="separator clear-left">
                                <p class="btn-add">
                                    <?php if($isLoggedIn){ ?>
                                    <a href="index.php?action=addToCart&id=<?= $album->getAlbumID() ?>&type=Album" data-toggle="tooltip" title="Add to Cart" data-placement="right"><i class="fas fa-cart-plus"></i> Add to Cart</p></a>
                                <?php } else { ?>
                                    <a href="#" class="hidden-sm"  data-toggle="modal" data-target="#id01"><span data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fas fa-cart-plus"></i> Add to cart</a></span></p>
                                <?php } ?>
                                <p class="btn-details">
                                    <i class="fa fa-list"></i><a href="index.php?action=showAlbum&albumName=<?= $album->getAlbumName() ?>">More details</a></p>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                </div>
                <?php $counter++ ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
<div class="modal fade" id="id01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Not Logged In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>You need to be logged in in order to purchase music.</h2>
                <br>
                <small><b>Not A Member</b></small>
                <small>You can simply sign up for free account by clicking on the sign-up button in the top right corner of the page.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/_footer.php'; ?>