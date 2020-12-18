<?php
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';
$user = \Itb\User::getOneByUsername($username);
?>
<br>
<div class="container">

<h2 class="display-4"><?= $user->getFirstName() ?> <?= $user->getLastName() ?>'s Details</h2>
<br>
<br>
<dl>
    <dt><img src="<?= $user->getUserImage() ?>" alt=""  class="img-responsive" width="280" height="280"></dt>

    <dt>ID:</dt>
    <dd><?= $user->getUserId() ?></dd>
    <dt>First Name:</dt>
    <dd><?= $user->getFirstName() ?></dd>
    <dt>Last Name:</dt>
    <dd><?= $user->getLastName() ?></dd>
    <dt>Username:</dt>
    <dd><?= $user->getUserName() ?></dd>
</dl>
    <form enctype="multipart/form-data" action="index.php?action=imageUpload" method="POST">
        <input type="hidden" name="id" value="<?= $user->getUserId() ?>" required="required">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" required="required">
        <h4>Change Profile image</h4>
        <input name="uploadedfile" type="file" accept=".png, .jpg, .jpeg" aria-describedby="fileHelp" required="required">
        <br>
        <br>
        <input type="submit" value="Upload File"/>
        <br>
        <small id="fileHelp" class="form-text text-muted">Click "Choose File" to upload profile image of type .png, .jpg, .jpeg.</small>
    </form>
    <br>
    <h4>Change Background Colour</h4>
    <a href='index.php?action=setBackgroundColorBlue'>Blue</a>
    <br>
    <a href='index.php?action=setBackgroundColorGreen'>Green</a>
    <br>
    <a href='index.php?action=setBackgroundColorDefault'>Default</a>
    <br>
    <br>
    <h4>Change Your Password</h4>
    <a href="#" data-toggle="modal" data-target="#change-password" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-lock"></span> Change Password</a>
    <div class="modal fade" id="chane-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Change Password</h1><br>
                <form action="index.php?action=updateProfile" method="post">
                    <h1>Change Password</h1>
                    <label>Enter New Password</label>
                    <input type="password" name="userPassword" placeholder="Password">
                    <input type="hidden" name="userId" value="<?= $user->getUserId() ?>">
                    <input type="submit" name="register" class="login loginmodal-submit" value="Change Password" onclick="myFunction()">
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=updateProfile" method="post" onsubmit="return myFunction()">
                        <label>Enter New Password</label>
                        <input class="form-control" type="password" name="userPassword" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        <input type="hidden" name="userId" value="<?= $user->getUserId() ?>">
                        <br>
                        <hr>
                    <div class="col-sm-12 text-center">
                        <button id="submit" type="submit" name="register" class="btn btn-outline-success btn-lg btn-block">Change Password</button>
                        <button type="button" class="btn btn-outline-danger btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function myFunction() {
            alert("Password Successfully Changed");
        }
    </script>
<br>
<br>
<?php require_once __DIR__ . '/_footer.php';

