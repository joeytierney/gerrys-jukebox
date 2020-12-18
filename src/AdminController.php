<?php
/**
 * Admin controller class
 */

namespace Itb;

/**
 * Class AdminController
 * @package Itb
 */
class AdminController
{
    /**
     * Variable to create an instance of a class
     * @var LoginController
     */
    private $loginController;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->loginController = new LoginController();
        $this->mainController = new MainController();
    }

    /**
     * Default home screen of admins
     */
    public function adminAlbumAction()
    {
        $pageTitle = "Edit Albums";
        $adminAlbumLinkStyle = 'nav-link active';
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        if ($isLoggedIn){
            $username = $this->loginController->usernameFromSession();
            $isAdmin = $this->loginController->isAdminUser($username);
            $backgroundColor = $this->mainController->getBackgroundColor();
            $albumCart = $this->mainController->getAlbumCart();
            $songCart = $this->mainController->getSongCart();
            $select = $this->mainController->getCategory();
            $select1 = $this->mainController->getSongCategory();
            require_once __DIR__ . '/../templates/CRUD/albumCrud.php';
        } else {
            $message = 'UNAUTHORIZED ACCESS';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    /**
     * Default home screen of admins
     */
    public function adminArtistAction()
    {
        $pageTitle = "Edit Artist";
        $adminAlbumLinkStyle = 'nav-link active';
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        if ($isLoggedIn){
            $username = $this->loginController->usernameFromSession();
            $isAdmin = $this->loginController->isAdminUser($username);
            $backgroundColor = $this->mainController->getBackgroundColor();;
            $albumCart = $this->mainController->getAlbumCart();
            $songCart = $this->mainController->getSongCart();
            $select = $this->mainController->getCategory();
            $select1 = $this->mainController->getSongCategory();
            require_once __DIR__ . '/../templates/CRUD/artistCrud.php';
        } else {
            $message = 'UNAUTHORIZED ACCESS';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function adminSingleAction()
    {
        $pageTitle = "Edit Singles";
        $adminAlbumLinkStyle = 'nav-link active';
        $isLoggedIn = $this->loginController->isLoggedInFromSession();
        if ($isLoggedIn){
            $username = $this->loginController->usernameFromSession();
            $isAdmin = $this->loginController->isAdminUser($username);
            $backgroundColor = $this->mainController->getBackgroundColor();
            $albumCart = $this->mainController->getAlbumCart();
            $songCart = $this->mainController->getSongCart();
            $select = $this->mainController->getCategory();
            $select1 = $this->mainController->getSongCategory();
            require_once __DIR__ . '/../templates/CRUD/singleCrud.php';
        } else {
            $message = 'UNAUTHORIZED ACCESS';
            require_once __DIR__ . '/../templates/message.php';
        }
    }


}