<?php
/**
 * Class for user object
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class User
 * @package Itb
 */
class User extends DatabaseTable
{
    /**
     * constant variable to check users role
     */
    const ROLE_USER = 1;

    /**
     * constant variable to check users role
     */
    const ROLE_ADMIN = 2;

    /**
     * users id of type int
     * @var
     */
    private $userId;

    /**
     * username of type string
     * @var
     */
    private $userName;

    /**
     * users password of type string
     * @var
     */
    private $userPassword;

    /**
     * users role of type int
     * @var
     */
    private $userRole;

    /**
     * users image of type string
     * @var
     */
    private $userImage;

    /**
     * users email of type string
     * @var
     */
    private $userEmail;

    /**
     * @var
     */
    private $firstName;

    /**
     * @var
     */
    private $lastName;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * get email
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * set email
     * @param mixed $userEmail
     */
    public function setEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * get id
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * set id
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * get username
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * set username
     * @param mixed $userName
     */
    public function setUsername($userName)
    {
        $this->userName = $userName;
    }

    /**
     * get password
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * set & hash password
     * @param mixed $userPassword
     */
    public function setPassword($userPassword)
    {
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $this->userPassword  = $hashedPassword;
    }

    /**
     * get role
     * @return mixed
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * set role
     * @param mixed $userRole
     */
    public function setRole($userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * get image
     * @return mixed
     */
    public function getUserImage()
    {
        return $this->userImage;
    }

    /**
     * set image
     * @param mixed $userImage
     */
    public function setImage($userImage)
    {
        $this->userImage = $userImage;
    }

    /**
     * check if the username & password are in the db
     * @param $userName
     * @param $userPassword
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($userName, $userPassword)
    {
        $user = User::getOneByUsername($userName);

        if(null == $user){
            return false;
        }

        /**
         * @var $user User
         */
        $hashedPassword = $user->getUserPassword();
        $passwordWasVerified = password_verify($userPassword, $hashedPassword);

        return $passwordWasVerified;
    }

    /**
     * get the details for the chosen user
     * @param $userName
     * @return mixed|null
     */
    public static function getOneByUsername($userName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE userName=:userName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':userName', $userName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function addUser($username, $password, $firstName, $lastName, $email)
    {
        $register = new User();
        $register->setUsername($username);
        $register->setPassword($password);
        $register->setFirstName($firstName);
        $register->setLastName($lastName);
        $register->setEmail($email);
        $register->setRole(1);
        $register->setImage('/images/userProfilePics/user.ico');
        self::insert($register);
        if(null == $register){
            return false;
        }
        return true;
    }

    /**
     * change the users image
     * @param $userId
     * @param $userImage
     * @return bool
     */
    public function changeImage($userId, $userImage)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE users SET userImage = '/images/userProfilePics/$userImage' WHERE userId=$userId";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;// = true;
    }

    /**
     * check for the users role
     * @param $username
     * @return null|string
     */
    public static function checkRole($userName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        //$this->getRole();
        $sql = 'SELECT userRole FROM users WHERE userName=$userName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':userName', $userName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $sql;
        } else {
            return null;
        }

    }

    /**
     * change the users password
     * @param $userId
     * @param $userPassword
     * @return bool
     */
    public function changePassword($userId, $userPassword)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        self::setPassword($userPassword);
        $hashedPassword = $this->getUserPassword();
        $sql = "UPDATE users SET userPassword = '$hashedPassword' WHERE userId='$userId'";

        $numRowsAffected = $connection->exec($sql);

        // can set Boolean variable in a single statement
        $queryWasSuccessful = ($numRowsAffected > 0);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function getUserImageByUserName($userName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        //$this->getRole();
        $sql = 'SELECT userImage FROM users WHERE userName=:userName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':userName', $userName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetchColumn()) {
            return $object;
        } else {
            return null;
        }
    }
}