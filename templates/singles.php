<?php
require_once __DIR__ . '/../templates/_head.php';
require_once __DIR__ . '/_nav.php';
$singles = \Itb\Single::getAllSinglesInOrder();
$flag = false;
$id1=1;
$id2=1;
if($select1 != 'Filter By Category'){
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
            <form action="index.php?action=setSongCat" method="post">
                <h2 class="display-4 float-left">Singles</h2>
                <?php if($select1 != 'Filter By Category'){?>
                <p>Results For <?= $select1 ?>
                    <?php }?>

                    <select id="category" name="select" title="Filter">
                    <option value="Filter By Category"><?php if($select1 != 'Filter By Category'){?>
                            All
                        <?php }
                        else{ ?>

                            <?=$select1 ?><?php
                        }?></option>
                    <option value="Pop">Pop</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Rap">Rap</option>
                    <option value="Heavy Metal">Heavy Metal</option>
                    </select>
                <input type="submit" name="submit" value="Filter"/>
            </form>
        </div>
        <br>
        <br>
        <div class="row">
            <?php if ($flag == true){
                foreach($singles as $single) {
                    if ($single->getSongCat() == $select1) {?>
                        <?php $artist = \Itb\Artist::getArtistById($single->getArtistID()) ?>
                        <?php $album = \Itb\Album::getAlbumNameByArtistID($single->getArtistID()) ?>
                        <div class="col-sm-3" id="id<?=$id1++?>" style="padding-bottom: 2%">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="index.php?action=showSong&songID=<?= $single->getSongID()?>"><img src="<?= $single->getSongImage() ?>" width="200" height="200" class="img-responsive" alt="<?=$single->getSongName()?>"></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h6><?= $single->getSongName() ?></h6>
                                            <h6 class="price-text-color">€<?= $single->getSongPrice() ?></h6>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <?php if($isLoggedIn){ ?>
                                            <a href="index.php?action=addSongToCart&id=<?= $single->getSongID() ?>&type=Single" data-toggle="tooltip" title="Add to Cart" data-placement="right"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                                        <?php } else { ?>
                                            <a href="#" class="hidden-sm"  data-toggle="modal" data-target="#id01"><i class="fas fa-cart-plus"></i><span data-toggle="tooltip" data-placement="right" title="Add to Cart"> Add to cart</a></span></p>
                                        <?php } ?>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="index.php?action=showSong&songID=<?= $single->getSongID()?>">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else {
                foreach($singles as $single) {?>
                    <?php $artist = \Itb\Artist::getArtistById($single->getArtistID()) ?>
                    <?php $album = \Itb\Album::getAlbumNameByArtistID($single->getArtistID()) ?>
                    <div class="col-sm-3" id="id<?=$id1++?>" style="padding-bottom: 2%">
                        <div class="col-item">
                            <div class="photo">
                                <a href="index.php?action=showSong&songID=<?= $single->getSongID() ?>"> <img src="<?= $single->getSongImage() ?>" width="200" height="200" class="img-responsive" alt="<?= $single->getSongName() ?>"></a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-12">
                                        <h6><?= $single->getSongName() ?></h6>
                                        <h6 class="price-text-color">€<?= $single->getSongPrice() ?></h6>
                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <p class="btn-add">
                                        <?php if($isLoggedIn){ ?>
                                        <a href="index.php?action=addSongToCart&id=<?= $single->getSongID() ?>&type=Single" data-toggle="tooltip" title="Add to Cart" data-placement="right"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                                    <?php } else { ?>
                                        <a href="#" class="hidden-sm"  data-toggle="modal" data-target="#id01"><i class="fas fa-cart-plus"></i><span data-toggle="tooltip" data-placement="right" title="Add to Cart"> Add to cart</span></a></p>
                                    <?php } ?>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="index.php?action=showSong&songID=<?= $single->getSongID()?>">More details</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="modal fade" id="id01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">User Not Logged In</h5>
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