<?php
require_once 'UserManager.php'; 

$userManager = new UserManager();
$userManager->addUser("Elisabeth");
$userManager->addUser("Edmond");

echo "User List:" . PHP_EOL;
$userManager->listUser();