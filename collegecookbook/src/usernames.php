<?php
require('connectdb.php');


function getUsernames($username)
{
  global $db;

  $query = "SELECT DISTINCT username FROM recipes WHERE username LIKE :username";

  $statement = $db->prepare($query);
  $statement->bindValue(':username', '%' . $username . '%');
  $statement->execute();

  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}
?>
