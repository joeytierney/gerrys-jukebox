<?php
$indexLinkStyle = isset($indexLinkStyle) ? $indexLinkStyle : 'nav-link';
$chartLinkStyle = isset($chartLinkStyle) ? $chartLinkStyle : 'nav-link';
$contactLinkStyle = isset($contactLinkStyle) ? $contactLinkStyle : 'nav-link';
$artistLinkStyle = isset($artistLinkStyle) ? $artistLinkStyle : 'nav-link';
$albumLinkStyle = isset($albumLinkStyle) ? $albumLinkStyle : 'nav-link';
$profileLinkStyle = isset($profileLinkStyle) ? $profileLinkStyle : 'nav-link';
$adminAlbumLinkStyle = isset($adminAlbumLinkStyle) ? $adminAlbumLinkStyle : 'nav-link';
$adminArtistLinkStyle = isset($adminArtistLinkStyle) ? $adminArtistLinkStyle : 'nav-link';
$adminSingleLinkStyle = isset($adminSingleLinkStyle) ? $adminSingleLinkStyle : 'nav-link';
$songLinkStyle = isset($songLinkStyle) ? $songLinkStyle : 'nav-link';
$image = \Itb\User::getUserImageByUserName($username);

?>
<body>
<style>
    body{
        background-color: <?= $backgroundColor ?>;
    }
    .navbar {
        background-color: <?= $backgroundColor ?>;
    }

</style>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded nav-tabs">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img src="../images/gerrys.png" alt="GerrysJukebox"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href='index.php' class="<?= $indexLinkStyle ?>"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="index.php?action=song" class="<?= $songLinkStyle ?>"><i class="fas fa-music"></i> Singles</a>
            </li>
            <li class="nav-item">
                <a href='index.php?action=albums' class="<?= $albumLinkStyle ?>"><i class="fas fa-play"></i> Albums</a>
            </li>
            <li class="nav-item">
                <a href='index.php?action=artist' class="<?= $artistLinkStyle ?>"><i class="fas fa-users"></i> Artists</a>
            </li>
            <li class="nav-item">
                <a href='index.php?action=chart' class="<?= $chartLinkStyle ?>"><i class="fas fa-chart-bar"></i> Top 15 Chart</a>
            </li>
            <li class="nav-item">
                <a href='index.php?action=contact' class="<?= $contactLinkStyle ?>"><i class="fab fa-wpforms"></i> Contact</a>
            </li>
            <?php
            //----------------------------
            if($isLoggedIn):?>
                <li class="nav-item">
                    <a href='index.php?action=profile' class="<?= $profileLinkStyle ?>"><i class="fas fa-address-card"></i> Profile</a>
                </li>
            <?php endif; ?>
            <?php if($isAdmin): ?>
                <li class="nav-item dropdown">
                    <a class="<?= $adminAlbumLinkStyle ?> dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-unlock-alt"></i> Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href='index.php?action=adminAlbum'>Edit Albums</a>
                        <a class="dropdown-item" href='index.php?action=adminArtist'>Edit Artist</a>
                        <a class="dropdown-item" href='index.php?action=adminSingle'>Edit Singles</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li>
                <form class="form-inline my-2 my-lg-0 pull-right" action="index.php?action=find&name" method="post">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                </form>
            </li>
            <?php
            if($isLoggedIn && $albumCart != 0):
                ?>
                <li class="nav-brand">
                    <a href='index.php?action=profile'><img class="nav-link" src="<?= $image ?>" alt="" width="50" height="50"></a>
                </li>
                <li class="navbar-item">
                    <a href="index.php?action=showCart" class="nav-link" data-toggle="tooltip" data-placement="right" title="Check Out"><i class="fas fa-shopping-cart"></i><?php require_once '_navCart.php' ?></a>
                </li>
                <li class="navbar-item">
                    <a href="index.php?action=logout" class="nav-link"><i class="fas fa-sign-in-alt"></i> Logout</a>
                </li>
                <?php
            else:
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#register-form"><i class="fas fa-user"></i> Sign Up</a>
                </li>
                <li>
                <div class="modal fade" id="register-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="index.php?action=processRegister" method="post">
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>First Name</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="text" name="firstName" placeholder="First Name" required="required"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Last Name</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="text" name="lastName" placeholder="Last Name" required="required"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Email</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="email" name="email" placeholder="Email" required="required"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Username</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="text" name="username" placeholder="Username" required="required" pattern=".{5,}"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Password</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="password" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <input type="submit" name="register" class="btn btn-primary btn-lg btn-block" value="Register">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="navbar-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li>
                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Login to Your Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="index.php?action=processLogin" method="post">
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Username</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="text" name="username" placeholder="Username" required="required"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-3"><label>Password</label></div>
                                            <div class="col-9 col-md-offset-4"><input class="form-control" type="password" name="password" placeholder="Password" required="required"></div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                <?php
            endif;
            ?>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $(document).ready(function () {
        var links = $('.navbar ul li a');
        $.each(links, function (key, va) {
            if (va.href == document.URL) {
                $(this).addClass('active');
            }
        });
    });
    $('#myModal').modal({
        keyboard: false
    });
    $('#myTab').on('shown.bs.tab', function(evt) {
        $(evt.target).parent().addClass('active');
        $(evt.relatedTarget).parent().removeClass('active');
    });
</script>
<article>
