<?php
/**
 * Class for login functions
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class LoginController
 * @package Itb
 */
class LoginController
{

    /**
     * Clear & destroy all session data
     */
    public function logoutAction()
    {
        // unset all of the session variables.
        $_SESSION = [];

        //destroy the session, and not just the session data!
        if (ini_get('session.use_cookies')){
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        // destroy the session.
        session_destroy();

        // redirect to index action
        $mainController = new MainController();
        $mainController->indexAction();
    }

    /**
     * Check to see if the user is in the database
     */
    public function processLoginAction()
    {
        // default is bad login
        $isLoggedIn = false;
        $isAdmin = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);
        $role = '';
        $isAdmins = $this->isAdminUser($username);
        // action depending on login success
        if($isLoggedIn){
            // STORE login status SESSION
            $_SESSION['user'] = $username;
            if ($isAdmins == User::ROLE_ADMIN){
                $_SESSION['admin'] = $role;
                $isAdmin = true;
            }else{
                $isAdmin = false;
            }
            $mainController = new MainController();
            $mainController->profileAction();
        } else {
            $pageTitle = "Incorrect Details";
            $message = 'Incorrect username or password, please try again';
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    /**
     * check if there's a user logged in
     * @return bool
     */
    public function isLoggedInFromSession()
    {
        $isLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if(isset($_SESSION['user'])){
            $isLoggedIn = true;
        }

        return $isLoggedIn;
    }

    /**
     * @param $userName
     * @return bool
     */
    public static function isAdminUser($userName)
    {
        $isAdmin = false;
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        $sql = "SELECT userRole FROM users WHERE userName='$userName'";
        $statement = $connection->query($sql);

        $row = $statement->fetchColumn();
        if ($row == User::ROLE_ADMIN) {
            $isAdmin = true;
        }
        return $isAdmin;
    }

    /**
     * check if the user an admin user
     * @param $username
     * @param $password
     * @return mixed|null
     */
    public function isAdminUserLoggedIn($username, $password)
    {
        $isAdmin = false;
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        $sql = "SELECT role FROM users WHERE username='$username' AND password='$password'";
        $statement = $connection->prepare($sql);
        $statement->fetch();
        $statement->execute();

        if ($row = $statement->fetch()) {
            return $row;
        } else {
            return null;
        }

    }

    /**
     * get the username from the session
     * @return string
     */
    public function usernameFromSession()
    {
        $username = '';

        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        return $username;
    }

    /**
     * check if an admin is logged in
     * @return bool
     */
    public function adminIsLoggedInFromSession()
    {
        $isAdmin = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if(isset($_SESSION['admin'])){
            $isAdmin = true;
        }

        return $isAdmin;
    }

}