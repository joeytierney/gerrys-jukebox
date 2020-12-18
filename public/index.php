<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/app/config_db.php';
session_start();

use Itb\MainController;
use Itb\LoginController;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$mainController = new MainController;
$loginController = new LoginController();
$adminController = new \Itb\AdminController();

switch ($action){
    case 'chart' :
        $mainController->chartAction();
        break;
    case 'contact' :
        $mainController->contactAction();
        break;
    case 'song' :
        $mainController->songAction();
        break;
    case 'show' :
        $mainController->showArtistAction();
        break;
    case 'artist' :
        $mainController->artistAction();
        break;
    case 'artistDetails' :
        $mainController->artistDetailAction();
        break;
    case 'showAlbum' :
        $mainController->showAlbumAction();
        break;
    case 'showSong' :
        $mainController->showSingleAction();
        break;
    case 'albums' :
        $mainController->albumAction();
        break;
    case 'find' :
        $mainController->searchAction();
        break;
    case 'processLogin':
        $loginController->processLoginAction();
        break;
    case 'editProfile':
        $mainController->editProfileAction();
        break;
    case 'logout':
        $loginController->logoutAction();
        break;
    case 'profile':
        $mainController->profileAction();
        break;
    case 'imageUpload':
        $mainController->uploadImageAction();
        break;
    case 'setBackgroundColorBlue':
        $mainController->changeBackgroundColor('#ccffff');
        break;
    case 'setBackgroundColorGreen':
        $mainController->changeBackgroundColor('#f2ffe6');
        break;
    case 'setBackgroundColorDefault':
        $mainController->changeBackgroundColor('#ffffff');
        break;
    case 'processRegister':
        $mainController->processRegisterAction();
        break;
    case 'updateProfile':
        $mainController->updateProfileAction();
        break;
    case 'adminAlbum':
        $adminController->adminAlbumAction();
        break;
    case 'adminArtist':
        $adminController->adminArtistAction();
        break;
    case 'adminSingle':
        $adminController->adminSingleAction();
        break;
    case 'albumUpdate':
        $mainController->albumUpdateAction();
        break;
    case 'updateAlbum':
        $mainController->updateAlbumAction();
        break;
    case 'deleteAlbum':
        $mainController->deleteAlbumAction();
        break;
    case 'showNewAlbum':
        $mainController->showNewAlbumAction();
        break;
    case 'newAlbum':
        $mainController->newAlbumAction();
        break;
    case 'artistUpdate':
        $mainController->artistUpdateAction();
        break;
    case 'updateArtist':
        $mainController->updateArtistAction();
        break;
    case 'showNewArtist':
        $mainController->showNewArtistAction();
        break;
    case 'newArtist':
        $mainController->newArtistAction();
        break;
    case 'deleteArtist':
        $mainController->deleteArtistAction();
        break;
    case 'singleUpdate':
        $mainController->singleUpdateAction();
        break;
    case 'updateSingle':
        $mainController->updateSingleAction();
        break;
    case 'showNewSingle':
        $mainController->showNewSingleAction();
        break;
    case 'newSingle':
        $mainController->newSingleAction();
        break;
    case 'deleteSingle':
        $mainController->deleteSingleAction();
        break;
    case 'addToCart':
        $mainController->addAlbumToCart();
        break;
    case 'removeAlbumFromCart':
        $mainController->removeAlbumFromCart();
        break;
    case 'removeSongFromCart':
        $mainController->removeSongFromCart();
        break;
    case 'emptyCart':
        $mainController->forgetSession();
        break;
    case 'showCart':
        $mainController->showCartAction();
        break;
    case 'addSongToCart':
        $mainController->addSongToCart();
        break;
    case 'addAlbumSongToCart':
        $mainController->addAlbumSongToCart();
        break;
    case 'setCat':
        $mainController->setCat();
        break;
    case 'setSongCat':
        $mainController->setSongCat();
        break;
    case 'checkOut':
        $mainController->checkOutAction();
        break;
    case 'purchase':
        $mainController->purchaseAction();
        break;
    case 'download':
        $mainController->downloadAction();
        break;
    case 'contactMsg' :
        $mainController->contactMsgAction();
        break;
    default:
        // default is home page ('index' action)
        $mainController->indexAction();
}

