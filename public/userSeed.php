<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\User;

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'gerrys_db');

$derek = new User();
$derek->setFirstName('Derek');
$derek->setLastName('McCarthy');
$derek->setUsername('derek');
$derek->setPassword('derek');
$derek->setImage('images/userProfilePics/user.ico');
$derek->setEmail('derek@gerrys.com');
$derek->setRole(User::ROLE_ADMIN);

$joey = new User();
$joey->setFirstName('Joseph');
$joey->setLastName('Tierney');
$joey->setUsername('joey');
$joey->setPassword('joey');
$joey->setImage('images/userProfilePics/user.ico');
$joey->setEmail('joey@gerrys.com');
$joey->setRole(User::ROLE_ADMIN);

$chris = new User();
$chris->setFirstName('Christopher');
$chris->setLastName('Slattery');
$chris->setUsername('chris');
$chris->setPassword('chris');
$chris->setImage('images/userProfilePics/user.ico');
$chris->setEmail('chris@gerrys.com');
$chris->setRole(User::ROLE_ADMIN);

User::insert($derek);
User::insert($joey);
User::insert($chris);

$users = \Itb\User::getAll();
var_dump($users);

?>





