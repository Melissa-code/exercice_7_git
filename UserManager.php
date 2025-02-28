<?php

class UserManager {

  private $users = []; 

  /**
   * Adds a new User to the list ($users)
   *
   * This method validates the username before adding it
   * The username must be at least 3 characters long and contain only letters and numbers
   *
   * @param string $username to add.
   * @return bool Returns true if the user was added successfully
   */
  public function addUser(string $username): bool
  {
    try {
      if (strlen($username) < 3) {
        throw new Exception("Error: Username must be at least 3 characters long");
        return false;
      }
  
      if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        throw new Exception("Error: Username can only contain letters and numbers!");
        return false;
      }
  
      if (empty($username)) {
        throw new Exception("Error: username can't be empty !"); 
        return false; 
      }
  
      // fill the users array (secure the diplaying)
      $this->users[] = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
      echo "User added : $username".PHP_EOL;
      
      return true;

    } catch(Exception $e) {
      echo 'Caught exception: ', $e->getMessage().PHP_EOL;
    }

    return false;
  }

  public function listUser() {
    foreach ($this->users as $user) {
      echo "In the array of users : - $user ".PHP_EOL; 
    }
  } 
}

$userManager = new UserManager(); 
$userManager->addUser("Alice"); 
$userManager->addUser(""); 
$userManager->addUser("Edouard"); 

$userManager->listUser();