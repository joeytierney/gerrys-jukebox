<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 18/12/2017
 * Time: 15:27
 */

namespace Itb;
use Mattsmithdev\PdoCrud\DatabaseManager;

class MainController
{

    public function __construct()
    {
        $this->loginController = new LoginController();
        $this->searcController = new Search();
    }

    function chartAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Top 15 Chart';
        $chartLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/chart.php';
    }
    function contactAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Contact Us';
        $contactLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/contact.php';
    }
    function indexAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Home Page';
        $indexLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/index.php';
    }

    function songAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select1 = $this->getSongCategory();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Songs';
        $songLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/singles.php';
    }

    function artistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Artists';
        $artistLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/artists.php';
    }

    //REMOVE AND ALSO FROM INDEX
    function artistDetailAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $pageTitle = 'Artist Details';
        $artistDetailsLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/artistDetails.php';
    }

    function albumAction()
    {
        $select1 = $this->getSongCategory();
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $pageTitle = 'Albums';
        $albumLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/albums.php';
    }

    function searchAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = 'Search';

        if (isset($_POST['search']) || !empty($_POST['search'])) {
            $keyword = $_POST['search'];
        }
        $search = $this->searcController->getSearchResults($keyword);

        if($check = Artist::getOneByArtist($search) != null){
            $this->searchArtist($keyword);
        } else if (($check = Album::getOneByAlbum($keyword)) != null){
            $this->searchAlbum($keyword);
        } else if (($check = Single::getSingleByName($keyword)) != null){
            $this->searchSong($keyword);
        }else {
            $message = 'Sorry, no results for ' . $keyword . ' found';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    /**
     * profile action
     */
    function profileAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $this  ->killSession();
        $pageTitle = 'Profile';
        $profileLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/profile.php';
    }

    function searchAlbum($albumName)
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();

        $album = Album::getOneByAlbum($albumName);
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = "$albumName Details";
        $albumLinkStyle = 'nav-link active';

        if(null == $album){
            $message = 'Sorry, no Album with name = ' . $albumName . ' could be retrieved from the database';

            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/albumDetails.php';
        }
    }

    function searchSong($songName)
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();

        $song = Single::getSingleByName($songName);
        $songID = $song->getSongID();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = "$songName Details";
        $songLinkStyle = 'nav-link active';

        if(null == $song){
            $message = 'Sorry, no Song with name = ' . $songName . ' could be retrieved from the database';

            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/singleDetails.php';
        }
    }

    function searchArtist($artistName)
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = "$artistName Details";
        $artistLinkStyle = 'nav-link active';
        $artist= Artist::getOneByArtist($artistName);

        //$albums = Album::getAlbumsByArtistID($artist->getArtistID());

        if(null == $artist){
            $message = 'Sorry, no Artist with name = ' . $artistName . ' could be retrieved from the database';

            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/artistDetails.php';
        }
    }
    function showArtistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $artistName = filter_input(INPUT_GET, 'artistName', FILTER_SANITIZE_STRING);
        $pageTitle = "$artistName Details";
        $artistLinkStyle = 'nav-link active';
        $artist= Artist::getOneByArtist($artistName);

        //$albums = Album::getAlbumsByArtistID($artist->getArtistID());

        if(null == $artist){
            $message = 'Sorry, no Artist with name = ' . $artistName . ' could be retrieved from the database';

            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/artistDetails.php';
        }
    }
    function showAlbumAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $albumName = filter_input(INPUT_GET, 'albumName', FILTER_SANITIZE_STRING);
        $album = Album::getOneByAlbum($albumName);
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = "$albumName Details";
        $albumLinkStyle = 'nav-link active';

        if(null == $album){
            $message = 'Sorry, no Album with name = ' . $albumName . ' could be retrieved from the database';

            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/albumDetails.php';
        }
    }

    function showSingleAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $songID = filter_input(INPUT_GET, 'songID', FILTER_SANITIZE_STRING);
        $song = Single::getSingleById($songID);
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = "Song Details";
        $singleLinkStyle = 'nav-link active';

        if(null == $song){
            $message = 'Sorry, no Song with the ID = ' . $songID. ' could be retrieved from the database';
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/message.php';
        } else {
            // output the detail of artist in HTML table
            require_once __DIR__ . '/../templates/singleDetails.php';
        }
    }

    /**
     * Upload image function
     */
    public function uploadImageAction()
    {
        $target_path = "../public/images/userProfilePics";
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        /* Add the original filename to our target path.
        Result is "uploads/filename.extension" */
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        $target_path = "../public/images/userProfilePics/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            $image = new User();
            $images = basename( $_FILES['uploadedfile']['name']);
            $image->changeImage($id, $images);

            $mainController = new MainController();
            $mainController->profileAction();

        } else{
            $message = "There was an error uploading the file, please try again!";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    /**
     * Change colour function
     * @param $color
     */
    public function changeBackgroundColor($color) {
        $_SESSION['backgroundColor'] = $color;
        $this->profileAction();
    }

    /**
     * get the background colour
     * @return string
     */
    public function getBackgroundColor()
    {
        if (isset($_SESSION['backgroundColor'])){
            return $_SESSION['backgroundColor'];
        } else {
            return 'white';
        }
    }

    /**
     * Add new user function
     */
    public function processRegisterAction()
    {

        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $success = User::addUser($username, $password,$firstName, $lastName, $email);

        if($success){
            $id = $connection->lastInsertId();
            $loginController = new LoginController();
            $loginController->processLoginAction();
        } else {
            $message = 'Sorry, there was a problem creating an account';
            require_once __DIR__ . '/../templates/message.php';
        }

    }

    /**
     * Edit profile action
     */
    function editProfileAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $pageTitle = 'Edit Profile';
        $editProfileLinkStyle = 'nav-link';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
       // require_once __DIR__ . '/../templates/changePassword.php';
    }

    /**
     * Change the users password action
     */
    public function updateProfileAction()
    {
        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);


        $success = new User();
        $success->changePassword($id, $password);
        if($success){
            $message = "Your Password has been changed";
        } else {
            $message = 'Change Password action canceled no changes took place';
        }

        $mainController = new MainController();
        $mainController->profileAction();
    }

    public function albumUpdateAction()
    {
        $albumID = filter_input(INPUT_GET, 'albumID', FILTER_SANITIZE_NUMBER_INT);
        $album = Album::getAlbumByAlbumID($albumID);
        $adminAlbumLinkStyle = 'nav-link active';
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = 'Edit Album';

        if(null == $album){
            $message = 'Sorry, no Album with id = ' . $albumID . ' could be retrieved from the database';

            require_once __DIR__ . '/../templates/message.php';
        } else {
            require_once __DIR__ . '/../templates/CRUD/updateAlbum.php';
        }
    }

    public function updateAlbumAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = 'Edit Albums';
        $adminAlbumLinkStyle = 'nav-link active';
        $albumID = filter_input(INPUT_POST, 'albumID', FILTER_SANITIZE_NUMBER_INT);
        $albumName = filter_input(INPUT_POST, 'albumName', FILTER_SANITIZE_STRING);
        $albumRelease = filter_input(INPUT_POST, 'albumRelease', FILTER_SANITIZE_STRING);
        $albumVideo = filter_input(INPUT_POST, 'albumVideo', FILTER_SANITIZE_STRING);
        $albumCat = filter_input(INPUT_POST, 'albumCat', FILTER_SANITIZE_STRING);
        $albumPrice = filter_input(INPUT_POST, 'albumPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $artistID = filter_input(INPUT_POST, 'artistID', FILTER_SANITIZE_STRING);

        $albumImage = basename( $_FILES['uploadedfile']['name']);

        $success = Album::updateAlbum($albumID,$albumName,$albumPrice,$albumRelease,$albumVideo,$artistID, $albumCat);
        if (null != $albumImage){
            $target_path = "../public/images/albums";
            //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            /* Add the original filename to our target path.
            Result is "uploads/filename.extension" */
            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            $target_path = "../public/images/albums/";

            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $albumImage = basename( $_FILES['uploadedfile']['name']);
                $success = Album::updateAlbums($albumID,$albumName,$albumPrice,$albumRelease,$albumVideo,$artistID,$albumImage,$albumCat);
                if($success){
                    require_once __DIR__ . '/../templates/CRUD/albumCrud.php';
                } else {
                    $message = 'There was a problem updating the Album';
                }
            } else{
                $message = "There was an error uploading the file, please try again!";
                require_once __DIR__ . '/../templates/message.php';
            }
        }

        if($success){

            require_once __DIR__ . '/../templates/CRUD/albumCrud.php';

        }  else {
            $message = 'No changes took place, Action cancelled';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function deleteAlbumAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = 'Edit Albums';

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $success = Album::deleteAlbum($id);

        if($success){
            $message = 'Album with id = ' . $id . ' was deleted successfully';
        } else {
            $message = 'Sorry, Album with id = ' . $id . ' could not be deleted';
        }

        require_once __DIR__ . '/../templates/CRUD/albumCrud.php';
    }

    public function showNewAlbumAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $pageTitle = 'Add New Album';
        $adminAlbumLinkStyle = 'nav-link active';
        require_once __DIR__ . '/../templates/CRUD/newAlbum.php';
    }

    public function newAlbumAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Albums';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $albumName = filter_input(INPUT_POST, 'albumName', FILTER_SANITIZE_STRING);
        $albumRelease = filter_input(INPUT_POST, 'albumRelease', FILTER_SANITIZE_STRING);
        $albumVideo = filter_input(INPUT_POST, 'albumVideo', FILTER_SANITIZE_STRING);
        $albumPrice = filter_input(INPUT_POST, 'albumPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $artistID = filter_input(INPUT_POST, 'artistID', FILTER_SANITIZE_STRING);
        $albumCat = filter_input(INPUT_POST, 'albumCat', FILTER_SANITIZE_STRING);

        $target_path = "../public/images/albums";

        /* Add the original filename to our target path.
        Result is "uploads/filename.extension" */
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        $target_path = "../public/images/albums/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            $albumImage = basename( $_FILES['uploadedfile']['name']);
            $success = Album::newAlbum($albumName,$albumPrice,$albumRelease,$albumVideo,$artistID,$albumImage,$albumCat);

            if($success){
                require_once __DIR__ . '/../templates/CRUD/albumCrud.php';
            } else {
                $message = 'Sorry, there was a problem creating new Album';
            }
        } else{
            $message = "There was an error uploading the file, please try again!";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function artistUpdateAction()
    {
        $artistID = filter_input(INPUT_GET, 'artistID', FILTER_SANITIZE_NUMBER_INT);
        $artist = Artist::getArtistByArtistID($artistID);

        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Artist';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        if(null == $artist){
            $message = 'Sorry, no Artist with id = ' . $artistID . ' could be retrieved from the database';

            require_once __DIR__ . '/../templates/message.php';
        } else {
            require_once __DIR__ . '/../templates/CRUD/updateArtist.php';
        }
    }

    public function updateArtistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Artist';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $artistID = filter_input(INPUT_POST, 'artistID', FILTER_SANITIZE_NUMBER_INT);
        $artistName = filter_input(INPUT_POST, 'artistName', FILTER_SANITIZE_STRING);
        $artistBio = filter_input(INPUT_POST, 'artistBio', FILTER_SANITIZE_STRING);
        $artistLabel = filter_input(INPUT_POST, 'artistLabel', FILTER_SANITIZE_STRING);
        $artistCat = filter_input(INPUT_POST, 'artistCat', FILTER_SANITIZE_STRING);
        $artistImage = basename( $_FILES['uploadedfile']['name']);

        if (null != $artistImage) {
            $target_path = "../public/images/artists";

            /* Add the original filename to our target path.
            Result is "uploads/filename.extension" */
            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            $target_path = "../public/images/artists/";

            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $artistImage = basename( $_FILES['uploadedfile']['name']);
                $success = Artist::updateArtists($artistID, $artistName, $artistLabel, $artistBio, $artistCat, $artistImage);

                if ($success) {
                    $artistImage = null;
                    require_once __DIR__ . '/../templates/CRUD/artistCrud.php';
                } else {
                    $message = 'There was a problem updating the Artist';
                    require_once __DIR__ . '/../templates/message.php';
                }
            } else {
                $message = "There was an error uploading the file, please try again!";
                require_once __DIR__ . '/../templates/message.php';
            }
        }
        $success = Artist::updateArtist($artistID, $artistName, $artistLabel, $artistBio, $artistCat);
        if($success){

            require_once __DIR__ . '/../templates/CRUD/artistCrud.php';

        }  else {
            $message = 'No changes took place, Action cancelled';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function showNewArtistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Add New Artist';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        require_once __DIR__ . '/../templates/CRUD/newArtist.php';
    }

    public function newArtistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Artist';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $artistName = filter_input(INPUT_POST, 'artistName', FILTER_SANITIZE_STRING);
        $artistBio = filter_input(INPUT_POST, 'artistBio', FILTER_SANITIZE_STRING);
        $artistLabel = filter_input(INPUT_POST, 'artistLabel', FILTER_SANITIZE_STRING);
        $artistCat = filter_input(INPUT_POST, 'artistCat', FILTER_SANITIZE_STRING);

        $artistImage = $_FILES['uploadedfile'];

        $target_path = "../public/images/artists";

        /* Add the original filename to our target path.
        Result is "uploads/filename.extension" */
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        $target_path = "../public/images/artists/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            $artistImage = basename( $_FILES['uploadedfile']['name']);
            $success = Artist::newArtist($artistName, $artistLabel, $artistBio, $artistCat, $artistImage);

            if($success){
                require_once __DIR__ . '/../templates/CRUD/artistCrud.php';
            } else {
                $message = 'Sorry, there was a problem creating new Artist';
                require_once __DIR__ . '/../templates/message.php';
            }
        } else{
            $message = "There was an error uploading the file, please try again!";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function deleteArtistAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Artists';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $success = Artist::deleteArtist($id);

        if($success){
            $message = 'Artist with id = ' . $id . ' was deleted successfully';
            require_once __DIR__ . '/../templates/CRUD/artistCrud.php';
        } else {
            $message = 'Sorry, Artist with id = ' . $id . ' could not be deleted';
            require_once __DIR__ . '/../templates/message.php';
        }

    }

    public function singleUpdateAction()
    {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_SANITIZE_NUMBER_INT);
        $song = Single::getSingleById($songID);

        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Single';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        if(null == $song){
            $message = 'Sorry, no Single with id = ' . $songID . ' could be retrieved from the database';
            require_once __DIR__ . '/../templates/message.php';
        } else {
            require_once __DIR__ . '/../templates/CRUD/updateSingle.php';
        }
    }

    public function updateSingleAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Single';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $songID = filter_input(INPUT_POST, 'songID', FILTER_SANITIZE_NUMBER_INT);
        $songName = filter_input(INPUT_POST, 'songName', FILTER_SANITIZE_STRING);
        $songCat = filter_input(INPUT_POST, 'songCat', FILTER_SANITIZE_STRING);
        $songTrackNo = filter_input(INPUT_POST, 'songTrackNo', FILTER_SANITIZE_STRING);
        $songWriter = filter_input(INPUT_POST, 'songWriter', FILTER_SANITIZE_STRING);
        $songLength = filter_input(INPUT_POST, 'songLength', FILTER_SANITIZE_STRING);
        $songPrice = filter_input(INPUT_POST, 'songPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $artistID = filter_input(INPUT_POST, 'artistID', FILTER_SANITIZE_NUMBER_INT);
        $albumID = filter_input(INPUT_POST, 'albumID', FILTER_SANITIZE_NUMBER_INT);
        $songImage = basename( $_FILES['uploadedfile']['name']);

        if (null != $songImage) {

            $target_path = "../public/images/singles";

            /* Add the original filename to our target path.
            Result is "uploads/filename.extension" */
            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            $target_path = "../public/images/singles/";

            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $songImage = basename( $_FILES['uploadedfile']['name']);
                $success = Single::updateSingles($songID, $songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID, $songImage);

                if ($success) {
                   // $songImage = null;
                    require_once __DIR__ . '/../templates/CRUD/singleCrud.php';
                } else {
                    $message = 'There was a problem updating the Single';
                    require_once __DIR__ . '/../templates/message.php';
                }
            } else {
                $message = "There was an error uploading the file, please try again!";
                require_once __DIR__ . '/../templates/message.php';
            }
        }
        $success = Single::updateSingle($songID, $songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID);

        if($success){

            require_once __DIR__ . '/../templates/CRUD/singleCrud.php';

        }  else {
            $message = 'No changes took place, Action cancelled';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function showNewSingleAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Add New Single';
        $adminAlbumLinkStyle = 'nav-link active';
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        require_once __DIR__ . '/../templates/CRUD/newSingle.php';
    }

    public function newSingleAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Single';
        $adminAlbumLinkStyle = 'nav-link active';

        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $songName = filter_input(INPUT_POST, 'songName', FILTER_SANITIZE_STRING);
        $songCat = filter_input(INPUT_POST, 'songCat', FILTER_SANITIZE_STRING);
        $songTrackNo = filter_input(INPUT_POST, 'songTrackNo', FILTER_SANITIZE_STRING);
        $songWriter = filter_input(INPUT_POST, 'songWriter', FILTER_SANITIZE_STRING);
        $songLength = filter_input(INPUT_POST, 'songLength', FILTER_SANITIZE_STRING);
        $songPrice = filter_input(INPUT_POST, 'songPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $artistID = filter_input(INPUT_POST, 'artistID', FILTER_SANITIZE_NUMBER_INT);
        $albumID = filter_input(INPUT_POST, 'albumID', FILTER_SANITIZE_NUMBER_INT);

        $songImage = $_FILES['uploadedfile'];

        $target_path = "../public/images/singles";

        /* Add the original filename to our target path.
        Result is "uploads/filename.extension" */
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        $target_path = "../public/images/singles/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            $songImage = basename( $_FILES['uploadedfile']['name']);
            $success = Single::newSingle($songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID, $songImage);

            if($success){
                require_once __DIR__ . '/../templates/CRUD/singleCrud.php';
            } else {
                $message = 'Sorry, there was a problem creating new Single';
                require_once __DIR__ . '/../templates/message.php';
            }
        } else{
            $message = "There was an error uploading the file, please try again!";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function deleteSingleAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $pageTitle = 'Edit Single';
        $adminAlbumLinkStyle = 'nav-link active';

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $success = Single::deleteSingle($id);

        if($success){
            require_once __DIR__ . '/../templates/CRUD/singleCrud.php';
        } else {
            $message = 'Sorry, Artist with id = ' . $id . ' could not be deleted';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function getAlbumCart()
    {
        if (isset($_SESSION['albumCart'])){
            return $_SESSION['albumCart'];
        } else {
            return [];
        }
    }

    public function getSongCart()
    {
        if (isset($_SESSION['songCart'])){
            return $_SESSION['songCart'];
        } else {
            return [];
        }
    }

    public function addAlbumToCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

        $select = $this->getCategory();
        // get the cart array
        $albumCart = $this->getAlbumCart();

        // default is a new cart item
        $cartItem = new CartItem($id, $type);

        // if quantity found in cart array, then use this
        if(isset($albumCart[$id])){
            $cartItem = $albumCart[$id];
            $oldQuantity = $cartItem->getQuantity();

            // store old quantity + 1 as new quantity into cart array
            $newQuantity = $oldQuantity + 1;
            $cartItem->setQuantity($newQuantity);
        }

        // store item in cart array
        $albumCart[$id] = $cartItem;

        // store new  array into SESSION
        $_SESSION['albumCart'] = $albumCart;

        // redirect to the shop page
        $this->shopAction();
    }

    public function addSongToCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

        $select1 = $this->getSongCategory();

        // get the cart array
        $songCart = $this->getSongCart();

        // default is a new cart item
        $songCartItem = new CartItem($id, $type);

        // if quantity found in cart array, then use this
        if(isset($songCart[$id])){
            $songCartItem = $songCart[$id];
            $oldQuantity = $songCartItem->getQuantity();

            // store old quantity + 1 as new quantity into cart array
            $newQuantity = $oldQuantity + 1;
            $songCartItem->setQuantity($newQuantity);
        }

        // store item in cart array
        $songCart[$id] = $songCartItem;

        // store new  array into SESSION
        $_SESSION['songCart'] = $songCart;

        // redirect to the shop page
        $this->songAction();
    }

    public function addAlbumSongToCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $albumName = filter_input(INPUT_GET, 'albumName', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

        $select1 = $this->getSongCategory();

        // get the cart array
        $songCart = $this->getSongCart();

        // default is a new cart item
        $songCartItem = new CartItem($id, $type);

        // if quantity found in cart array, then use this
        if(isset($songCart[$id])){
            $songCartItem = $songCart[$id];
            $oldQuantity = $songCartItem->getQuantity();

            // store old quantity + 1 as new quantity into cart array
            $newQuantity = $oldQuantity + 1;
            $songCartItem->setQuantity($newQuantity);
        }

        // store item in cart array
        $songCart[$id] = $songCartItem;

        // store new  array into SESSION
        $_SESSION['songCart'] = $songCart;

        // redirect to the shop page
        $this->showAlbumAction();
    }

    function shopAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();

        $pageTitle = 'Albums';
        $albumLinkStyle = 'nav-link active';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $albums = Album::getAll();
        $singles = Single::getAll();
        require_once __DIR__ . '/../templates/albums.php';
    }

    function showCartAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $select = $this->getCategory();
        $pageTitle = 'View Cart';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        $albums = Album::getAll();
        $singles = Single::getAll();
        require_once __DIR__ . '/../templates/cart.php';
    }

    public function forgetSession()
    {
        $this->killSession();

        // redirect to shop
        $this->indexAction();
    }

    public function killSession()
    {
        unset($_SESSION["albumCart"]);
        unset($_SESSION["songCart"]);
    }

    public function removeAlbumFromCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get the cart array
        $albumCart = $this->getAlbumCart();

        // remove entry for this ID
        unset($albumCart[$id]);

        // store new  array into SESSION
        $_SESSION['albumCart'] = $albumCart;

        // redirect to the view cart page
        $this->showCartAction();
    }

    public function removeSongFromCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get the cart array
        $songCart = $this->getSongCart();

        // remove entry for this ID
        unset($songCart[$id]);

        // store new  array into SESSION
        $_SESSION['songCart'] = $songCart;

        // redirect to the view cart page
        $this->showCartAction();
    }

    public function albumCategory($cat) {
        $_SESSION['select1'] = $cat;
        $this->albumAction();
    }


    public function getCategory()
    {
        if (isset($_SESSION['select1'])){
            return $_SESSION['select1'];
        } else {
            return 'Filter By Category';
        }
    }

    public function setCat()
    {
        $select = $_POST["select1"];
        if($select == null){
            $select = 'Filter By Category';
        }
        $this->albumCategory($select);
    }

    public function setSongCat()
    {
        $select1 = $_POST["select"];
        $this->songCategory($select1);
    }

    public function songCategory($cat) {
        $_SESSION['select'] = $cat;
        $this->songAction();
    }


    public function getSongCategory()
    {
        if (isset($_SESSION['select'])){
            return $_SESSION['select'];
        } else {
            return 'Filter By Category';
        }
    }

    public function checkOutAction()
    {
        $total = filter_input(INPUT_GET, 'total', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $select = $this->getCategory();
        $pageTitle = 'Checkout';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();

        require_once __DIR__ . '/../templates/checkout.php';
    }

    public function purchaseAction()
    {
        $this->killSession();
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $select = $this->getCategory();
        $pageTitle = 'Thank You For Your Purchase';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        require_once __DIR__ . '/../templates/purchase.php';
    }

    public function downloadAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $select = $this->getCategory();
        $pageTitle = 'Thank You For Your Purchase';
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        require_once __DIR__ . '/../templates/download.php';
    }

    public function contactMsgAction()
    {
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        $username = $this->loginController->usernameFromSession();
        $isAdmin = $this->loginController->isAdminUser($username);
        $backgroundColor = $this->getBackgroundColor();
        $select = $this->getCategory();
        $albumCart = $this->getAlbumCart();
        $songCart = $this->getSongCart();
        $select = $this->getCategory();
        $select1 = $this->getSongCategory();
        $message = 'Thank you for your for contacting us, we will reply as soon as possible';
        require_once __DIR__ . '/../templates/message.php';
    }
}